<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    /**
     * Path to the global settings JSON file
     */
    public static function getSettingsFilePath(): string
    {
        return storage_path('app/website_content/global_settings.json');
    }

    /**
     * Retrieve all global settings with fallback defaults
     */
    /**
     * Retrieve all global settings with fallback defaults
     */
    public static function getGlobalSettings(): array
    {
        $path = self::getSettingsFilePath();
        $defaultSections = [
            'home' => [
                'hero' => [
                    'name' => 'Home Hero Carousel & Sliders',
                    'is_carousel' => true,
                    'max_slides' => 3,
                    'allowed_media' => ['image', 'video', 'gif', 'youtube'],
                    'height' => '590px',
                    'max_width' => '100%',
                    'overlay_color' => '#19302e',
                    'overlay_opacity' => '0.85',
                    'overlay_style' => 'gradient',
                    'preview_image' => 'images/dahi_vada.jpg',
                ],
                'star_dish' => [
                    'name' => 'Signature Dahi Bada Showcase',
                    'is_carousel' => false,
                    'allowed_media' => ['image'],
                    'height' => '450px',
                    'max_width' => '100%',
                    'overlay_color' => '#083b3c',
                    'overlay_opacity' => '0.60',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/dahi_vada.jpg',
                ],
                'visit_us' => [
                    'name' => 'Come Taste the Original / Storefront',
                    'is_carousel' => false,
                    'allowed_media' => ['image'],
                    'height' => '450px',
                    'max_width' => '100%',
                    'overlay_color' => '#083b3c',
                    'overlay_opacity' => '0.80',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/storefront.jpg',
                ],
                'franchise_cta' => [
                    'name' => 'Franchise Opportunity Banner (Bottom CTA)',
                    'is_carousel' => false,
                    'allowed_media' => ['image', 'video', 'gif', 'youtube'],
                    'height' => '380px',
                    'max_width' => '100%',
                    'overlay_color' => '#083b3c',
                    'overlay_opacity' => '0.90',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/storefront.jpg',
                ],
            ],
            'story' => [
                'hero_banner' => [
                    'name' => 'Our Story Hero Banner',
                    'is_carousel' => false,
                    'allowed_media' => ['image', 'video', 'gif', 'youtube'],
                    'height' => '460px',
                    'max_width' => '100%',
                    'overlay_color' => '#000000',
                    'overlay_opacity' => '0.70',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/lucknow_heritage.jpg',
                ],
                'where_it_began' => [
                    'name' => 'Chapter 1: Where It All Began (1976)',
                    'is_carousel' => false,
                    'allowed_media' => ['image'],
                    'height' => '400px',
                    'max_width' => '100%',
                    'overlay_color' => '#083b3c',
                    'overlay_opacity' => '0.50',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/vintage_1976.jpg',
                ],
                'gpo_journey' => [
                    'name' => 'Chapter 2: The GPO Journey',
                    'is_carousel' => false,
                    'allowed_media' => ['image', 'video', 'youtube'],
                    'height' => '420px',
                    'max_width' => '100%',
                    'overlay_color' => '#083b3c',
                    'overlay_opacity' => '0.85',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/gpo_journey.jpg',
                ],
                'panoramic_banner' => [
                    'name' => 'Panoramic Lucknow Heritage Banner',
                    'is_carousel' => false,
                    'allowed_media' => ['image', 'video', 'gif', 'youtube'],
                    'height' => '350px',
                    'max_width' => '100%',
                    'overlay_color' => '#000000',
                    'overlay_opacity' => '0.65',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/lucknow_heritage.jpg',
                ],
            ],
            'menu' => [
                'hero_banner' => [
                    'name' => 'Menu & Specialities Hero Banner',
                    'is_carousel' => false,
                    'allowed_media' => ['image', 'video', 'gif', 'youtube'],
                    'height' => '420px',
                    'max_width' => '100%',
                    'overlay_color' => '#083b3c',
                    'overlay_opacity' => '0.75',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/dahi_bada_bowl.jpg',
                ],
            ],
            'franchise' => [
                'hero_sliders' => [
                    'name' => 'Franchise Hero Carousel & Sliders',
                    'is_carousel' => true,
                    'max_slides' => 3,
                    'allowed_media' => ['image', 'video', 'gif', 'youtube'],
                    'height' => '480px',
                    'max_width' => '100%',
                    'overlay_color' => '#083b3c',
                    'overlay_opacity' => '0.75',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/franchise.jpg',
                ],
                'footer_cta' => [
                    'name' => 'Bottom Expansion Banner (Final CTA)',
                    'is_carousel' => false,
                    'allowed_media' => ['image', 'video', 'gif', 'youtube'],
                    'height' => '380px',
                    'max_width' => '100%',
                    'overlay_color' => '#083b3c',
                    'overlay_opacity' => '0.90',
                    'overlay_style' => 'gradient',
                    'preview_image' => 'images/franchise.jpg',
                ],
            ],
            'contact' => [
                'hero_banner' => [
                    'name' => 'Contact Hero Banner & Intro',
                    'is_carousel' => false,
                    'allowed_media' => ['image', 'video', 'gif', 'youtube'],
                    'height' => '400px',
                    'max_width' => '100%',
                    'overlay_color' => '#083b3c',
                    'overlay_opacity' => '0.85',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/lucknow_heritage.jpg',
                ],
                'find_us_banner' => [
                    'name' => 'Find Us In Lucknow Bottom Banner',
                    'is_carousel' => false,
                    'allowed_media' => ['image', 'video', 'gif', 'youtube'],
                    'height' => '360px',
                    'max_width' => '100%',
                    'overlay_color' => '#083b3c',
                    'overlay_opacity' => '0.80',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/lucknow_heritage.jpg',
                ],
            ],
        ];

        $defaults = [
            'general' => [
                'site_title' => 'Original GPO Ke Thandey Dahi Bade | Lucknow Since 1976',
                'site_tagline' => 'The Original Taste of Lucknow Since 1976',
                'favicon' => '',
                'header_logo' => '',
                'footer_logo' => '',
                'meta_description' => "Experience the legendary authentic taste of Lucknow's iconic GPO Ke Thandey Dahi Bade since 1976.",
                'meta_keywords' => 'Original GPO Dahi Bade, Lucknow Dahi Vada, Hazratganj food, street food Lucknow, best dahi vada India',
                'contact_phone' => '+91 98765 43210',
                'contact_email' => 'contact@gpodahibade.com',
                'contact_address' => 'Awadh Bazaar, Hazratganj, Lucknow, UP - 226001',
            ],
            'sections' => $defaultSections,
            'hero_pages' => [
                'home' => $defaultSections['home']['hero'],
                'story' => $defaultSections['story']['hero_banner'],
                'menu' => $defaultSections['menu']['hero_banner'],
                'franchise' => $defaultSections['franchise']['hero_sliders'],
                'contact' => $defaultSections['contact']['hero_banner'],
            ],
        ];

        if (File::exists($path)) {
            $content = json_decode(File::get($path), true);
            if (is_array($content)) {
                $defaults['general'] = array_replace_recursive($defaults['general'], $content['general'] ?? []);
                if (isset($content['sections']) && is_array($content['sections'])) {
                    $defaults['sections'] = array_replace_recursive($defaults['sections'], $content['sections']);
                }
                // Sync hero_pages from sections
                $defaults['hero_pages']['home'] = $defaults['sections']['home']['hero'] ?? $defaults['hero_pages']['home'];
                $defaults['hero_pages']['story'] = $defaults['sections']['story']['hero_banner'] ?? $defaults['hero_pages']['story'];
                $defaults['hero_pages']['menu'] = $defaults['sections']['menu']['hero_banner'] ?? $defaults['hero_pages']['menu'];
                $defaults['hero_pages']['franchise'] = $defaults['sections']['franchise']['hero_sliders'] ?? $defaults['hero_pages']['franchise'];
                $defaults['hero_pages']['contact'] = $defaults['sections']['contact']['hero_banner'] ?? $defaults['hero_pages']['contact'];
            }
        }

        return $defaults;
    }

    /**
     * Display the Global Settings management screen
     */
    public function index()
    {
        $settings = self::getGlobalSettings();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update Global Settings
     */
    public function update(Request $request)
    {
        $currentSettings = self::getGlobalSettings();
        $tab = $request->input('active_tab', 'general');
        $selectedPage = $request->input('selected_page', 'home');
        $selectedSection = $request->input('selected_section', 'hero');

        $uploadDir = public_path('uploads/settings');
        if (!File::isDirectory($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true, true);
        }

        // 1. Process General Settings
        if ($request->has('general')) {
            $genInput = $request->input('general', []);

            // File uploads
            if ($request->hasFile('general_files.favicon')) {
                $file = $request->file('general_files.favicon');
                if ($file->isValid()) {
                    $ext = strtolower($file->getClientOriginalExtension());
                    $name = 'favicon_' . time() . '.' . $ext;
                    $file->move($uploadDir, $name);
                    $currentSettings['general']['favicon'] = 'uploads/settings/' . $name;
                }
            }

            if ($request->hasFile('general_files.header_logo')) {
                $file = $request->file('general_files.header_logo');
                if ($file->isValid()) {
                    $ext = strtolower($file->getClientOriginalExtension());
                    $name = 'header_logo_' . time() . '.' . $ext;
                    $file->move($uploadDir, $name);
                    $currentSettings['general']['header_logo'] = 'uploads/settings/' . $name;
                }
            }

            if ($request->hasFile('general_files.footer_logo')) {
                $file = $request->file('general_files.footer_logo');
                if ($file->isValid()) {
                    $ext = strtolower($file->getClientOriginalExtension());
                    $name = 'footer_logo_' . time() . '.' . $ext;
                    $file->move($uploadDir, $name);
                    $currentSettings['general']['footer_logo'] = 'uploads/settings/' . $name;
                }
            }

            // Text fields
            $textFieldKeys = [
                'site_title', 'site_tagline', 'meta_description', 'meta_keywords',
                'contact_phone', 'contact_email', 'contact_address'
            ];
            foreach ($textFieldKeys as $key) {
                if (isset($genInput[$key])) {
                    $currentSettings['general'][$key] = trim($genInput[$key]);
                }
            }
        }

        // 2. Process Page & Section Media Settings
        if ($request->has('sections')) {
            $sectionsInput = $request->input('sections', []);
            foreach ($sectionsInput as $pKey => $pageSections) {
                if (!isset($currentSettings['sections'][$pKey])) {
                    $currentSettings['sections'][$pKey] = [];
                }
                foreach ($pageSections as $sKey => $sData) {
                    if (!isset($currentSettings['sections'][$pKey][$sKey])) {
                        $currentSettings['sections'][$pKey][$sKey] = [];
                    }

                    if (isset($sData['height'])) {
                        $currentSettings['sections'][$pKey][$sKey]['height'] = trim($sData['height']);
                    }
                    if (isset($sData['max_width'])) {
                        $currentSettings['sections'][$pKey][$sKey]['max_width'] = trim($sData['max_width']);
                    }
                    if (isset($sData['overlay_color'])) {
                        $currentSettings['sections'][$pKey][$sKey]['overlay_color'] = trim($sData['overlay_color']);
                    }
                    if (isset($sData['overlay_opacity'])) {
                        $currentSettings['sections'][$pKey][$sKey]['overlay_opacity'] = trim($sData['overlay_opacity']);
                    }
                    if (isset($sData['overlay_style'])) {
                        $currentSettings['sections'][$pKey][$sKey]['overlay_style'] = trim($sData['overlay_style']);
                    }

                    // Max carousel slides limit
                    if (isset($sData['max_slides'])) {
                        $currentSettings['sections'][$pKey][$sKey]['max_slides'] = max(1, min(10, (int)$sData['max_slides']));
                    }

                    // Allowed media types (e.g. image, video, gif, youtube)
                    if (isset($sData['allowed_media']) && is_array($sData['allowed_media'])) {
                        $allowed = array_values(array_intersect($sData['allowed_media'], ['image', 'video', 'gif', 'youtube']));
                        if (empty($allowed)) {
                            $allowed = ['image']; // Always at least image
                        }
                        $currentSettings['sections'][$pKey][$sKey]['allowed_media'] = $allowed;
                    }
                }
            }

            // Sync hero_pages for backward compatibility
            $currentSettings['hero_pages']['home'] = $currentSettings['sections']['home']['hero'] ?? [];
            $currentSettings['hero_pages']['story'] = $currentSettings['sections']['story']['hero_banner'] ?? [];
            $currentSettings['hero_pages']['menu'] = $currentSettings['sections']['menu']['hero_banner'] ?? [];
            $currentSettings['hero_pages']['franchise'] = $currentSettings['sections']['franchise']['hero_sliders'] ?? [];
            $currentSettings['hero_pages']['contact'] = $currentSettings['sections']['contact']['hero_banner'] ?? [];
        }

        // Save to JSON
        $filePath = self::getSettingsFilePath();
        $dir = dirname($filePath);
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true, true);
        }

        File::put($filePath, json_encode($currentSettings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return redirect()->route('admin.settings.index', [
            'tab' => $tab,
            'page' => $selectedPage,
            'section' => $selectedSection
        ])->with('success', 'Global Settings and Page Section Media Configuration successfully updated!');
    }
}
