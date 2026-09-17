<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WebpageController extends Controller
{
    private function getHeroFilePath()
    {
        return storage_path('app/website_content/home_hero.json');
    }

    private function getHighlightsFilePath()
    {
        return storage_path('app/website_content/home_highlights.json');
    }

    private function getWelcomeFilePath()
    {
        return storage_path('app/website_content/home_welcome.json');
    }

    private function getWhyGpoFilePath()
    {
        return storage_path('app/website_content/home_why_gpo.json');
    }

    private function normalizeSlide($slide)
    {
        if (!isset($slide['media'])) {
            $slide['media'] = $slide['image'] ?? 'images/dahi_vada.jpg';
        }
        if (!isset($slide['media_type'])) {
            $ext = strtolower(pathinfo($slide['media'], PATHINFO_EXTENSION));
            if (in_array($ext, ['mp4', 'webm', 'ogg', 'mov'])) {
                $slide['media_type'] = 'video';
            } elseif ($ext === 'gif') {
                $slide['media_type'] = 'gif';
            } else {
                $slide['media_type'] = 'image';
            }
        }

        // Normalize buttons array (supporting 1, 2, 3, or more buttons)
        if (!isset($slide['buttons']) || !is_array($slide['buttons']) || empty($slide['buttons'])) {
            $btns = [];
            if (!empty($slide['btn1_text'])) {
                $btns[] = ['text' => $slide['btn1_text'], 'url' => $slide['btn1_url'] ?? '/menu', 'style' => 'amber'];
            }
            if (!empty($slide['btn2_text'])) {
                $btns[] = ['text' => $slide['btn2_text'], 'url' => $slide['btn2_url'] ?? '/menu', 'style' => 'spruce'];
            }
            if (empty($btns)) {
                $btns[] = ['text' => 'ORDER NOW', 'url' => '/menu', 'style' => 'amber'];
                $btns[] = ['text' => 'EXPLORE OUR MENU', 'url' => '/menu', 'style' => 'spruce'];
            }
            $slide['buttons'] = $btns;
        }

        return $slide;
    }

    public function getHeroData()
    {
        $path = $this->getHeroFilePath();
        if (File::exists($path)) {
            $content = json_decode(File::get($path), true);
            if (is_array($content)) {
                $rawSlides = [];
                if (isset($content['slides']) && is_array($content['slides'])) {
                    $rawSlides = $content['slides'];
                } elseif (isset($content['slide_1'])) {
                    foreach ($content as $s) {
                        if (is_array($s)) $rawSlides[] = $s;
                    }
                } elseif (isset($content[0]) && is_array($content[0])) {
                    $rawSlides = $content;
                }

                if (!empty($rawSlides)) {
                    $slides = [];
                    foreach ($rawSlides as $slide) {
                        $slides[] = $this->normalizeSlide($slide);
                    }
                    return $slides;
                }
            }
        }

        return [
            [
                'badge' => 'Since 1976',
                'icon' => '🌿',
                'heading' => "THE ORIGINAL\nTASTE OF\nLUCKNOW",
                'lead' => 'Soft. Creamy. Chilled. Unforgettable.',
                'description' => 'Discover the legendary taste of Original GPO Ke Thandey Dahi Bade — a Lucknow favourite served with the same love for tradition, flavour and authenticity.',
                'buttons' => [
                    ['text' => 'ORDER NOW', 'url' => '/menu', 'style' => 'amber'],
                    ['text' => 'EXPLORE OUR MENU', 'url' => '/menu', 'style' => 'spruce'],
                ],
                'media_type' => 'image',
                'media' => 'images/dahi_vada.jpg',
            ],
            [
                'badge' => 'Since 1976',
                'icon' => '🌿',
                'heading' => "A LEGACY THAT\nTASTES\nDIFFERENT",
                'lead' => 'Generations Have Loved It. Lucknow Still Does.',
                'description' => 'From a humble beginning in 1976 to becoming a familiar name for authentic Dahi Bade in Lucknow, GPO continues to serve the taste that brings people back.',
                'buttons' => [
                    ['text' => 'DISCOVER OUR STORY', 'url' => '/story', 'style' => 'amber'],
                    ['text' => 'VISIT OUR OUTLET', 'url' => '/contact', 'style' => 'spruce'],
                ],
                'media_type' => 'image',
                'media' => 'images/lucknow_heritage.jpg',
            ],
            [
                'badge' => 'Awadhi Culinary Heritage',
                'icon' => '🌿',
                'heading' => "NOT JUST DAHI BADE.\nIT’S A TASTE OF\nLUCKNOW.",
                'lead' => '',
                'description' => 'Experience our signature Thandey Dahi Bade, Moong Dal Chilla, Samosa, Samosa Chaat and more — prepared to bring together authentic flavours and the timeless charm of Lucknow.',
                'buttons' => [
                    ['text' => 'VIEW MENU', 'url' => '/menu', 'style' => 'amber'],
                    ['text' => 'EXPLORE FRANCHISE', 'url' => '/franchise', 'style' => 'spruce'],
                ],
                'media_type' => 'image',
                'media' => 'images/chaat.jpg',
            ],
        ];
    }

    public function getHighlightsData()
    {
        $path = $this->getHighlightsFilePath();
        if (File::exists($path)) {
            $content = json_decode(File::get($path), true);
            if (is_array($content) && !empty($content)) {
                return $content;
            }
        }

        return [
            [
                'image' => 'images/dahi_vada.jpg',
                'heading' => 'THE ORIGINAL TASTE OF LUCKNOW',
                'subheading' => 'Since 1976',
                'description' => 'A traditional Lucknow recipe perfected over generations with pure curd and aromatic spices.',
            ],
            [
                'image' => 'images/lucknow_heritage.jpg',
                'heading' => 'A STORY TO TELL',
                'subheading' => 'ABOUT OUR HERITAGE',
                'description' => 'Over four decades of pure hospitality, tradition, and taste.',
            ],
            [
                'image' => 'images/chaat.jpg',
                'heading' => 'AUTHENTIC FLAVOURS',
                'subheading' => 'TRADITIONAL RECIPES',
                'description' => 'Crafted with pure curd, slow aeration, and generational spices.',
            ],
        ];
    }

    public function getWelcomeData()
    {
        $defaultParagraphs = [
            [
                'tag' => '1. Origin (1976)',
                'title' => 'Founder Story',
                'subtitle' => 'Sant Ram Gupta Ji & GPO history.',
                'text' => "Founded by Sant Ram Gupta ji in 1976, GPO Ke Thandey Dahi Bade began its journey near the General Post Office in Hazratganj, Lucknow. What started as a humble food destination gradually became a beloved name among generations of food lovers.",
            ],
            [
                'tag' => '2. Philosophy',
                'title' => 'Brand Philosophy',
                'subtitle' => 'Authentic taste & quality standards.',
                'text' => "Our philosophy has always remained simple:\nAuthentic taste. Fresh ingredients. Traditional preparation. Consistent quality.",
            ],
            [
                'tag' => '3. Present Era',
                'title' => 'Modern Journey',
                'subtitle' => "Preserving flavours for today's visitors.",
                'text' => "Today, we continue that journey by preserving the flavours and food traditions that made GPO special while creating a convenient and welcoming experience for today’s customers.",
            ],
        ];

        $path = $this->getWelcomeFilePath();
        if (File::exists($path)) {
            $content = json_decode(File::get($path), true);
            if (is_array($content) && !empty($content)) {
                if (empty($content['paragraphs']) || !is_array($content['paragraphs'])) {
                    $paragraphs = [];
                    if (!empty($content['founder_story'])) {
                        $paragraphs[] = [
                            'tag' => '1. Origin (1976)',
                            'title' => 'Founder Story',
                            'subtitle' => 'Sant Ram Gupta Ji & GPO history.',
                            'text' => $content['founder_story'],
                        ];
                    }
                    if (!empty($content['philosophy'])) {
                        $paragraphs[] = [
                            'tag' => '2. Philosophy',
                            'title' => 'Brand Philosophy',
                            'subtitle' => 'Authentic taste & quality standards.',
                            'text' => $content['philosophy'],
                        ];
                    }
                    if (!empty($content['current_journey'])) {
                        $paragraphs[] = [
                            'tag' => '3. Present Era',
                            'title' => 'Modern Journey',
                            'subtitle' => "Preserving flavours for today's visitors.",
                            'text' => $content['current_journey'],
                        ];
                    }
                    $content['paragraphs'] = !empty($paragraphs) ? $paragraphs : $defaultParagraphs;
                }
                return $content;
            }
        }

        return [
            'badge' => 'Welcome To',
            'heading' => 'ORIGINAL GPO KE THANDEY DAHI BADE',
            'tagline' => 'A Taste of Lucknow Since 1976',
            'quote' => "Some food is enjoyed.\nSome food is remembered.\nAnd some food becomes a part of a city’s identity.\nGPO Ke Thandey Dahi Bade is one such name.",
            'founder_story' => $defaultParagraphs[0]['text'],
            'philosophy' => $defaultParagraphs[1]['text'],
            'current_journey' => $defaultParagraphs[2]['text'],
            'paragraphs' => $defaultParagraphs,
            'button_text' => 'KNOW OUR STORY ➔',
            'button_url' => '/story',
            'image' => 'images/storefront.jpg',
        ];
    }

    public function getWhyGpoData()
    {
        $defaultCards = [
            [
                'title' => 'SINCE 1976',
                'description' => 'Decades of serving Lucknow with a commitment to traditional flavours and authentic food.',
                'style' => 'terracotta',
            ],
            [
                'title' => 'THE ORIGINAL EXPERIENCE',
                'description' => 'Our signature Thandey Dahi Bade remain at the heart of the GPO experience.',
                'style' => 'teal',
            ],
            [
                'title' => 'AUTHENTIC FLAVOURS',
                'description' => 'Traditional recipes and carefully balanced flavours create the taste our customers remember.',
                'style' => 'teal',
            ],
            [
                'title' => 'FRESH & HYGIENIC',
                'description' => 'We believe delicious food should also be prepared with attention to freshness, hygiene and quality.',
                'style' => 'teal',
            ],
            [
                'title' => 'A LUCKNOW FAVOURITE',
                'description' => 'A familiar name for people looking to experience the traditional taste of Dahi Bade in Lucknow.',
                'style' => 'teal',
            ],
            [
                'title' => 'MADE WITH CARE',
                'description' => 'Every plate represents our commitment to flavour, consistency and customer satisfaction.',
                'style' => 'terracotta',
            ],
        ];

        $path = $this->getWhyGpoFilePath();
        if (File::exists($path)) {
            $content = json_decode(File::get($path), true);
            if (is_array($content) && !empty($content)) {
                if (!isset($content['items']) || !is_array($content['items'])) {
                    $content['items'] = $defaultCards;
                }
                return $content;
            }
        }

        return [
            'badge_icon' => '🌿',
            'heading' => 'WHY PEOPLE LOVE GPO',
            'subheading' => 'A Legacy Built on Taste',
            'items' => $defaultCards,
        ];
    }

    public function index()
    {
        return view('admin.website-pages.index');
    }

    public function home()
    {
        $slides = $this->getHeroData();
        $highlights = $this->getHighlightsData();
        $welcome = $this->getWelcomeData();
        $whyGpo = $this->getWhyGpoData();
        return view('admin.website-pages.home', compact('slides', 'highlights', 'welcome', 'whyGpo'));
    }

    public function updateHero(Request $request)
    {
        $inputSlides = $request->input('slides', []);
        $savedSlides = [];

        if (!is_array($inputSlides) || count($inputSlides) === 0) {
            return back()->with('error', 'Kam se kam ek slide honi chahiye.');
        }

        $uploadDir = public_path('uploads/hero');
        if (!File::isDirectory($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true, true);
        }

        foreach ($inputSlides as $index => $slideData) {
            $mediaType = $slideData['media_type'] ?? 'image';
            if (!in_array($mediaType, ['image', 'video', 'gif'])) {
                $mediaType = 'image';
            }

            $mediaPath = $slideData['media'] ?? 'images/dahi_vada.jpg';

            // Check if a new file was uploaded for this slide
            if ($request->hasFile("slides.{$index}.media_file")) {
                $file = $request->file("slides.{$index}.media_file");
                if ($file->isValid()) {
                    $ext = strtolower($file->getClientOriginalExtension());
                    $filename = time() . '_' . $index . '_' . uniqid() . '.' . $ext;
                    $file->move($uploadDir, $filename);
                    $mediaPath = 'uploads/hero/' . $filename;

                    if (in_array($ext, ['mp4', 'webm', 'ogg', 'mov'])) {
                        $mediaType = 'video';
                    } elseif ($ext === 'gif') {
                        $mediaType = 'gif';
                    } else {
                        $mediaType = 'image';
                    }
                }
            }

            // Process dynamic buttons
            $slideButtons = [];
            if (isset($slideData['buttons']) && is_array($slideData['buttons'])) {
                foreach ($slideData['buttons'] as $btn) {
                    $btnText = trim($btn['text'] ?? '');
                    if ($btnText !== '') {
                        $slideButtons[] = [
                            'text' => $btnText,
                            'url' => trim($btn['url'] ?? '/menu'),
                            'style' => $btn['style'] ?? 'amber',
                        ];
                    }
                }
            }

            $savedSlides[] = [
                'badge' => $slideData['badge'] ?? '',
                'icon' => $slideData['icon'] ?? '🌿',
                'heading' => $slideData['heading'] ?? '',
                'lead' => $slideData['lead'] ?? '',
                'description' => $slideData['description'] ?? '',
                'buttons' => $slideButtons,
                'btn1_text' => $slideButtons[0]['text'] ?? '',
                'btn1_url' => $slideButtons[0]['url'] ?? '',
                'btn2_text' => $slideButtons[1]['text'] ?? '',
                'btn2_url' => $slideButtons[1]['url'] ?? '',
                'media_type' => $mediaType,
                'media' => $mediaPath,
            ];
        }

        $dir = dirname($this->getHeroFilePath());
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true, true);
        }

        File::put($this->getHeroFilePath(), json_encode($savedSlides, JSON_PRETTY_PRINT));

        return redirect()->route('admin.website-pages.home')->with('success', 'Hero slides and buttons successfully updated!');
    }

    public function updateHighlights(Request $request)
    {
        $inputCards = $request->input('cards', []);
        $savedCards = [];

        $uploadDir = public_path('uploads/highlights');
        if (!File::isDirectory($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true, true);
        }

        $defaultImages = [
            'images/dahi_vada.jpg',
            'images/lucknow_heritage.jpg',
            'images/chaat.jpg',
        ];

        for ($i = 0; $i < 3; $i++) {
            $card = $inputCards[$i] ?? [];
            $imagePath = $card['image'] ?? ($defaultImages[$i] ?? 'images/dahi_vada.jpg');

            if ($request->hasFile("cards.{$i}.image_file")) {
                $file = $request->file("cards.{$i}.image_file");
                if ($file->isValid()) {
                    $ext = strtolower($file->getClientOriginalExtension());
                    $filename = time() . '_card_' . ($i + 1) . '_' . uniqid() . '.' . $ext;
                    $file->move($uploadDir, $filename);
                    $imagePath = 'uploads/highlights/' . $filename;
                }
            }

            $savedCards[] = [
                'heading' => trim($card['heading'] ?? ''),
                'subheading' => trim($card['subheading'] ?? ''),
                'description' => trim($card['description'] ?? ''),
                'image' => $imagePath,
            ];
        }

        $dir = dirname($this->getHighlightsFilePath());
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true, true);
        }

        File::put($this->getHighlightsFilePath(), json_encode($savedCards, JSON_PRETTY_PRINT));

        return redirect()->route('admin.website-pages.home', ['section' => 'highlights_strip'])
            ->with('success', 'Highlights strip (3 cards) successfully updated!');
    }

    public function updateWelcome(Request $request)
    {
        $welcome = $request->input('welcome', []);
        $imagePath = $welcome['image'] ?? 'images/storefront.jpg';

        $uploadDir = public_path('uploads/welcome');
        if (!File::isDirectory($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true, true);
        }

        if ($request->hasFile('welcome.image_file')) {
            $file = $request->file('welcome.image_file');
            if ($file->isValid()) {
                $ext = strtolower($file->getClientOriginalExtension());
                $filename = time() . '_welcome_' . uniqid() . '.' . $ext;
                $file->move($uploadDir, $filename);
                $imagePath = 'uploads/welcome/' . $filename;
            }
        }

        $inputParagraphs = $request->input('welcome.paragraphs', []);
        $savedParagraphs = [];
        if (is_array($inputParagraphs)) {
            foreach ($inputParagraphs as $p) {
                $text = trim($p['text'] ?? '');
                if ($text !== '') {
                    $savedParagraphs[] = [
                        'tag' => trim($p['tag'] ?? ''),
                        'title' => trim($p['title'] ?? ''),
                        'subtitle' => trim($p['subtitle'] ?? ''),
                        'text' => $text,
                    ];
                }
            }
        }

        $savedWelcome = [
            'badge' => trim($welcome['badge'] ?? 'Welcome To'),
            'heading' => trim($welcome['heading'] ?? "ORIGINAL GPO KE THANDEY DAHI BADE"),
            'tagline' => trim($welcome['tagline'] ?? 'A Taste of Lucknow Since 1976'),
            'quote' => trim($welcome['quote'] ?? ''),
            'founder_story' => $savedParagraphs[0]['text'] ?? '',
            'philosophy' => $savedParagraphs[1]['text'] ?? '',
            'current_journey' => $savedParagraphs[2]['text'] ?? '',
            'paragraphs' => $savedParagraphs,
            'button_text' => trim($welcome['button_text'] ?? 'KNOW OUR STORY ➔'),
            'button_url' => trim($welcome['button_url'] ?? '/story'),
            'image' => $imagePath,
        ];

        $dir = dirname($this->getWelcomeFilePath());
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true, true);
        }

        File::put($this->getWelcomeFilePath(), json_encode($savedWelcome, JSON_PRETTY_PRINT));

        return redirect()->route('admin.website-pages.home', ['section' => 'welcome_section'])
            ->with('success', 'Welcome Section (GPO Story & Legacy) successfully updated!');
    }

    public function updateWhyGpo(Request $request)
    {
        $input = $request->input('why_gpo', []);
        $items = $request->input('why_gpo.items', []);
        $savedItems = [];

        if (is_array($items)) {
            foreach ($items as $item) {
                $title = trim($item['title'] ?? '');
                $desc = trim($item['description'] ?? '');
                $style = in_array($item['style'] ?? 'teal', ['terracotta', 'teal']) ? $item['style'] : 'teal';

                if ($title !== '' || $desc !== '') {
                    $savedItems[] = [
                        'title' => $title,
                        'description' => $desc,
                        'style' => $style,
                    ];
                }
            }
        }

        $savedData = [
            'badge_icon' => trim($input['badge_icon'] ?? '🌿'),
            'heading' => trim($input['heading'] ?? 'WHY PEOPLE LOVE GPO'),
            'subheading' => trim($input['subheading'] ?? 'A Legacy Built on Taste'),
            'items' => $savedItems,
        ];

        $dir = dirname($this->getWhyGpoFilePath());
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true, true);
        }

        File::put($this->getWhyGpoFilePath(), json_encode($savedData, JSON_PRETTY_PRINT));

        return redirect()->route('admin.website-pages.home', ['section' => 'why_gpo'])
            ->with('success', 'Why People Love GPO (Section 4) successfully updated!');
    }
}
