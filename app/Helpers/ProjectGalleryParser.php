<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectGalleryParser
{
    protected $projectSlug;
    protected $projectPath;
    protected $storageDisk = 'public'; // Changed from 'project-files' to 'public'
    protected $metadata = [];
    protected $content = '';
    protected $galleries = [];

    public function __construct($projectSlug)
    {
        $this->projectSlug = $projectSlug;
        $this->projectPath = "project-files/{$projectSlug}";
    }

    public function parse()
    {
        // Use storage/app/public/project-files directory (NEW LOCATION)
        $storagePath = storage_path("app/public/project-files/{$this->projectSlug}/project.md");

        if (!file_exists($storagePath)) {
            throw new \Exception("Project markdown file not found: {$storagePath}");
        }

        $content = file_get_contents($storagePath);

        // Parse YAML frontmatter
        $this->parseFrontmatter($content);

        // Parse gallery blocks
        $this->parseGalleries($content);

        // Parse regular markdown content
        $this->parseContent($content);

        return $this;
    }

    protected function parseFrontmatter($content)
    {
        if (preg_match('/^---\s*\n(.*?)\n---\s*\n/s', $content, $matches)) {
            $yaml = $matches[1];
            // Simple YAML parser for basic key-value pairs
            $lines = explode("\n", $yaml);
            foreach ($lines as $line) {
                if (strpos($line, ':') !== false && strpos($line, '  -') !== 0) {
                    list($key, $value) = explode(':', $line, 2);
                    $this->metadata[trim($key)] = trim($value, ' "\'');
                }
            }
        }
    }

    protected function parseGalleries($content)
    {
        // Extract gallery configuration blocks with section headers
        $lines = explode("\n", $content);
        $currentSection = null;
        $inGalleryBlock = false;
        $galleryContent = '';

        foreach ($lines as $line) {
            // Check for section headers (### Format)
            if (preg_match('/^###\s+(.+)$/', $line, $matches)) {
                $currentSection = trim($matches[1]);
            }

            // Check for gallery block start
            if (strpos($line, '```gallery') !== false) {
                $inGalleryBlock = true;
                $galleryContent = '';
                continue;
            }

            // Check for gallery block end
            if ($inGalleryBlock && strpos($line, '```') !== false) {
                $inGalleryBlock = false;

                // Parse the gallery content
                $gallery = [
                    'section' => $currentSection,
                    'columns' => 3,
                    'images' => []
                ];

                $galleryLines = explode("\n", $galleryContent);
                foreach ($galleryLines as $gLine) {
                    $gLine = trim($gLine);

                    if (strpos($gLine, 'columns:') === 0) {
                        $gallery['columns'] = (int) trim(str_replace('columns:', '', $gLine));
                    } elseif (strpos($gLine, '- ') === 0) {
                        $imagePath = trim(str_replace('- ', '', $gLine));
                        $gallery['images'][] = $imagePath;
                    }
                }

                $this->galleries[] = $gallery;
                continue;
            }

            // Accumulate gallery content
            if ($inGalleryBlock) {
                $galleryContent .= $line . "\n";
            }
        }
    }

    protected function parseContent($content)
    {
        // Remove frontmatter
        $content = preg_replace('/^---\s*\n.*?\n---\s*\n/s', '', $content);

        // Remove gallery blocks
        $content = preg_replace('/```gallery\n.*?\n```/s', '', $content);

        // Remove gallery configuration headers
        $content = preg_replace('/## Gallery Configuration.*$/s', '', $content);

        // Use Laravel's built-in markdown parser (CommonMark)
        $this->content = Str::markdown($content);
    }

    public function getMetadata($key = null)
    {
        if ($key) {
            return $this->metadata[$key] ?? null;
        }
        return $this->metadata;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getGalleries()
    {
        return $this->galleries;
    }

    public function generateGalleryHtml($galleryIndex = null)
    {
        $galleries = $galleryIndex !== null
            ? [$this->galleries[$galleryIndex]]
            : $this->galleries;

        $html = '';

        foreach ($galleries as $gallery) {
            $columnClass = $this->getColumnClass($gallery['columns']);

            foreach ($gallery['images'] as $imagePath) {
                // Use Storage::url() for environment-agnostic URLs
                $fullImageUrl = Storage::url("project-files/{$this->projectSlug}/images/{$imagePath}");

                $html .= <<<HTML
                    <div class="{$columnClass} gallery-item">
                        <a href="{$fullImageUrl}" title="" class="img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img">
                                    <img src="{$fullImageUrl}" class="img-fluid mx-auto d-block" alt="work-img">
                                </div>
                            </div>
                        </a>
                    </div>
HTML;
            }
        }

        return $html;
    }

    public function generateGalleryHtmlWithSections()
    {
        $html = '';

        foreach ($this->galleries as $gallery) {
            // Add section heading if available
            if (!empty($gallery['section'])) {
                $sectionTitle = strtoupper($gallery['section']);
                $html .= <<<HTML
            <div class="row" style="margin-top: 50px; margin-bottom: 30px;">
                <div class="col-md-12">
                    <h4 style="font-family: 'Oswald', sans-serif; color: #c0996b; font-size: 24px; font-weight: 400; text-transform: uppercase; letter-spacing: 5px; border-bottom: 2px solid rgba(192, 153, 107, 0.3); padding-bottom: 15px; margin-bottom: 30px;">
                        {$sectionTitle}
                    </h4>
                </div>
            </div>
            <div class="row">
HTML;
            } else {
                $html .= '<div class="row">';
            }

            $columnClass = $this->getColumnClass($gallery['columns']);

            foreach ($gallery['images'] as $imagePath) {
                // Use Storage::url() for environment-agnostic URLs
                $fullImageUrl = Storage::url("project-files/{$this->projectSlug}/images/{$imagePath}");

                $html .= <<<HTML
                    <div class="{$columnClass} gallery-item">
                        <a href="{$fullImageUrl}" title="" class="img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img" style="background-color: rgba(255,255,255,0.05); padding: 15px; border-radius: 5px;">
                                    <img src="{$fullImageUrl}" class="img-fluid mx-auto d-block" alt="work-img">
                                </div>
                            </div>
                        </a>
                    </div>
HTML;
            }

            $html .= '</div>'; // Close row
        }

        return $html;
    }

    protected function getColumnClass($columns)
    {
        $map = [
            1 => 'col-md-12',
            2 => 'col-md-6',
            3 => 'col-md-4',
            4 => 'col-md-3',
        ];

        return $map[$columns] ?? 'col-md-4';
    }

    public static function getAllProjects()
    {
        $projects = [];

        // Check storage/app/public/project-files directory (NEW LOCATION)
        $projectsDir = storage_path('app/public/project-files');

        if (!is_dir($projectsDir)) {
            return $projects;
        }

        $dirs = scandir($projectsDir);
        foreach ($dirs as $dir) {
            if ($dir === '.' || $dir === '..') continue;

            $fullPath = $projectsDir . '/' . $dir;
            if (is_dir($fullPath)) {
                try {
                    $parser = new self($dir);
                    $parser->parse();
                    $projects[] = [
                        'slug' => $dir,
                        'title' => $parser->getMetadata('title'),
                        'location' => $parser->getMetadata('location'),
                        'project_type' => $parser->getMetadata('project_type'),
                        'icon' => $parser->getMetadata('icon') ?? 'frontend/assets/img/icons/Artboard-1.png',
                        'order' => (int) ($parser->getMetadata('order') ?? 999),
                    ];
                } catch (\Exception $e) {
                    // Skip invalid projects
                    continue;
                }
            }
        }

        // Sort projects by order field (ascending)
        usort($projects, function($a, $b) {
            return $a['order'] <=> $b['order'];
        });

        return $projects;
    }
}
