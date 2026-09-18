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
    public static function getGlobalSettings(): array
    {
        $path = self::getSettingsFilePath();
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
            'hero_pages' => [
                'home' => [
                    'title' => 'Home Page Hero',
                    'height' => '590px',
                    'max_width' => '100%',
                    'overlay_color' => '#19302e',
                    'overlay_opacity' => '0.85',
                    'overlay_style' => 'gradient',
                    'preview_image' => 'images/dahi_vada.jpg',
                ],
                'story' => [
                    'title' => 'Our Story Hero',
                    'height' => '460px',
                    'max_width' => '100%',
                    'overlay_color' => '#000000',
                    'overlay_opacity' => '0.70',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/lucknow_heritage.jpg',
                ],
                'menu' => [
                    'title' => 'Menu & Specialities Hero',
                    'height' => '420px',
                    'max_width' => '100%',
                    'overlay_color' => '#083b3c',
                    'overlay_opacity' => '0.75',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/dahi_bada_bowl.jpg',
                ],
                'franchise' => [
                    'title' => 'Franchise Partnership Hero',
                    'height' => '480px',
                    'max_width' => '100%',
                    'overlay_color' => '#111827',
                    'overlay_opacity' => '0.80',
                    'overlay_style' => 'gradient',
                    'preview_image' => 'images/storefront.jpg',
                ],
                'contact' => [
                    'title' => 'Contact & Visit Us Hero',
                    'height' => '400px',
                    'max_width' => '100%',
                    'overlay_color' => '#1e293b',
                    'overlay_opacity' => '0.75',
                    'overlay_style' => 'solid',
                    'preview_image' => 'images/outlet.jpg',
                ],
            ],
        ];

        if (File::exists($path)) {
            $content = json_decode(File::get($path), true);
            if (is_array($content)) {
                $defaults['general'] = array_merge($defaults['general'], $content['general'] ?? []);
                if (isset($content['hero_pages']) && is_array($content['hero_pages'])) {
                    foreach ($content['hero_pages'] as $pageKey => $pageData) {
                        if (isset($defaults['hero_pages'][$pageKey])) {
                            $defaults['hero_pages'][$pageKey] = array_merge($defaults['hero_pages'][$pageKey], $pageData);
                        } else {
                            $defaults['hero_pages'][$pageKey] = $pageData;
                        }
                    }
                }
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

        // 2. Process Page-wise Hero Section Settings
        if ($request->has('hero_pages')) {
            $heroInput = $request->input('hero_pages', []);
            foreach ($heroInput as $pageKey => $heroData) {
                if (!isset($currentSettings['hero_pages'][$pageKey])) {
                    $currentSettings['hero_pages'][$pageKey] = [];
                }

                if (isset($heroData['height'])) {
                    $currentSettings['hero_pages'][$pageKey]['height'] = trim($heroData['height']);
                }
                if (isset($heroData['max_width'])) {
                    $currentSettings['hero_pages'][$pageKey]['max_width'] = trim($heroData['max_width']);
                }
                if (isset($heroData['overlay_color'])) {
                    $currentSettings['hero_pages'][$pageKey]['overlay_color'] = trim($heroData['overlay_color']);
                }
                if (isset($heroData['overlay_opacity'])) {
                    $currentSettings['hero_pages'][$pageKey]['overlay_opacity'] = trim($heroData['overlay_opacity']);
                }
                if (isset($heroData['overlay_style'])) {
                    $currentSettings['hero_pages'][$pageKey]['overlay_style'] = trim($heroData['overlay_style']);
                }
            }
        }

        // Save to JSON
        $filePath = self::getSettingsFilePath();
        $dir = dirname($filePath);
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true, true);
        }

        File::put($filePath, json_encode($currentSettings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return redirect()->route('admin.settings.index', ['tab' => $tab])
            ->with('success', 'Global Settings & Page Hero Overrides successfully updated!');
    }
}
