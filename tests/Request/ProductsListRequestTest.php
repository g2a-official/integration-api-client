<?php
namespace Tests\Request;

use G2A\IntegrationApi\Model\Product;
use G2A\IntegrationApi\Request\ProductsListRequest;
use GuzzleHttp\Psr7\Response;
use Tests\G2ATestCase;

final class ProductsListRequestTest extends G2ATestCase
{
    const ORDER_ID = 1531211656;
    const RESPONSE_JSON = '{
        "total": 105,
        "page": 1,
        "docs": [
            {
                "id": "10000068865001",
                "name": "Star Wars Battlefront 2 (2017) Origin Key GLOBAL",
                "type": "egoods",
                "slug": "/star-wars-battlefront-2-2017-origin-key-global-i10000068865001",
                "qty": 101,
                "minPrice": 25.25,
                "thumbnail": "https://images.g2a.com/images/58x58/0x1x1/7b56dc1baf21/59e879b05bafe38be8312c25",
                "smallImage": "https://images.g2a.com/images/230x336/0x1x1/f40a3ac4375c/59e879b05bafe38be8312c25",
                "description": "<p>If you dream about a military career among the stars and love George Lucas\' universe, then <strong>Star Wars Battlefront II</strong> is the game for you. Earth-shaking battles, compelling story, stunning visuals, it\'s a true Star Wars experience for both the Light and Dark Side of the Force!</p><h3 style=\"font-size: 16px;\">Singleplayer campaign</h3><p>Meet Iden Ersio, the commander of an elite TIE Fighter squadron called the Inferno Squad, merging aerial superiority with commando tactics on the ground. The story begins when she sees the second Death Star explode, and things progress rapidly from there. Join her on a thirty-year journey across the galaxy far away, and see if she manages to complete the Emperor\'s final order.Characters you know and love make their guest appearances, letting you play as Kylo Ren or Luke Skywalker in missions tailored to these characters.It\'s an excellent singleplayer experience bridging the gap between Episodes VI and VII.</p><h3 style=\"font-size: 16px;\">Specialised classes</h3><p><strong>SW: Battlefront II</strong> brings class-based gameplay to the multiplayer to diversify your experience. Pick an Assault Trooper to push the frontlines with a rifle and devastating shotgun to thin out the enemy ranks. Roll Heavy trooper to lay down suppression fire with a minigun and push through thanks to powerful shields. If you enjoy long-distance support and harrying your foe pick the Specialist for sniper rifles and handy traps. If you choose Officer you\'ll provide your team with extremely useful abilities boosting their resolve and survivability on the field of battle.</p><h3 style=\"font-size: 16px;\">Iconic locations, famous battles</h3><p>Visit a large number of the planets you know and remember from the Star Wars movies. Explore Theed, Crait, and many other locations drawn from the long history of the galaxy far away. Join armies from several periods: Clones, Droids, Rebels, First Order and others are recruiting and in need of your gun arm and keen eye.</p><h3 style=\"font-size: 16px;\">Heroes and machines</h3><p>The token system from the first game was reworked from the ground up. Gather points during matches by scoring points for your team in various ways, and unlock access to more powerful units with them. Heavily armored battledroids, Imperial walkers, and powerful heroes are ripe for the taking.Star Wars Battlefront II allows you to experience duels previously unseen in the movies. Test Darth Maul\'s speed and ruthlessness against Rey\'s charge and mind control. Teach Kylo Ren the true command of the Force as Master Yoda, or help Captain Phasma catch the traitorous Finn. There are even more heroes for you to discover and work your way towards.</p><h3 style=\"font-size: 16px;\">Stunning visuals</h3><p><strong>Star Wars Battlefront 2</strong> pushed the limits of visual fidelity in games. The photogrammetry technology reaches new heights in DICE\'s space shooter, provided you have the machine to run it, of course. Crisp textures, realistic models, detailed facial expressions. It\'s a visual feast worthy of large screens.</p>",
                "region": "GLOBAL",
                "developer": "EA DICE",
                "publisher": "Electronic Arts",
                "platform": "Origin",
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
                        "url": "https://www.youtube.com/embed/Kae-JjbLsgA"
                    }
                ],
                "categories": []
            },
            {
                "id": "10000149026001",
                "name": "Voxel Warfare Online Steam Key GLOBAL",
                "type": "egoods",
                "slug": "/voxel-warfare-online-steam-key-global-i10000149026001",
                "qty": 20,
                "minPrice": 1.5,
                "thumbnail": "https://images.g2a.com/images/58x58/0x1x1/dfe0ba7f6dd2/5ab5d6afae653a51c1249d24",
                "smallImage": "https://images.g2a.com/images/230x336/0x1x1/47d181a172aa/5ab5d6afae653a51c1249d24",
                "description": "<p><span style=\"color: inherit;\">Warbit is the name of anti-terrorist group which is found by all countries. Warbit Union took an oath to find and destroy all the active terrorists worldwide. You can join Warbit Union and fight for such honorful mission.</span></p><p><span style=\"color: inherit;\"><br></span></p><p>Make a Team</p><p>There is many teams in Warbit Union. If you have friends which are skilled in combat you can unite with them and create a team in Warbit Union.</p><p><br></p><p>Roles</p><p>In Warbit Union trainings and battlefields everyone has roles.</p><p>Assault - Medic - Support - Sniper</p><p><br></p><p>Tactics</p><p>In the battlefield there are many ways to defence lines of both sides. If you find and break the resistances in those ways you can easily overwhelm the enemies.                            </p>",
                "region": "GLOBAL",
                "developer": "Rakarnov Studios",
                "publisher": "Serdar Ateş",
                "platform": "Steam",
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
                        "reqprocessor": "2 GHz Dual-Core 32-bit CPU",
                        "reqgraphics": "DirectX11 Compatible GPU with 512 MB Video RAM",
                        "reqmemory": "1 GB RAM",
                        "reqdiskspace": "100 MB",
                        "reqsystem": "Windows 7 , 8 , 8.1 , 10",
                        "reqother": "Broadband Internet connection"
                    },
                    "recommended": {
                        "reqprocessor": "2 GHz Dual-Core 32-bit CPU",
                        "reqgraphics": "DirectX11 Compatible GPU with 1 GB Video RAM",
                        "reqmemory": "2 GB RAM",
                        "reqdiskspace": "100 MB",
                        "reqsystem": "Windows 7 , 8 , 8.1 , 10",
                        "reqother": ""
                    }
                },
                "videos": [],
                "categories": []
            }
        ]
    }';

    public function testConstructorWithoutParams()
    {
        $request = new ProductsListRequest($this->getClient());

        $this->assertNull($request->getPage());
        $this->assertNull($request->getId());
        $this->assertNull($request->getMinQty());
        $this->assertNull($request->getMinPriceFrom());
        $this->assertNull($request->getMinPriceTo());
    }

    public function testConstructorWithParams()
    {
        $apiResponse = new Response(200, [], self::RESPONSE_JSON);
        $client = $this->getClient([$apiResponse]);

        $request = new ProductsListRequest($client);
        $request
            ->setPage(2)
            ->setId('10000006157002')
            ->setMinQty(1)
            ->setMinPriceFrom(1.11)
            ->setMinPriceTo(99.99)
            ->call();

        $this->assertEquals(2, $request->getPage());
        $this->assertInternalType('integer', $request->getPage());
        $this->assertEquals('10000006157002', $request->getId());
        $this->assertInternalType('string', $request->getId());
        $this->assertEquals(1, $request->getMinQty());
        $this->assertInternalType('integer', $request->getMinQty());
        $this->assertEquals(1.11, $request->getMinPriceFrom());
        $this->assertInternalType('float', $request->getMinPriceFrom());
        $this->assertEquals(99.99, $request->getMinPriceTo());
        $this->assertInternalType('float', $request->getMinPriceTo());
    }

    public function testGetResponse()
    {
        $apiResponse = new Response(200, [], self::RESPONSE_JSON);
        $client = $this->getClient([$apiResponse]);

        $orderAddRequest = new ProductsListRequest($client);
        $orderAddRequest->call();

        $responseMock = json_decode(self::RESPONSE_JSON, true);

        $response = $orderAddRequest->getResponse();
        $this->assertInstanceOf(\G2A\IntegrationApi\Response\ProductsListResponse::class, $response);
        $this->assertEquals($responseMock['total'], $response->getTotal());
        $this->assertInternalType('integer', $response->getTotal());
        $this->assertEquals($responseMock['page'], $response->getPage());
        $this->assertInternalType('integer', $response->getPage());

        $expectedProducts = [];
        foreach ($responseMock['docs'] as $product) {
            $expectedProducts[] = new Product($product);
        }
        $this->assertEquals($expectedProducts, $response->getProducts());
        $this->assertInternalType('array', $response->getProducts());
    }

    public function testSetGetPage()
    {
        $value = 4;
        $request = new ProductsListRequest($this->getClient());

        $this->assertEquals(null, $request->getPage());
        $request->setPage($value);
        $this->assertEquals($value, $request->getPage());
    }

    public function testSetGetId()
    {
        $value = 10000068865001;
        $request = new ProductsListRequest($this->getClient());

        $this->assertEquals(null, $request->getId());
        $request->setId($value);
        $this->assertEquals($value, $request->getId());
    }

    public function testSetGetMinQty()
    {
        $value = 3;
        $request = new ProductsListRequest($this->getClient());

        $this->assertEquals(null, $request->getMinQty());
        $request->setMinQty($value);
        $this->assertEquals($value, $request->getMinQty());
    }

    public function testSetGetMinPriceFrom()
    {
        $value = 14.44;
        $request = new ProductsListRequest($this->getClient());

        $this->assertEquals(null, $request->getMinPriceFrom());
        $request->setMinPriceFrom($value);
        $this->assertEquals($value, $request->getMinPriceFrom());
    }

    public function testSetGetMinPriceTo()
    {
        $value = 88.00;
        $request = new ProductsListRequest($this->getClient());

        $this->assertEquals(null, $request->getMinPriceTo());
        $request->setMinPriceTo($value);
        $this->assertEquals($value, $request->getMinPriceTo());
    }
}
