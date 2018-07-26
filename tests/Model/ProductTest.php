<?php

final class ProductTest extends \Tests\G2ATestCase
{
    public $product = '{
            "id": "10000032198001",
            "name": "Minecraft: Windows 10 Edition Microsoft Key GLOBAL",
            "type": "egoods",
            "slug": "/minecraft-windows-10-edition-microsoft-key-global-i10000032198001",
            "qty": 5800,
            "minPrice": 0.98,
            "thumbnail": "https://images.g2a.com/images/58x58/0x1x1/5447d40835cd/5912573cae653a9600349a80",
            "smallImage": "https://images.g2a.com/images/230x336/0x1x1/b8b90984a6cc/5912573cae653a9600349a80",
            "description": "<h3 style=\"font-size: 16px;\">Freedom of creation</h3><p>Build whatever you like with a variety of different blocks. Create advanced homes and objects, develop complex cities, villages, mines and even entire environments. Cut down trees, mine stone, collect grass and fight with dangerous monsters. An advanced crafting mechanism and endless resources allow you to create almost everything you can imagine.</p><p>Feel the satisfaction of building your own town, animal pens, farmlands, and even an automated mushroom farm!</p><h3 style=\"font-size: 16px;\">Breathtaking landscapes</h3><p>Imagine an endless world full of cubic mountains, valleys, and canyons. All the visuals look nice and natural and the pixel textures provide a unique charm. Explore endless deserts, rainforests, underground tunnels and mines, hidden temples and even another dimension.</p><p>Get surprised by the abundance of animals, plants, and building materials. Immerse yourself into the unpredictable, wild and beautiful world of <strong>Minecraft</strong>.</p><h3 style=\"font-size: 16px;\">Infinity &amp; randomness</h3><p>Each time when a new game starts, a completely fresh world is being generated. The whole new geographic regions emerge. Green valleys, swamps, mountains, and deserts. Everything in Minecraft is infinite, so you can enjoy tons of hours of sightseeing!</p><h3 style=\"font-size: 16px;\">Survive the darkness</h3><p>Start a new game and you will appear in a random place of a randomly generated world. As a lonely player without any equipment, you are completely on your own, doomed to survive. Hurry up because you have only one day to build a shelter, find food, and to avoid meeting monsters at night. If you fail to build a bed before night, you will be forced to wait and listen to the sounds of monsters. Beware of creepers, they are very sneaky and can destroy everything you build. The first night always is an extremely exciting experience!Build a safe shelter and try to survive as long as possible. Collect fruit, plant vegetables, and bake meat. Stay away from the darkness because when the night comes, monsters awake.</p><p>Set a trap, forge armor &amp; sword and defend yourself against dangerous enemies.</p><h3 style=\"font-size: 16px;\">Mine raw materials</h3><p>Create well-developed mines to extract coal, iron, gold, silver and other important raw materials. Visit randomly generated caves in search of rare diamonds, destroy the monster\'s habitats in abandoned dungeons and be careful not to fall into the lava.</p><h3 style=\"font-size: 16px;\">Texture packs &amp; Maps &amp; Skins</h3><p>Minecraft is a very popular game which is enjoyed by millions of players around the world. Enjoy the Minecraft in its various faces. Try different skins, texture packs and download custom world maps created by other, extremely talented players. Discover endless amount of various mods which can completely change your game.</p><h3 style=\"font-size: 16px;\">Enjoyable multiplayer mode</h3><p>Crafting with your friends can bring hours of entertainment! Raise majestic constructions and build infinite towns &amp; villages with players from all over the world. Go public and show your excellent building skills online.</p><h3 style=\"font-size: 16px;\">Discover polished Minecraft!</h3><p><strong>Minecraft: Windows 10 Edition</strong> is a lot more optimized, smoother, and positive looking.</p><p>Enjoy completely different options menu, 56 total achievements more than PC Minecraft.</p><p>Buy custom skins and texture packs from Minecraft Store, connect with your friends through Xbox Live. Easily change your game mode at any time. Download and export world files with the ending .mcworld to share with other people. Invite friends to play on your own personal world or create a server to play online with them. Minecraft: Windows 10 Edition is compatible with various virtual reality headsets and with the Microsoft team working on it to make the game smoother and more optimized, you can enjoy tons of new implementations!</p>",
            "region": "GLOBAL",
            "developer": "",
            "publisher": "",
            "platform": "Other",
            "restrictions": {
                "pegi_violence": false,
                "pegi_profanity": false,
                "pegi_discrimination": false,
                "pegi_drugs": false,
                "pegi_fear": false,
                "pegi_gambling": false,
                "pegi_online": false,
                "pegi_sex": false
            },
            "requirements": {
                "minimal": {
                    "reqprocessor": "",
                    "reqgraphics": "",
                    "reqmemory": "",
                    "reqdiskspace": "",
                    "reqsystem": "",
                    "reqother": ""
                },
                "recommended": {
                    "reqprocessor": "",
                    "reqgraphics": "",
                    "reqmemory": "",
                    "reqdiskspace": "",
                    "reqsystem": "",
                    "reqother": ""
                }
            },
            "videos": [
                {
                    "type": "YOUTUBE",
                    "url": "https://www.youtube.com/embed/MmB9b5njVbA"
                }
            ],
            "categories": [
                {
                    "id": 2,
                    "name": "All products"
                },
                {
                    "id": 2,
                    "name": "Default Category"
                },
                {
                    "id": 11,
                    "name": "All"
                },
                {
                    "id": 543,
                    "name": "Sort List"
                },
                {
                    "id": 544,
                    "name": "Adventure"
                },
                {
                    "id": 791,
                    "name": "Microsoft"
                },
                {
                    "id": 2126,
                    "name": "Ofertas Latinoamérica"
                },
                {
                    "id": 2174,
                    "name": "SPRING SALE"
                },
                {
                    "id": 2223,
                    "name": "Under 5€"
                }
            ]
        }';

    public function testProductInit()
    {
        $productResponse = json_decode($this->product, true);
        $product = new \G2A\IntegrationApi\Model\Product($productResponse);

        $this->assertEquals($productResponse['id'], $product->getId());
        $this->assertEquals($productResponse['name'], $product->getName());
        $this->assertEquals($productResponse['type'], $product->getType());
        $this->assertEquals($productResponse['slug'], $product->getSlug());
        $this->assertEquals($productResponse['qty'], $product->getQty());
        $this->assertEquals($productResponse['minPrice'], $product->getMinPrice());
        $this->assertEquals($productResponse['thumbnail'], $product->getThumbnail());
        $this->assertEquals($productResponse['smallImage'], $product->getSmallImage());
        $this->assertEquals($productResponse['description'], $product->getDescription());
        $this->assertEquals($productResponse['region'], $product->getRegion());
        $this->assertEquals($productResponse['developer'], $product->getDeveloper());
        $this->assertEquals($productResponse['publisher'], $product->getPublisher());
        $this->assertEquals($productResponse['platform'], $product->getPlatform());

        $restrictions = $product->getRestrictions();
        $this->assertEquals(false, $restrictions['pegi_violence']);
        $this->assertNotEquals(true, $restrictions['pegi_sex']);
        $requirements = $product->getRequirements();
        $this->assertEquals($productResponse['requirements']['minimal']['reqmemory'], $requirements['minimal']['reqmemory']);
        $this->assertEquals($productResponse['requirements']['recommended']['reqprocessor'], $requirements['recommended']['reqprocessor']);
        $videos = $product->getVideos();
        $this->assertEquals($productResponse['videos'][0]['type'], $videos[0]['type']);
        $categories = $product->getCategories();
        $this->assertEquals($productResponse['categories'], $categories);
    }

    public function testSetGetId()
    {
        $expectedValue = 123;
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getId());
        $product->setId($expectedValue);
        $this->assertEquals($expectedValue, $product->getId());
    }

    public function testSetGetName()
    {
        $expectedValue = 'Minecraft: Windows 10 Edition Microsoft Key GLOBAL';
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getName());
        $product->setName($expectedValue);
        $this->assertEquals($expectedValue, $product->getName());
    }

    public function testSetGetType()
    {
        $expectedValue = 'egoods';
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getType());
        $product->setType($expectedValue);
        $this->assertEquals($expectedValue, $product->getType());
    }

    public function testSetGetSlug()
    {
        $expectedValue = '/minecraft-windows-10-edition-microsoft-key-global-i10000032198001';
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getSlug());
        $product->setSlug($expectedValue);
        $this->assertEquals($expectedValue, $product->getSlug());
    }

    public function testSetGetQty()
    {
        $expectedValue = 123;
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getQty());
        $product->setQty($expectedValue);
        $this->assertEquals($expectedValue, $product->getQty());
    }

    public function testSetGetMinPrice()
    {
        $expectedValue = 99.99;
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getMinPrice());
        $product->setMinPrice($expectedValue);
        $this->assertEquals($expectedValue, $product->getMinPrice());
    }

    public function testSetGetThumbnail()
    {
        $expectedValue = 'https://images.g2a.com/images/58x58/0x1x1/5447d40835cd/5912573cae653a9600349a80';
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getThumbnail());
        $product->setThumbnail($expectedValue);
        $this->assertEquals($expectedValue, $product->getThumbnail());
    }

    public function testSetGetSmallImage()
    {
        $expectedValue = 'https://images.g2a.com/images/58x58/0x1x1/5447d40835cd/5912573cae653a9600349a80';
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getSmallImage());
        $product->setSmallImage($expectedValue);
        $this->assertEquals($expectedValue, $product->getSmallImage());
    }

    public function testSetGetDescription()
    {
        $expectedValue = 'Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor. Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Aliquam erat ac ipsum. Integer aliquam purus. Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo vel bibendum sapien massa ac turpis faucibus orci luctus non, consectetuer lobortis quis, varius in, purus. Integer ultrices posuere cubilia Curae, Nulla ipsum dolor lacus, suscipit adipiscing. Cum sociis natoque penatibus et ultrices volutpat. Nullam wisi ultricies a, gravida vitae, dapibus risus ante sodales lectus blandit eu, tempor diam pede cursus vitae, ultricies eu, faucibus quis, porttitor eros cursus lectus, pellentesque eget, bibendum a, gravida ullamcorper quam. Nullam viverra consectetuer. Quisque cursus et, porttitor risus. Aliquam sem. In hendrerit nulla quam nunc, accumsan congue. Lorem ipsum primis in nibh vel risus. Sed vel lectus. Ut sagittis, ipsum dolor quam.';
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getDescription());
        $product->setDescription($expectedValue);
        $this->assertEquals($expectedValue, $product->getDescription());
    }

    public function testSetGetRegion()
    {
        $expectedValue = 'GLOBAL';
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getRegion());
        $product->setRegion($expectedValue);
        $this->assertEquals($expectedValue, $product->getRegion());
    }

    public function testSetGetDeveloper()
    {
        $expectedValue = 'Blizzard';
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getDeveloper());
        $product->setDeveloper($expectedValue);
        $this->assertEquals($expectedValue, $product->getDeveloper());
    }

    public function testSetGetPublisher()
    {
        $expectedValue = 'Blizzard';
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getPublisher());
        $product->setPublisher($expectedValue);
        $this->assertEquals($expectedValue, $product->getPublisher());
    }

    public function testSetGetPlatform()
    {
        $expectedValue = 'Steam';
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getPlatform());
        $product->setPlatform($expectedValue);
        $this->assertEquals($expectedValue, $product->getPlatform());
    }

    public function testSetGetRestrictions()
    {
        $expectedValue = [
            'pegi_profanity' => true,
            'pegi_sex'       => false,
        ];
        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getRestrictions());
        $product->setRestrictions($expectedValue);
        $this->assertEquals($expectedValue, $product->getRestrictions());
    }

    public function testSetGetRequirements()
    {
        $expectedValue = [
            'minimal' => [
                'reqprocessor' => 'asdasd',
                'reqgraphics'  => 'dbcvb',
                'reqmemory'    => '12323',
                'reqdiskspace' => 'fds',
                'reqsystem'    => '24324',
                'reqother'     => 'sdfsf',
            ],
            'recommended' => [
                'reqprocessor' => '',
                'reqgraphics'  => '',
                'reqmemory'    => '',
                'reqdiskspace' => '',
                'reqsystem'    => '',
                'reqother'     => '',
            ],
        ];

        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getRequirements());
        $product->setRequirements($expectedValue);
        $this->assertEquals($expectedValue, $product->getRequirements());
    }

    public function testSetGetVideos()
    {
        $expectedValue = [
            'type' => 'YOUTUBE',
            'url'  => 'https://www.youtube.com/embed/MmB9b5njVbA',
        ];

        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getVideos());
        $product->setVideos($expectedValue);
        $this->assertEquals($expectedValue, $product->getVideos());
    }

    public function testSetGetCategories()
    {
        $expectedValue = [
            [
                'id'   => 2,
                'name' => 'All products',
            ],
            [
                'id'   => 2,
                'name' => 'Default Category',
            ],
        ];

        $product = new \G2A\IntegrationApi\Model\Product([]);

        $this->assertNull($product->getCategories());
        $product->setCategories($expectedValue);
        $this->assertEquals($expectedValue, $product->getCategories());
    }
}
