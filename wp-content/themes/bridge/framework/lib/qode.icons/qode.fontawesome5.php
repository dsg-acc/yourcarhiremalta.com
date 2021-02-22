<?php

if( ! function_exists('bridge_qode_include_font_awesome_5_icon_pack') ){
    function bridge_qode_include_font_awesome_5_icon_pack( $icon_packs ){
        $icon_packs['font_awesome_5'] = esc_html__('Font Awesome 5', 'bridge');

        return $icon_packs;
    }

    add_filter('bridge_qode_filter_icon_packs', 'bridge_qode_include_font_awesome_5_icon_pack');
}

class BridgeQodeIconsFontAwesome5 implements iIconCollection {

    public $icons;
    public $title;
    public $param;
    public $styleUrl;

    function __construct($title = "", $param = "") {
        $this->icons = array();
        $this->socialIcons = array();
        $this->backTopTopIcons = array();
        $this->title = $title;
        $this->param = $param;
        $this->setIconsArray();
        $this->setBackToTopIconsArray();
        $this->styleUrl = QODE_ROOT . "/css/font-awesome-5/css/font-awesome-5.min.css";
    }

    private function setIconsArray() {
        $this->icons = array_flip( array(
            "500px"                                      => "fab fa-500px",
            "Accessible Icon"                            => "fab fa-accessible-icon",
            "Accusoft"                                   => "fab fa-accusoft",
            "Acquisitions Incorporated"                  => "fab fa-acquisitions-incorporated",
            "Ad"                                         => "fa fa-ad",
            "Address Book"                               => "fa fa-address-book",
            "Address Card"                               => "fa fa-address-card",
            "adjust"                                     => "fa fa-adjust",
            "App.net"                                    => "fab fa-adn",
            "Adobe"                                      => "fab fa-adobe",
            "Adversal"                                   => "fab fa-adversal",
            "affiliatetheme"                             => "fab fa-affiliatetheme",
            "Air Freshener"                              => "fa fa-air-freshener",
            "Airbnb"                                     => "fab fa-airbnb",
            "Algolia"                                    => "fab fa-algolia",
            "align-center"                               => "fa fa-align-center",
            "align-justify"                              => "fa fa-align-justify",
            "align-left"                                 => "fa fa-align-left",
            "align-right"                                => "fa fa-align-right",
            "Alipay"                                     => "fab fa-alipay",
            "Allergies"                                  => "fa fa-allergies",
            "Amazon"                                     => "fab fa-amazon",
            "Amazon Pay"                                 => "fab fa-amazon-pay",
            "ambulance"                                  => "fa fa-ambulance",
            "American Sign Language Interpreting"        => "fa fa-american-sign-language-interpreting",
            "Amilia"                                     => "fab fa-amilia",
            "Anchor"                                     => "fa fa-anchor",
            "Android"                                    => "fab fa-android",
            "AngelList"                                  => "fab fa-angellist",
            "Angle Double Down"                          => "fa fa-angle-double-down",
            "Angle Double Left"                          => "fa fa-angle-double-left",
            "Angle Double Right"                         => "fa fa-angle-double-right",
            "Angle Double Up"                            => "fa fa-angle-double-up",
            "angle-down"                                 => "fa fa-angle-down",
            "angle-left"                                 => "fa fa-angle-left",
            "angle-right"                                => "fa fa-angle-right",
            "angle-up"                                   => "fa fa-angle-up",
            "Angry Face"                                 => "fa fa-angry",
            "Angry Creative"                             => "fab fa-angrycreative",
            "Angular"                                    => "fab fa-angular",
            "Ankh"                                       => "fa fa-ankh",
            "App Store"                                  => "fab fa-app-store",
            "iOS App Store"                              => "fab fa-app-store-ios",
            "Apper Systems AB"                           => "fab fa-apper",
            "Apple"                                      => "fab fa-apple",
            "Fruit Apple"                                => "fa fa-apple-alt",
            "Apple Pay"                                  => "fab fa-apple-pay",
            "Archive"                                    => "fa fa-archive",
            "Archway"                                    => "fa fa-archway",
            "Alternate Arrow Circle Down"                => "fa fa-arrow-alt-circle-down",
            "Alternate Arrow Circle Left"                => "fa fa-arrow-alt-circle-left",
            "Alternate Arrow Circle Right"               => "fa fa-arrow-alt-circle-right",
            "Alternate Arrow Circle Up"                  => "fa fa-arrow-alt-circle-up",
            "Arrow Circle Down"                          => "fa fa-arrow-circle-down",
            "Arrow Circle Left"                          => "fa fa-arrow-circle-left",
            "Arrow Circle Right"                         => "fa fa-arrow-circle-right",
            "Arrow Circle Up"                            => "fa fa-arrow-circle-up",
            "arrow-down"                                 => "fa fa-arrow-down",
            "arrow-left"                                 => "fa fa-arrow-left",
            "arrow-right"                                => "fa fa-arrow-right",
            "arrow-up"                                   => "fa fa-arrow-up",
            "Alternate Arrows"                           => "fa fa-arrows-alt",
            "Alternate Arrows Horizontal"                => "fa fa-arrows-alt-h",
            "Alternate Arrows Vertical"                  => "fa fa-arrows-alt-v",
            "Artstation"                                 => "fab fa-artstation",
            "Assistive Listening Systems"                => "fa fa-assistive-listening-systems",
            "asterisk"                                   => "fa fa-asterisk",
            "Asymmetrik, Ltd."                           => "fab fa-asymmetrik",
            "At"                                         => "fa fa-at",
            "Atlas"                                      => "fa fa-atlas",
            "Atlassian"                                  => "fab fa-atlassian",
            "Atom"                                       => "fa fa-atom",
            "Audible"                                    => "fab fa-audible",
            "Audio Description"                          => "fa fa-audio-description",
            "Autoprefixer"                               => "fab fa-autoprefixer",
            "avianex"                                    => "fab fa-avianex",
            "Aviato"                                     => "fab fa-aviato",
            "Award"                                      => "fa fa-award",
            "Amazon Web Services (AWS)"                  => "fab fa-aws",
            "Baby"                                       => "fa fa-baby",
            "Baby Carriage"                              => "fa fa-baby-carriage",
            "Backspace"                                  => "fa fa-backspace",
            "backward"                                   => "fa fa-backward",
            "Bacon"                                      => "fa fa-bacon",
            "Bahá'í"                                     => "fa fa-bahai",
            "Balance Scale"                              => "fa fa-balance-scale",
            "Balance Scale (Left-Weighted)"              => "fa fa-balance-scale-left",
            "Balance Scale (Right-Weighted)"             => "fa fa-balance-scale-right",
            "ban"                                        => "fa fa-ban",
            "Band-Aid"                                   => "fa fa-band-aid",
            "Bandcamp"                                   => "fab fa-bandcamp",
            "barcode"                                    => "fa fa-barcode",
            "Bars"                                       => "fa fa-bars",
            "Baseball Ball"                              => "fa fa-baseball-ball",
            "Basketball Ball"                            => "fa fa-basketball-ball",
            "Bath"                                       => "fa fa-bath",
            "Battery Empty"                              => "fa fa-battery-empty",
            "Battery Full"                               => "fa fa-battery-full",
            "Battery 1/2 Full"                           => "fa fa-battery-half",
            "Battery 1/4 Full"                           => "fa fa-battery-quarter",
            "Battery 3/4 Full"                           => "fa fa-battery-three-quarters",
            "Battle.net"                                 => "fab fa-battle-net",
            "Bed"                                        => "fa fa-bed",
            "beer"                                       => "fa fa-beer",
            "Behance"                                    => "fab fa-behance",
            "Behance Square"                             => "fab fa-behance-square",
            "bell"                                       => "fa fa-bell",
            "Bell Slash"                                 => "fa fa-bell-slash",
            "Bezier Curve"                               => "fa fa-bezier-curve",
            "Bible"                                      => "fa fa-bible",
            "Bicycle"                                    => "fa fa-bicycle",
            "Biking"                                     => "fa fa-biking",
            "BIMobject"                                  => "fab fa-bimobject",
            "Binoculars"                                 => "fa fa-binoculars",
            "Biohazard"                                  => "fa fa-biohazard",
            "Birthday Cake"                              => "fa fa-birthday-cake",
            "Bitbucket"                                  => "fab fa-bitbucket",
            "Bitcoin"                                    => "fab fa-bitcoin",
            "Bity"                                       => "fab fa-bity",
            "Font Awesome Black Tie"                     => "fab fa-black-tie",
            "BlackBerry"                                 => "fab fa-blackberry",
            "Blender"                                    => "fa fa-blender",
            "Blender Phone"                              => "fa fa-blender-phone",
            "Blind"                                      => "fa fa-blind",
            "Blog"                                       => "fa fa-blog",
            "Blogger"                                    => "fab fa-blogger",
            "Blogger B"                                  => "fab fa-blogger-b",
            "Bluetooth"                                  => "fab fa-bluetooth",
            "Bluetooth"                                  => "fab fa-bluetooth-b",
            "bold"                                       => "fa fa-bold",
            "Lightning Bolt"                             => "fa fa-bolt",
            "Bomb"                                       => "fa fa-bomb",
            "Bone"                                       => "fa fa-bone",
            "Bong"                                       => "fa fa-bong",
            "book"                                       => "fa fa-book",
            "Book of the Dead"                           => "fa fa-book-dead",
            "Medical Book"                               => "fa fa-book-medical",
            "Book Open"                                  => "fa fa-book-open",
            "Book Reader"                                => "fa fa-book-reader",
            "bookmark"                                   => "fa fa-bookmark",
            "Bootstrap"                                  => "fab fa-bootstrap",
            "Border All"                                 => "fa fa-border-all",
            "Border None"                                => "fa fa-border-none",
            "Border Style"                               => "fa fa-border-style",
            "Bowling Ball"                               => "fa fa-bowling-ball",
            "Box"                                        => "fa fa-box",
            "Box Open"                                   => "fa fa-box-open",
            "Boxes"                                      => "fa fa-boxes",
            "Braille"                                    => "fa fa-braille",
            "Brain"                                      => "fa fa-brain",
            "Bread Slice"                                => "fa fa-bread-slice",
            "Briefcase"                                  => "fa fa-briefcase",
            "Medical Briefcase"                          => "fa fa-briefcase-medical",
            "Broadcast Tower"                            => "fa fa-broadcast-tower",
            "Broom"                                      => "fa fa-broom",
            "Brush"                                      => "fa fa-brush",
            "BTC"                                        => "fab fa-btc",
            "Buffer"                                     => "fab fa-buffer",
            "Bug"                                        => "fa fa-bug",
            "Building"                                   => "fa fa-building",
            "bullhorn"                                   => "fa fa-bullhorn",
            "Bullseye"                                   => "fa fa-bullseye",
            "Burn"                                       => "fa fa-burn",
            "Büromöbel-Experte GmbH & Co. KG."           => "fab fa-buromobelexperte",
            "Bus"                                        => "fa fa-bus",
            "Bus Alt"                                    => "fa fa-bus-alt",
            "Business Time"                              => "fa fa-business-time",
            "Buy n Large"                                => "fab fa-buy-n-large",
            "BuySellAds"                                 => "fab fa-buysellads",
            "Calculator"                                 => "fa fa-calculator",
            "Calendar"                                   => "fa fa-calendar",
            "Alternate Calendar"                         => "fa fa-calendar-alt",
            "Calendar Check"                             => "fa fa-calendar-check",
            "Calendar with Day Focus"                    => "fa fa-calendar-day",
            "Calendar Minus"                             => "fa fa-calendar-minus",
            "Calendar Plus"                              => "fa fa-calendar-plus",
            "Calendar Times"                             => "fa fa-calendar-times",
            "Calendar with Week Focus"                   => "fa fa-calendar-week",
            "camera"                                     => "fa fa-camera",
            "Retro Camera"                               => "fa fa-camera-retro",
            "Campground"                                 => "fa fa-campground",
            "Canadian Maple Leaf"                        => "fab fa-canadian-maple-leaf",
            "Candy Cane"                                 => "fa fa-candy-cane",
            "Cannabis"                                   => "fa fa-cannabis",
            "Capsules"                                   => "fa fa-capsules",
            "Car"                                        => "fa fa-car",
            "Alternate Car"                              => "fa fa-car-alt",
            "Car Battery"                                => "fa fa-car-battery",
            "Car Crash"                                  => "fa fa-car-crash",
            "Car Side"                                   => "fa fa-car-side",
            "Caravan"                                    => "fa fa-caravan",
            "Caret Down"                                 => "fa fa-caret-down",
            "Caret Left"                                 => "fa fa-caret-left",
            "Caret Right"                                => "fa fa-caret-right",
            "Caret Square Down"                          => "fa fa-caret-square-down",
            "Caret Square Left"                          => "fa fa-caret-square-left",
            "Caret Square Right"                         => "fa fa-caret-square-right",
            "Caret Square Up"                            => "fa fa-caret-square-up",
            "Caret Up"                                   => "fa fa-caret-up",
            "Carrot"                                     => "fa fa-carrot",
            "Shopping Cart Arrow Down"                   => "fa fa-cart-arrow-down",
            "Add to Shopping Cart"                       => "fa fa-cart-plus",
            "Cash Register"                              => "fa fa-cash-register",
            "Cat"                                        => "fa fa-cat",
            "Amazon Pay Credit Card"                     => "fab fa-cc-amazon-pay",
            "American Express Credit Card"               => "fab fa-cc-amex",
            "Apple Pay Credit Card"                      => "fab fa-cc-apple-pay",
            "Diner's Club Credit Card"                   => "fab fa-cc-diners-club",
            "Discover Credit Card"                       => "fab fa-cc-discover",
            "JCB Credit Card"                            => "fab fa-cc-jcb",
            "MasterCard Credit Card"                     => "fab fa-cc-mastercard",
            "Paypal Credit Card"                         => "fab fa-cc-paypal",
            "Stripe Credit Card"                         => "fab fa-cc-stripe",
            "Visa Credit Card"                           => "fab fa-cc-visa",
            "Centercode"                                 => "fab fa-centercode",
            "Centos"                                     => "fab fa-centos",
            "certificate"                                => "fa fa-certificate",
            "Chair"                                      => "fa fa-chair",
            "Chalkboard"                                 => "fa fa-chalkboard",
            "Chalkboard Teacher"                         => "fa fa-chalkboard-teacher",
            "Charging Station"                           => "fa fa-charging-station",
            "Area Chart"                                 => "fa fa-chart-area",
            "Bar Chart"                                  => "fa fa-chart-bar",
            "Line Chart"                                 => "fa fa-chart-line",
            "Pie Chart"                                  => "fa fa-chart-pie",
            "Check"                                      => "fa fa-check",
            "Check Circle"                               => "fa fa-check-circle",
            "Double Check"                               => "fa fa-check-double",
            "Check Square"                               => "fa fa-check-square",
            "Cheese"                                     => "fa fa-cheese",
            "Chess"                                      => "fa fa-chess",
            "Chess Bishop"                               => "fa fa-chess-bishop",
            "Chess Board"                                => "fa fa-chess-board",
            "Chess King"                                 => "fa fa-chess-king",
            "Chess Knight"                               => "fa fa-chess-knight",
            "Chess Pawn"                                 => "fa fa-chess-pawn",
            "Chess Queen"                                => "fa fa-chess-queen",
            "Chess Rook"                                 => "fa fa-chess-rook",
            "Chevron Circle Down"                        => "fa fa-chevron-circle-down",
            "Chevron Circle Left"                        => "fa fa-chevron-circle-left",
            "Chevron Circle Right"                       => "fa fa-chevron-circle-right",
            "Chevron Circle Up"                          => "fa fa-chevron-circle-up",
            "chevron-down"                               => "fa fa-chevron-down",
            "chevron-left"                               => "fa fa-chevron-left",
            "chevron-right"                              => "fa fa-chevron-right",
            "chevron-up"                                 => "fa fa-chevron-up",
            "Child"                                      => "fa fa-child",
            "Chrome"                                     => "fab fa-chrome",
            "Chromecast"                                 => "fab fa-chromecast",
            "Church"                                     => "fa fa-church",
            "Circle"                                     => "fa fa-circle",
            "Circle Notched"                             => "fa fa-circle-notch",
            "City"                                       => "fa fa-city",
            "Medical Clinic"                             => "fa fa-clinic-medical",
            "Clipboard"                                  => "fa fa-clipboard",
            "Clipboard with Check"                       => "fa fa-clipboard-check",
            "Clipboard List"                             => "fa fa-clipboard-list",
            "Clock"                                      => "fa fa-clock",
            "Clone"                                      => "fa fa-clone",
            "Closed Captioning"                          => "fa fa-closed-captioning",
            "Cloud"                                      => "fa fa-cloud",
            "Alternate Cloud Download"                   => "fa fa-cloud-download-alt",
            "Cloud with (a chance of) Meatball"          => "fa fa-cloud-meatball",
            "Cloud with Moon"                            => "fa fa-cloud-moon",
            "Cloud with Moon and Rain"                   => "fa fa-cloud-moon-rain",
            "Cloud with Rain"                            => "fa fa-cloud-rain",
            "Cloud with Heavy Showers"                   => "fa fa-cloud-showers-heavy",
            "Cloud with Sun"                             => "fa fa-cloud-sun",
            "Cloud with Sun and Rain"                    => "fa fa-cloud-sun-rain",
            "Alternate Cloud Upload"                     => "fa fa-cloud-upload-alt",
            "cloudscale.ch"                              => "fab fa-cloudscale",
            "Cloudsmith"                                 => "fab fa-cloudsmith",
            "cloudversify"                               => "fab fa-cloudversify",
            "Cocktail"                                   => "fa fa-cocktail",
            "Code"                                       => "fa fa-code",
            "Code Branch"                                => "fa fa-code-branch",
            "Codepen"                                    => "fab fa-codepen",
            "Codie Pie"                                  => "fab fa-codiepie",
            "Coffee"                                     => "fa fa-coffee",
            "cog"                                        => "fa fa-cog",
            "cogs"                                       => "fa fa-cogs",
            "Coins"                                      => "fa fa-coins",
            "Columns"                                    => "fa fa-columns",
            "comment"                                    => "fa fa-comment",
            "Alternate Comment"                          => "fa fa-comment-alt",
            "Comment Dollar"                             => "fa fa-comment-dollar",
            "Comment Dots"                               => "fa fa-comment-dots",
            "Alternate Medical Chat"                     => "fa fa-comment-medical",
            "Comment Slash"                              => "fa fa-comment-slash",
            "comments"                                   => "fa fa-comments",
            "Comments Dollar"                            => "fa fa-comments-dollar",
            "Compact Disc"                               => "fa fa-compact-disc",
            "Compass"                                    => "fa fa-compass",
            "Compress"                                   => "fa fa-compress",
            "Alternate Compress"                         => "fa fa-compress-alt",
            "Alternate Compress Arrows"                  => "fa fa-compress-arrows-alt",
            "Concierge Bell"                             => "fa fa-concierge-bell",
            "Confluence"                                 => "fab fa-confluence",
            "Connect Develop"                            => "fab fa-connectdevelop",
            "Contao"                                     => "fab fa-contao",
            "Cookie"                                     => "fa fa-cookie",
            "Cookie Bite"                                => "fa fa-cookie-bite",
            "Copy"                                       => "fa fa-copy",
            "Copyright"                                  => "fa fa-copyright",
            "Cotton Bureau"                              => "fab fa-cotton-bureau",
            "Couch"                                      => "fa fa-couch",
            "cPanel"                                     => "fab fa-cpanel",
            "Creative Commons"                           => "fab fa-creative-commons",
            "Creative Commons Attribution"               => "fab fa-creative-commons-by",
            "Creative Commons Noncommercial"             => "fab fa-creative-commons-nc",
            "Creative Commons Noncommercial (Euro Sign)" => "fab fa-creative-commons-nc-eu",
            "Creative Commons Noncommercial (Yen Sign)"  => "fab fa-creative-commons-nc-jp",
            "Creative Commons No Derivative Works"       => "fab fa-creative-commons-nd",
            "Creative Commons Public Domain"             => "fab fa-creative-commons-pd",
            "Alternate Creative Commons Public Domain"   => "fab fa-creative-commons-pd-alt",
            "Creative Commons Remix"                     => "fab fa-creative-commons-remix",
            "Creative Commons Share Alike"               => "fab fa-creative-commons-sa",
            "Creative Commons Sampling"                  => "fab fa-creative-commons-sampling",
            "Creative Commons Sampling +"                => "fab fa-creative-commons-sampling-plus",
            "Creative Commons Share"                     => "fab fa-creative-commons-share",
            "Creative Commons CC0"                       => "fab fa-creative-commons-zero",
            "Credit Card"                                => "fa fa-credit-card",
            "Critical Role"                              => "fab fa-critical-role",
            "crop"                                       => "fa fa-crop",
            "Alternate Crop"                             => "fa fa-crop-alt",
            "Cross"                                      => "fa fa-cross",
            "Crosshairs"                                 => "fa fa-crosshairs",
            "Crow"                                       => "fa fa-crow",
            "Crown"                                      => "fa fa-crown",
            "Crutch"                                     => "fa fa-crutch",
            "CSS 3 Logo"                                 => "fab fa-css3",
            "Alternate CSS3 Logo"                        => "fab fa-css3-alt",
            "Cube"                                       => "fa fa-cube",
            "Cubes"                                      => "fa fa-cubes",
            "Cut"                                        => "fa fa-cut",
            "Cuttlefish"                                 => "fab fa-cuttlefish",
            "Dungeons & Dragons"                         => "fab fa-d-and-d",
            "D&D Beyond"                                 => "fab fa-d-and-d-beyond",
            "DashCube"                                   => "fab fa-dashcube",
            "Database"                                   => "fa fa-database",
            "Deaf"                                       => "fa fa-deaf",
            "Delicious"                                  => "fab fa-delicious",
            "Democrat"                                   => "fa fa-democrat",
            "deploy.dog"                                 => "fab fa-deploydog",
            "Deskpro"                                    => "fab fa-deskpro",
            "Desktop"                                    => "fa fa-desktop",
            "DEV"                                        => "fab fa-dev",
            "deviantART"                                 => "fab fa-deviantart",
            "Dharmachakra"                               => "fa fa-dharmachakra",
            "DHL"                                        => "fab fa-dhl",
            "Diagnoses"                                  => "fa fa-diagnoses",
            "Diaspora"                                   => "fab fa-diaspora",
            "Dice"                                       => "fa fa-dice",
            "Dice D20"                                   => "fa fa-dice-d20",
            "Dice D6"                                    => "fa fa-dice-d6",
            "Dice Five"                                  => "fa fa-dice-five",
            "Dice Four"                                  => "fa fa-dice-four",
            "Dice One"                                   => "fa fa-dice-one",
            "Dice Six"                                   => "fa fa-dice-six",
            "Dice Three"                                 => "fa fa-dice-three",
            "Dice Two"                                   => "fa fa-dice-two",
            "Digg Logo"                                  => "fab fa-digg",
            "Digital Ocean"                              => "fab fa-digital-ocean",
            "Digital Tachograph"                         => "fa fa-digital-tachograph",
            "Directions"                                 => "fa fa-directions",
            "Discord"                                    => "fab fa-discord",
            "Discourse"                                  => "fab fa-discourse",
            "Divide"                                     => "fa fa-divide",
            "Dizzy Face"                                 => "fa fa-dizzy",
            "DNA"                                        => "fa fa-dna",
            "DocHub"                                     => "fab fa-dochub",
            "Docker"                                     => "fab fa-docker",
            "Dog"                                        => "fa fa-dog",
            "Dollar Sign"                                => "fa fa-dollar-sign",
            "Dolly"                                      => "fa fa-dolly",
            "Dolly Flatbed"                              => "fa fa-dolly-flatbed",
            "Donate"                                     => "fa fa-donate",
            "Door Closed"                                => "fa fa-door-closed",
            "Door Open"                                  => "fa fa-door-open",
            "Dot Circle"                                 => "fa fa-dot-circle",
            "Dove"                                       => "fa fa-dove",
            "Download"                                   => "fa fa-download",
            "Draft2digital"                              => "fab fa-draft2digital",
            "Drafting Compass"                           => "fa fa-drafting-compass",
            "Dragon"                                     => "fa fa-dragon",
            "Draw Polygon"                               => "fa fa-draw-polygon",
            "Dribbble"                                   => "fab fa-dribbble",
            "Dribbble Square"                            => "fab fa-dribbble-square",
            "Dropbox"                                    => "fab fa-dropbox",
            "Drum"                                       => "fa fa-drum",
            "Drum Steelpan"                              => "fa fa-drum-steelpan",
            "Drumstick with Bite Taken Out"              => "fa fa-drumstick-bite",
            "Drupal Logo"                                => "fab fa-drupal",
            "Dumbbell"                                   => "fa fa-dumbbell",
            "Dumpster"                                   => "fa fa-dumpster",
            "Dumpster Fire"                              => "fa fa-dumpster-fire",
            "Dungeon"                                    => "fa fa-dungeon",
            "Dyalog"                                     => "fab fa-dyalog",
            "Earlybirds"                                 => "fab fa-earlybirds",
            "eBay"                                       => "fab fa-ebay",
            "Edge Browser"                               => "fab fa-edge",
            "Edit"                                       => "fa fa-edit",
            "Egg"                                        => "fa fa-egg",
            "eject"                                      => "fa fa-eject",
            "Elementor"                                  => "fab fa-elementor",
            "Horizontal Ellipsis"                        => "fa fa-ellipsis-h",
            "Vertical Ellipsis"                          => "fa fa-ellipsis-v",
            "Ello"                                       => "fab fa-ello",
            "Ember"                                      => "fab fa-ember",
            "Galactic Empire"                            => "fab fa-empire",
            "Envelope"                                   => "fa fa-envelope",
            "Envelope Open"                              => "fa fa-envelope-open",
            "Envelope Open-text"                         => "fa fa-envelope-open-text",
            "Envelope Square"                            => "fa fa-envelope-square",
            "Envira Gallery"                             => "fab fa-envira",
            "Equals"                                     => "fa fa-equals",
            "eraser"                                     => "fa fa-eraser",
            "Erlang"                                     => "fab fa-erlang",
            "Ethereum"                                   => "fab fa-ethereum",
            "Ethernet"                                   => "fa fa-ethernet",
            "Etsy"                                       => "fab fa-etsy",
            "Euro Sign"                                  => "fa fa-euro-sign",
            "Evernote"                                   => "fab fa-evernote",
            "Alternate Exchange"                         => "fa fa-exchange-alt",
            "exclamation"                                => "fa fa-exclamation",
            "Exclamation Circle"                         => "fa fa-exclamation-circle",
            "Exclamation Triangle"                       => "fa fa-exclamation-triangle",
            "Expand"                                     => "fa fa-expand",
            "Alternate Expand"                           => "fa fa-expand-alt",
            "Alternate Expand Arrows"                    => "fa fa-expand-arrows-alt",
            "ExpeditedSSL"                               => "fab fa-expeditedssl",
            "Alternate External Link"                    => "fa fa-external-link-alt",
            "Alternate External Link Square"             => "fa fa-external-link-square-alt",
            "Eye"                                        => "fa fa-eye",
            "Eye Dropper"                                => "fa fa-eye-dropper",
            "Eye Slash"                                  => "fa fa-eye-slash",
            "Facebook"                                   => "fab fa-facebook",
            "Facebook F"                                 => "fab fa-facebook-f",
            "Facebook Messenger"                         => "fab fa-facebook-messenger",
            "Facebook Square"                            => "fab fa-facebook-square",
            "Fan"                                        => "fa fa-fan",
            "Fantasy Flight-games"                       => "fab fa-fantasy-flight-games",
            "fast-backward"                              => "fa fa-fast-backward",
            "fast-forward"                               => "fa fa-fast-forward",
            "Fax"                                        => "fa fa-fax",
            "Feather"                                    => "fa fa-feather",
            "Alternate Feather"                          => "fa fa-feather-alt",
            "FedEx"                                      => "fab fa-fedex",
            "Fedora"                                     => "fab fa-fedora",
            "Female"                                     => "fa fa-female",
            "fighter-jet"                                => "fa fa-fighter-jet",
            "Figma"                                      => "fab fa-figma",
            "File"                                       => "fa fa-file",
            "Alternate File"                             => "fa fa-file-alt",
            "Archive File"                               => "fa fa-file-archive",
            "Audio File"                                 => "fa fa-file-audio",
            "Code File"                                  => "fa fa-file-code",
            "File Contract"                              => "fa fa-file-contract",
            "File CSV"                                   => "fa fa-file-csv",
            "File Download"                              => "fa fa-file-download",
            "Excel File"                                 => "fa fa-file-excel",
            "File Export"                                => "fa fa-file-export",
            "Image File"                                 => "fa fa-file-image",
            "File Import"                                => "fa fa-file-import",
            "File Invoice"                               => "fa fa-file-invoice",
            "File Invoice with US Dollar"                => "fa fa-file-invoice-dollar",
            "Medical File"                               => "fa fa-file-medical",
            "Alternate Medical File"                     => "fa fa-file-medical-alt",
            "PDF File"                                   => "fa fa-file-pdf",
            "Powerpoint File"                            => "fa fa-file-powerpoint",
            "File Prescription"                          => "fa fa-file-prescription",
            "File Signature"                             => "fa fa-file-signature",
            "File Upload"                                => "fa fa-file-upload",
            "Video File"                                 => "fa fa-file-video",
            "Word File"                                  => "fa fa-file-word",
            "Fill"                                       => "fa fa-fill",
            "Fill Drip"                                  => "fa fa-fill-drip",
            "Film"                                       => "fa fa-film",
            "Filter"                                     => "fa fa-filter",
            "Fingerprint"                                => "fa fa-fingerprint",
            "fire"                                       => "fa fa-fire",
            "Alternate Fire"                             => "fa fa-fire-alt",
            "fire-extinguisher"                          => "fa fa-fire-extinguisher",
            "Firefox"                                    => "fab fa-firefox",
            "Firefox Browser"                            => "fab fa-firefox-browser",
            "First Aid"                                  => "fa fa-first-aid",
            "First Order"                                => "fab fa-first-order",
            "Alternate First Order"                      => "fab fa-first-order-alt",
            "firstdraft"                                 => "fab fa-firstdraft",
            "Fish"                                       => "fa fa-fish",
            "Raised Fist"                                => "fa fa-fist-raised",
            "flag"                                       => "fa fa-flag",
            "flag-checkered"                             => "fa fa-flag-checkered",
            "United States of America Flag"              => "fa fa-flag-usa",
            "Flask"                                      => "fa fa-flask",
            "Flickr"                                     => "fab fa-flickr",
            "Flipboard"                                  => "fab fa-flipboard",
            "Flushed Face"                               => "fa fa-flushed",
            "Fly"                                        => "fab fa-fly",
            "Folder"                                     => "fa fa-folder",
            "Folder Minus"                               => "fa fa-folder-minus",
            "Folder Open"                                => "fa fa-folder-open",
            "Folder Plus"                                => "fa fa-folder-plus",
            "font"                                       => "fa fa-font",
            "Font Awesome"                               => "fab fa-font-awesome",
            "Alternate Font Awesome"                     => "fab fa-font-awesome-alt",
            "Font Awesome Flag"                          => "fab fa-font-awesome-flag",
            "Font Awesome Full Logo"                     => "fab fa-font-awesome-logo-full",
            "Fonticons"                                  => "fab fa-fonticons",
            "Fonticons Fi"                               => "fab fa-fonticons-fi",
            "Football Ball"                              => "fa fa-football-ball",
            "Fort Awesome"                               => "fab fa-fort-awesome",
            "Alternate Fort Awesome"                     => "fab fa-fort-awesome-alt",
            "Forumbee"                                   => "fab fa-forumbee",
            "forward"                                    => "fa fa-forward",
            "Foursquare"                                 => "fab fa-foursquare",
            "freeCodeCamp"                               => "fab fa-free-code-camp",
            "FreeBSD"                                    => "fab fa-freebsd",
            "Frog"                                       => "fa fa-frog",
            "Frowning Face"                              => "fa fa-frown",
            "Frowning Face With Open Mouth"              => "fa fa-frown-open",
            "Fulcrum"                                    => "fab fa-fulcrum",
            "Funnel Dollar"                              => "fa fa-funnel-dollar",
            "Futbol"                                     => "fa fa-futbol",
            "Galactic Republic"                          => "fab fa-galactic-republic",
            "Galactic Senate"                            => "fab fa-galactic-senate",
            "Gamepad"                                    => "fa fa-gamepad",
            "Gas Pump"                                   => "fa fa-gas-pump",
            "Gavel"                                      => "fa fa-gavel",
            "Gem"                                        => "fa fa-gem",
            "Genderless"                                 => "fa fa-genderless",
            "Get Pocket"                                 => "fab fa-get-pocket",
            "GG Currency"                                => "fab fa-gg",
            "GG Currency Circle"                         => "fab fa-gg-circle",
            "Ghost"                                      => "fa fa-ghost",
            "gift"                                       => "fa fa-gift",
            "Gifts"                                      => "fa fa-gifts",
            "Git"                                        => "fab fa-git",
            "Git Alt"                                    => "fab fa-git-alt",
            "Git Square"                                 => "fab fa-git-square",
            "GitHub"                                     => "fab fa-github",
            "Alternate GitHub"                           => "fab fa-github-alt",
            "GitHub Square"                              => "fab fa-github-square",
            "GitKraken"                                  => "fab fa-gitkraken",
            "GitLab"                                     => "fab fa-gitlab",
            "Gitter"                                     => "fab fa-gitter",
            "Glass Cheers"                               => "fa fa-glass-cheers",
            "Martini Glass"                              => "fa fa-glass-martini",
            "Alternate Glass Martini"                    => "fa fa-glass-martini-alt",
            "Glass Whiskey"                              => "fa fa-glass-whiskey",
            "Glasses"                                    => "fa fa-glasses",
            "Glide"                                      => "fab fa-glide",
            "Glide G"                                    => "fab fa-glide-g",
            "Globe"                                      => "fa fa-globe",
            "Globe with Africa shown"                    => "fa fa-globe-africa",
            "Globe with Americas shown"                  => "fa fa-globe-americas",
            "Globe with Asia shown"                      => "fa fa-globe-asia",
            "Globe with Europe shown"                    => "fa fa-globe-europe",
            "Gofore"                                     => "fab fa-gofore",
            "Golf Ball"                                  => "fa fa-golf-ball",
            "Goodreads"                                  => "fab fa-goodreads",
            "Goodreads G"                                => "fab fa-goodreads-g",
            "Google Logo"                                => "fab fa-google",
            "Google Drive"                               => "fab fa-google-drive",
            "Google Play"                                => "fab fa-google-play",
            "Google Plus"                                => "fab fa-google-plus",
            "Google Plus G"                              => "fab fa-google-plus-g",
            "Google Plus Square"                         => "fab fa-google-plus-square",
            "Google Wallet"                              => "fab fa-google-wallet",
            "Gopuram"                                    => "fa fa-gopuram",
            "Graduation Cap"                             => "fa fa-graduation-cap",
            "Gratipay (Gittip)"                          => "fab fa-gratipay",
            "Grav"                                       => "fab fa-grav",
            "Greater Than"                               => "fa fa-greater-than",
            "Greater Than Equal To"                      => "fa fa-greater-than-equal",
            "Grimacing Face"                             => "fa fa-grimace",
            "Grinning Face"                              => "fa fa-grin",
            "Alternate Grinning Face"                    => "fa fa-grin-alt",
            "Grinning Face With Smiling Eyes"            => "fa fa-grin-beam",
            "Grinning Face With Sweat"                   => "fa fa-grin-beam-sweat",
            "Smiling Face With Heart-Eyes"               => "fa fa-grin-hearts",
            "Grinning Squinting Face"                    => "fa fa-grin-squint",
            "Rolling on the Floor Laughing"              => "fa fa-grin-squint-tears",
            "Star-Struck"                                => "fa fa-grin-stars",
            "Face With Tears of Joy"                     => "fa fa-grin-tears",
            "Face With Tongue"                           => "fa fa-grin-tongue",
            "Squinting Face With Tongue"                 => "fa fa-grin-tongue-squint",
            "Winking Face With Tongue"                   => "fa fa-grin-tongue-wink",
            "Grinning Winking Face"                      => "fa fa-grin-wink",
            "Grip Horizontal"                            => "fa fa-grip-horizontal",
            "Grip Lines"                                 => "fa fa-grip-lines",
            "Grip Lines Vertical"                        => "fa fa-grip-lines-vertical",
            "Grip Vertical"                              => "fa fa-grip-vertical",
            "Gripfire, Inc."                             => "fab fa-gripfire",
            "Grunt"                                      => "fab fa-grunt",
            "Guitar"                                     => "fa fa-guitar",
            "Gulp"                                       => "fab fa-gulp",
            "H Square"                                   => "fa fa-h-square",
            "Hacker News"                                => "fab fa-hacker-news",
            "Hacker News Square"                         => "fab fa-hacker-news-square",
            "Hackerrank"                                 => "fab fa-hackerrank",
            "Hamburger"                                  => "fa fa-hamburger",
            "Hammer"                                     => "fa fa-hammer",
            "Hamsa"                                      => "fa fa-hamsa",
            "Hand Holding"                               => "fa fa-hand-holding",
            "Hand Holding Heart"                         => "fa fa-hand-holding-heart",
            "Hand Holding US Dollar"                     => "fa fa-hand-holding-usd",
            "Lizard (Hand)"                              => "fa fa-hand-lizard",
            "Hand with Middle Finger Raised"             => "fa fa-hand-middle-finger",
            "Paper (Hand)"                               => "fa fa-hand-paper",
            "Peace (Hand)"                               => "fa fa-hand-peace",
            "Hand Pointing Down"                         => "fa fa-hand-point-down",
            "Hand Pointing Left"                         => "fa fa-hand-point-left",
            "Hand Pointing Right"                        => "fa fa-hand-point-right",
            "Hand Pointing Up"                           => "fa fa-hand-point-up",
            "Pointer (Hand)"                             => "fa fa-hand-pointer",
            "Rock (Hand)"                                => "fa fa-hand-rock",
            "Scissors (Hand)"                            => "fa fa-hand-scissors",
            "Spock (Hand)"                               => "fa fa-hand-spock",
            "Hands"                                      => "fa fa-hands",
            "Helping Hands"                              => "fa fa-hands-helping",
            "Handshake"                                  => "fa fa-handshake",
            "Hanukiah"                                   => "fa fa-hanukiah",
            "Hard Hat"                                   => "fa fa-hard-hat",
            "Hashtag"                                    => "fa fa-hashtag",
            "Cowboy Hat"                                 => "fa fa-hat-cowboy",
            "Cowboy Hat Side"                            => "fa fa-hat-cowboy-side",
            "Wizard's Hat"                               => "fa fa-hat-wizard",
            "HDD"                                        => "fa fa-hdd",
            "heading"                                    => "fa fa-heading",
            "headphones"                                 => "fa fa-headphones",
            "Alternate Headphones"                       => "fa fa-headphones-alt",
            "Headset"                                    => "fa fa-headset",
            "Heart"                                      => "fa fa-heart",
            "Heart Broken"                               => "fa fa-heart-broken",
            "Heartbeat"                                  => "fa fa-heartbeat",
            "Helicopter"                                 => "fa fa-helicopter",
            "Highlighter"                                => "fa fa-highlighter",
            "Hiking"                                     => "fa fa-hiking",
            "Hippo"                                      => "fa fa-hippo",
            "Hips"                                       => "fab fa-hips",
            "HireAHelper"                                => "fab fa-hire-a-helper",
            "History"                                    => "fa fa-history",
            "Hockey Puck"                                => "fa fa-hockey-puck",
            "Holly Berry"                                => "fa fa-holly-berry",
            "home"                                       => "fa fa-home",
            "Hooli"                                      => "fab fa-hooli",
            "Hornbill"                                   => "fab fa-hornbill",
            "Horse"                                      => "fa fa-horse",
            "Horse Head"                                 => "fa fa-horse-head",
            "hospital"                                   => "fa fa-hospital",
            "Alternate Hospital"                         => "fa fa-hospital-alt",
            "Hospital Symbol"                            => "fa fa-hospital-symbol",
            "Hot Tub"                                    => "fa fa-hot-tub",
            "Hot Dog"                                    => "fa fa-hotdog",
            "Hotel"                                      => "fa fa-hotel",
            "Hotjar"                                     => "fab fa-hotjar",
            "Hourglass"                                  => "fa fa-hourglass",
            "Hourglass End"                              => "fa fa-hourglass-end",
            "Hourglass Half"                             => "fa fa-hourglass-half",
            "Hourglass Start"                            => "fa fa-hourglass-start",
            "Damaged House"                              => "fa fa-house-damage",
            "Houzz"                                      => "fab fa-houzz",
            "Hryvnia"                                    => "fa fa-hryvnia",
            "HTML 5 Logo"                                => "fab fa-html5",
            "HubSpot"                                    => "fab fa-hubspot",
            "I Beam Cursor"                              => "fa fa-i-cursor",
            "Ice Cream"                                  => "fa fa-ice-cream",
            "Icicles"                                    => "fa fa-icicles",
            "Icons"                                      => "fa fa-icons",
            "Identification Badge"                       => "fa fa-id-badge",
            "Identification Card"                        => "fa fa-id-card",
            "Alternate Identification Card"              => "fa fa-id-card-alt",
            "iDeal"                                      => "fab fa-ideal",
            "Igloo"                                      => "fa fa-igloo",
            "Image"                                      => "fa fa-image",
            "Images"                                     => "fa fa-images",
            "IMDB"                                       => "fab fa-imdb",
            "inbox"                                      => "fa fa-inbox",
            "Indent"                                     => "fa fa-indent",
            "Industry"                                   => "fa fa-industry",
            "Infinity"                                   => "fa fa-infinity",
            "Info"                                       => "fa fa-info",
            "Info Circle"                                => "fa fa-info-circle",
            "Instagram"                                  => "fab fa-instagram",
            "Intercom"                                   => "fab fa-intercom",
            "Internet-explorer"                          => "fab fa-internet-explorer",
            "InVision"                                   => "fab fa-invision",
            "ioxhost"                                    => "fab fa-ioxhost",
            "italic"                                     => "fa fa-italic",
            "itch.io"                                    => "fab fa-itch-io",
            "iTunes"                                     => "fab fa-itunes",
            "Itunes Note"                                => "fab fa-itunes-note",
            "Java"                                       => "fab fa-java",
            "Jedi"                                       => "fa fa-jedi",
            "Jedi Order"                                 => "fab fa-jedi-order",
            "Jenkis"                                     => "fab fa-jenkins",
            "Jira"                                       => "fab fa-jira",
            "Joget"                                      => "fab fa-joget",
            "Joint"                                      => "fa fa-joint",
            "Joomla Logo"                                => "fab fa-joomla",
            "Journal of the Whills"                      => "fa fa-journal-whills",
            "JavaScript (JS)"                            => "fab fa-js",
            "JavaScript (JS) Square"                     => "fab fa-js-square",
            "jsFiddle"                                   => "fab fa-jsfiddle",
            "Kaaba"                                      => "fa fa-kaaba",
            "Kaggle"                                     => "fab fa-kaggle",
            "key"                                        => "fa fa-key",
            "Keybase"                                    => "fab fa-keybase",
            "Keyboard"                                   => "fa fa-keyboard",
            "KeyCDN"                                     => "fab fa-keycdn",
            "Khanda"                                     => "fa fa-khanda",
            "Kickstarter"                                => "fab fa-kickstarter",
            "Kickstarter K"                              => "fab fa-kickstarter-k",
            "Kissing Face"                               => "fa fa-kiss",
            "Kissing Face With Smiling Eyes"             => "fa fa-kiss-beam",
            "Face Blowing a Kiss"                        => "fa fa-kiss-wink-heart",
            "Kiwi Bird"                                  => "fa fa-kiwi-bird",
            "KORVUE"                                     => "fab fa-korvue",
            "Landmark"                                   => "fa fa-landmark",
            "Language"                                   => "fa fa-language",
            "Laptop"                                     => "fa fa-laptop",
            "Laptop Code"                                => "fa fa-laptop-code",
            "Laptop Medical"                             => "fa fa-laptop-medical",
            "Laravel"                                    => "fab fa-laravel",
            "last.fm"                                    => "fab fa-lastfm",
            "last.fm Square"                             => "fab fa-lastfm-square",
            "Grinning Face With Big Eyes"                => "fa fa-laugh",
            "Laugh Face with Beaming Eyes"               => "fa fa-laugh-beam",
            "Laughing Squinting Face"                    => "fa fa-laugh-squint",
            "Laughing Winking Face"                      => "fa fa-laugh-wink",
            "Layer Group"                                => "fa fa-layer-group",
            "leaf"                                       => "fa fa-leaf",
            "Leanpub"                                    => "fab fa-leanpub",
            "Lemon"                                      => "fa fa-lemon",
            "Less"                                       => "fab fa-less",
            "Less Than"                                  => "fa fa-less-than",
            "Less Than Equal To"                         => "fa fa-less-than-equal",
            "Alternate Level Down"                       => "fa fa-level-down-alt",
            "Alternate Level Up"                         => "fa fa-level-up-alt",
            "Life Ring"                                  => "fa fa-life-ring",
            "Lightbulb"                                  => "fa fa-lightbulb",
            "Line"                                       => "fab fa-line",
            "Link"                                       => "fa fa-link",
            "LinkedIn"                                   => "fab fa-linkedin",
            "LinkedIn In"                                => "fab fa-linkedin-in",
            "Linode"                                     => "fab fa-linode",
            "Linux"                                      => "fab fa-linux",
            "Turkish Lira Sign"                          => "fa fa-lira-sign",
            "List"                                       => "fa fa-list",
            "Alternate List"                             => "fa fa-list-alt",
            "list-ol"                                    => "fa fa-list-ol",
            "list-ul"                                    => "fa fa-list-ul",
            "location-arrow"                             => "fa fa-location-arrow",
            "lock"                                       => "fa fa-lock",
            "Lock Open"                                  => "fa fa-lock-open",
            "Alternate Long Arrow Down"                  => "fa fa-long-arrow-alt-down",
            "Alternate Long Arrow Left"                  => "fa fa-long-arrow-alt-left",
            "Alternate Long Arrow Right"                 => "fa fa-long-arrow-alt-right",
            "Alternate Long Arrow Up"                    => "fa fa-long-arrow-alt-up",
            "Low Vision"                                 => "fa fa-low-vision",
            "Luggage Cart"                               => "fa fa-luggage-cart",
            "lyft"                                       => "fab fa-lyft",
            "Magento"                                    => "fab fa-magento",
            "magic"                                      => "fa fa-magic",
            "magnet"                                     => "fa fa-magnet",
            "Mail Bulk"                                  => "fa fa-mail-bulk",
            "Mailchimp"                                  => "fab fa-mailchimp",
            "Male"                                       => "fa fa-male",
            "Mandalorian"                                => "fab fa-mandalorian",
            "Map"                                        => "fa fa-map",
            "Map Marked"                                 => "fa fa-map-marked",
            "Alternate Map Marked"                       => "fa fa-map-marked-alt",
            "map-marker"                                 => "fa fa-map-marker",
            "Alternate Map Marker"                       => "fa fa-map-marker-alt",
            "Map Pin"                                    => "fa fa-map-pin",
            "Map Signs"                                  => "fa fa-map-signs",
            "Markdown"                                   => "fab fa-markdown",
            "Marker"                                     => "fa fa-marker",
            "Mars"                                       => "fa fa-mars",
            "Mars Double"                                => "fa fa-mars-double",
            "Mars Stroke"                                => "fa fa-mars-stroke",
            "Mars Stroke Horizontal"                     => "fa fa-mars-stroke-h",
            "Mars Stroke Vertical"                       => "fa fa-mars-stroke-v",
            "Mask"                                       => "fa fa-mask",
            "Mastodon"                                   => "fab fa-mastodon",
            "MaxCDN"                                     => "fab fa-maxcdn",
            "Material Design for Bootstrap"              => "fab fa-mdb",
            "Medal"                                      => "fa fa-medal",
            "MedApps"                                    => "fab fa-medapps",
            "Medium"                                     => "fab fa-medium",
            "Medium M"                                   => "fab fa-medium-m",
            "medkit"                                     => "fa fa-medkit",
            "MRT"                                        => "fab fa-medrt",
            "Meetup"                                     => "fab fa-meetup",
            "Megaport"                                   => "fab fa-megaport",
            "Neutral Face"                               => "fa fa-meh",
            "Face Without Mouth"                         => "fa fa-meh-blank",
            "Face With Rolling Eyes"                     => "fa fa-meh-rolling-eyes",
            "Memory"                                     => "fa fa-memory",
            "Mendeley"                                   => "fab fa-mendeley",
            "Menorah"                                    => "fa fa-menorah",
            "Mercury"                                    => "fa fa-mercury",
            "Meteor"                                     => "fa fa-meteor",
            "Micro.blog"                                 => "fab fa-microblog",
            "Microchip"                                  => "fa fa-microchip",
            "microphone"                                 => "fa fa-microphone",
            "Alternate Microphone"                       => "fa fa-microphone-alt",
            "Alternate Microphone Slash"                 => "fa fa-microphone-alt-slash",
            "Microphone Slash"                           => "fa fa-microphone-slash",
            "Microscope"                                 => "fa fa-microscope",
            "Microsoft"                                  => "fab fa-microsoft",
            "minus"                                      => "fa fa-minus",
            "Minus Circle"                               => "fa fa-minus-circle",
            "Minus Square"                               => "fa fa-minus-square",
            "Mitten"                                     => "fa fa-mitten",
            "Mix"                                        => "fab fa-mix",
            "Mixcloud"                                   => "fab fa-mixcloud",
            "Mizuni"                                     => "fab fa-mizuni",
            "Mobile Phone"                               => "fa fa-mobile",
            "Alternate Mobile"                           => "fa fa-mobile-alt",
            "MODX"                                       => "fab fa-modx",
            "Monero"                                     => "fab fa-monero",
            "Money Bill"                                 => "fa fa-money-bill",
            "Alternate Money Bill"                       => "fa fa-money-bill-alt",
            "Wavy Money Bill"                            => "fa fa-money-bill-wave",
            "Alternate Wavy Money Bill"                  => "fa fa-money-bill-wave-alt",
            "Money Check"                                => "fa fa-money-check",
            "Alternate Money Check"                      => "fa fa-money-check-alt",
            "Monument"                                   => "fa fa-monument",
            "Moon"                                       => "fa fa-moon",
            "Mortar Pestle"                              => "fa fa-mortar-pestle",
            "Mosque"                                     => "fa fa-mosque",
            "Motorcycle"                                 => "fa fa-motorcycle",
            "Mountain"                                   => "fa fa-mountain",
            "Mouse"                                      => "fa fa-mouse",
            "Mouse Pointer"                              => "fa fa-mouse-pointer",
            "Mug Hot"                                    => "fa fa-mug-hot",
            "Music"                                      => "fa fa-music",
            "Napster"                                    => "fab fa-napster",
            "Neos"                                       => "fab fa-neos",
            "Wired Network"                              => "fa fa-network-wired",
            "Neuter"                                     => "fa fa-neuter",
            "Newspaper"                                  => "fa fa-newspaper",
            "Nimblr"                                     => "fab fa-nimblr",
            "Node.js"                                    => "fab fa-node",
            "Node.js JS"                                 => "fab fa-node-js",
            "Not Equal"                                  => "fa fa-not-equal",
            "Medical Notes"                              => "fa fa-notes-medical",
            "npm"                                        => "fab fa-npm",
            "NS8"                                        => "fab fa-ns8",
            "Nutritionix"                                => "fab fa-nutritionix",
            "Object Group"                               => "fa fa-object-group",
            "Object Ungroup"                             => "fa fa-object-ungroup",
            "Odnoklassniki"                              => "fab fa-odnoklassniki",
            "Odnoklassniki Square"                       => "fab fa-odnoklassniki-square",
            "Oil Can"                                    => "fa fa-oil-can",
            "Old Republic"                               => "fab fa-old-republic",
            "Om"                                         => "fa fa-om",
            "OpenCart"                                   => "fab fa-opencart",
            "OpenID"                                     => "fab fa-openid",
            "Opera"                                      => "fab fa-opera",
            "Optin Monster"                              => "fab fa-optin-monster",
            "ORCID"                                      => "fab fa-orcid",
            "Open Source Initiative"                     => "fab fa-osi",
            "Otter"                                      => "fa fa-otter",
            "Outdent"                                    => "fa fa-outdent",
            "page4 Corporation"                          => "fab fa-page4",
            "Pagelines"                                  => "fab fa-pagelines",
            "Pager"                                      => "fa fa-pager",
            "Paint Brush"                                => "fa fa-paint-brush",
            "Paint Roller"                               => "fa fa-paint-roller",
            "Palette"                                    => "fa fa-palette",
            "Palfed"                                     => "fab fa-palfed",
            "Pallet"                                     => "fa fa-pallet",
            "Paper Plane"                                => "fa fa-paper-plane",
            "Paperclip"                                  => "fa fa-paperclip",
            "Parachute Box"                              => "fa fa-parachute-box",
            "paragraph"                                  => "fa fa-paragraph",
            "Parking"                                    => "fa fa-parking",
            "Passport"                                   => "fa fa-passport",
            "Pastafarianism"                             => "fa fa-pastafarianism",
            "Paste"                                      => "fa fa-paste",
            "Patreon"                                    => "fab fa-patreon",
            "pause"                                      => "fa fa-pause",
            "Pause Circle"                               => "fa fa-pause-circle",
            "Paw"                                        => "fa fa-paw",
            "Paypal"                                     => "fab fa-paypal",
            "Peace"                                      => "fa fa-peace",
            "Pen"                                        => "fa fa-pen",
            "Alternate Pen"                              => "fa fa-pen-alt",
            "Pen Fancy"                                  => "fa fa-pen-fancy",
            "Pen Nib"                                    => "fa fa-pen-nib",
            "Pen Square"                                 => "fa fa-pen-square",
            "Alternate Pencil"                           => "fa fa-pencil-alt",
            "Pencil Ruler"                               => "fa fa-pencil-ruler",
            "Penny Arcade"                               => "fab fa-penny-arcade",
            "People Carry"                               => "fa fa-people-carry",
            "Hot Pepper"                                 => "fa fa-pepper-hot",
            "Percent"                                    => "fa fa-percent",
            "Percentage"                                 => "fa fa-percentage",
            "Periscope"                                  => "fab fa-periscope",
            "Person Entering Booth"                      => "fa fa-person-booth",
            "Phabricator"                                => "fab fa-phabricator",
            "Phoenix Framework"                          => "fab fa-phoenix-framework",
            "Phoenix Squadron"                           => "fab fa-phoenix-squadron",
            "Phone"                                      => "fa fa-phone",
            "Alternate Phone"                            => "fa fa-phone-alt",
            "Phone Slash"                                => "fa fa-phone-slash",
            "Phone Square"                               => "fa fa-phone-square",
            "Alternate Phone Square"                     => "fa fa-phone-square-alt",
            "Phone Volume"                               => "fa fa-phone-volume",
            "Photo Video"                                => "fa fa-photo-video",
            "PHP"                                        => "fab fa-php",
            "Pied Piper Logo"                            => "fab fa-pied-piper",
            "Alternate Pied Piper Logo (Old)"            => "fab fa-pied-piper-alt",
            "Pied Piper Hat (Old)"                       => "fab fa-pied-piper-hat",
            "Pied Piper PP Logo (Old)"                   => "fab fa-pied-piper-pp",
            "Pied Piper Square Logo (Old)"               => "fab fa-pied-piper-square",
            "Piggy Bank"                                 => "fa fa-piggy-bank",
            "Pills"                                      => "fa fa-pills",
            "Pinterest"                                  => "fab fa-pinterest",
            "Pinterest P"                                => "fab fa-pinterest-p",
            "Pinterest Square"                           => "fab fa-pinterest-square",
            "Pizza Slice"                                => "fa fa-pizza-slice",
            "Place of Worship"                           => "fa fa-place-of-worship",
            "plane"                                      => "fa fa-plane",
            "Plane Arrival"                              => "fa fa-plane-arrival",
            "Plane Departure"                            => "fa fa-plane-departure",
            "play"                                       => "fa fa-play",
            "Play Circle"                                => "fa fa-play-circle",
            "PlayStation"                                => "fab fa-playstation",
            "Plug"                                       => "fa fa-plug",
            "plus"                                       => "fa fa-plus",
            "Plus Circle"                                => "fa fa-plus-circle",
            "Plus Square"                                => "fa fa-plus-square",
            "Podcast"                                    => "fa fa-podcast",
            "Poll"                                       => "fa fa-poll",
            "Poll H"                                     => "fa fa-poll-h",
            "Poo"                                        => "fa fa-poo",
            "Poo Storm"                                  => "fa fa-poo-storm",
            "Poop"                                       => "fa fa-poop",
            "Portrait"                                   => "fa fa-portrait",
            "Pound Sign"                                 => "fa fa-pound-sign",
            "Power Off"                                  => "fa fa-power-off",
            "Pray"                                       => "fa fa-pray",
            "Praying Hands"                              => "fa fa-praying-hands",
            "Prescription"                               => "fa fa-prescription",
            "Prescription Bottle"                        => "fa fa-prescription-bottle",
            "Alternate Prescription Bottle"              => "fa fa-prescription-bottle-alt",
            "print"                                      => "fa fa-print",
            "Procedures"                                 => "fa fa-procedures",
            "Product Hunt"                               => "fab fa-product-hunt",
            "Project Diagram"                            => "fa fa-project-diagram",
            "Pushed"                                     => "fab fa-pushed",
            "Puzzle Piece"                               => "fa fa-puzzle-piece",
            "Python"                                     => "fab fa-python",
            "QQ"                                         => "fab fa-qq",
            "qrcode"                                     => "fa fa-qrcode",
            "Question"                                   => "fa fa-question",
            "Question Circle"                            => "fa fa-question-circle",
            "Quidditch"                                  => "fa fa-quidditch",
            "QuinScape"                                  => "fab fa-quinscape",
            "Quora"                                      => "fab fa-quora",
            "quote-left"                                 => "fa fa-quote-left",
            "quote-right"                                => "fa fa-quote-right",
            "Quran"                                      => "fa fa-quran",
            "R Project"                                  => "fab fa-r-project",
            "Radiation"                                  => "fa fa-radiation",
            "Alternate Radiation"                        => "fa fa-radiation-alt",
            "Rainbow"                                    => "fa fa-rainbow",
            "random"                                     => "fa fa-random",
            "Raspberry Pi"                               => "fab fa-raspberry-pi",
            "Ravelry"                                    => "fab fa-ravelry",
            "React"                                      => "fab fa-react",
            "ReactEurope"                                => "fab fa-reacteurope",
            "ReadMe"                                     => "fab fa-readme",
            "Rebel Alliance"                             => "fab fa-rebel",
            "Receipt"                                    => "fa fa-receipt",
            "Record Vinyl"                               => "fa fa-record-vinyl",
            "Recycle"                                    => "fa fa-recycle",
            "red river"                                  => "fab fa-red-river",
            "reddit Logo"                                => "fab fa-reddit",
            "reddit Alien"                               => "fab fa-reddit-alien",
            "reddit Square"                              => "fab fa-reddit-square",
            "Redhat"                                     => "fab fa-redhat",
            "Redo"                                       => "fa fa-redo",
            "Alternate Redo"                             => "fa fa-redo-alt",
            "Registered Trademark"                       => "fa fa-registered",
            "Remove Format"                              => "fa fa-remove-format",
            "Renren"                                     => "fab fa-renren",
            "Reply"                                      => "fa fa-reply",
            "reply-all"                                  => "fa fa-reply-all",
            "replyd"                                     => "fab fa-replyd",
            "Republican"                                 => "fa fa-republican",
            "Researchgate"                               => "fab fa-researchgate",
            "Resolving"                                  => "fab fa-resolving",
            "Restroom"                                   => "fa fa-restroom",
            "Retweet"                                    => "fa fa-retweet",
            "Rev.io"                                     => "fab fa-rev",
            "Ribbon"                                     => "fa fa-ribbon",
            "Ring"                                       => "fa fa-ring",
            "road"                                       => "fa fa-road",
            "Robot"                                      => "fa fa-robot",
            "rocket"                                     => "fa fa-rocket",
            "Rocket.Chat"                                => "fab fa-rocketchat",
            "Rockrms"                                    => "fab fa-rockrms",
            "Route"                                      => "fa fa-route",
            "rss"                                        => "fa fa-rss",
            "RSS Square"                                 => "fa fa-rss-square",
            "Ruble Sign"                                 => "fa fa-ruble-sign",
            "Ruler"                                      => "fa fa-ruler",
            "Ruler Combined"                             => "fa fa-ruler-combined",
            "Ruler Horizontal"                           => "fa fa-ruler-horizontal",
            "Ruler Vertical"                             => "fa fa-ruler-vertical",
            "Running"                                    => "fa fa-running",
            "Indian Rupee Sign"                          => "fa fa-rupee-sign",
            "Crying Face"                                => "fa fa-sad-cry",
            "Loudly Crying Face"                         => "fa fa-sad-tear",
            "Safari"                                     => "fab fa-safari",
            "Salesforce"                                 => "fab fa-salesforce",
            "Sass"                                       => "fab fa-sass",
            "Satellite"                                  => "fa fa-satellite",
            "Satellite Dish"                             => "fa fa-satellite-dish",
            "Save"                                       => "fa fa-save",
            "SCHLIX"                                     => "fab fa-schlix",
            "School"                                     => "fa fa-school",
            "Screwdriver"                                => "fa fa-screwdriver",
            "Scribd"                                     => "fab fa-scribd",
            "Scroll"                                     => "fa fa-scroll",
            "Sd Card"                                    => "fa fa-sd-card",
            "Search"                                     => "fa fa-search",
            "Search Dollar"                              => "fa fa-search-dollar",
            "Search Location"                            => "fa fa-search-location",
            "Search Minus"                               => "fa fa-search-minus",
            "Search Plus"                                => "fa fa-search-plus",
            "Searchengin"                                => "fab fa-searchengin",
            "Seedling"                                   => "fa fa-seedling",
            "Sellcast"                                   => "fab fa-sellcast",
            "Sellsy"                                     => "fab fa-sellsy",
            "Server"                                     => "fa fa-server",
            "Servicestack"                               => "fab fa-servicestack",
            "Shapes"                                     => "fa fa-shapes",
            "Share"                                      => "fa fa-share",
            "Alternate Share"                            => "fa fa-share-alt",
            "Alternate Share Square"                     => "fa fa-share-alt-square",
            "Share Square"                               => "fa fa-share-square",
            "Shekel Sign"                                => "fa fa-shekel-sign",
            "Alternate Shield"                           => "fa fa-shield-alt",
            "Ship"                                       => "fa fa-ship",
            "Shipping Fast"                              => "fa fa-shipping-fast",
            "Shirts in Bulk"                             => "fab fa-shirtsinbulk",
            "Shoe Prints"                                => "fa fa-shoe-prints",
            "Shopping Bag"                               => "fa fa-shopping-bag",
            "Shopping Basket"                            => "fa fa-shopping-basket",
            "shopping-cart"                              => "fa fa-shopping-cart",
            "Shopware"                                   => "fab fa-shopware",
            "Shower"                                     => "fa fa-shower",
            "Shuttle Van"                                => "fa fa-shuttle-van",
            "Sign"                                       => "fa fa-sign",
            "Alternate Sign In"                          => "fa fa-sign-in-alt",
            "Sign Language"                              => "fa fa-sign-language",
            "Alternate Sign Out"                         => "fa fa-sign-out-alt",
            "signal"                                     => "fa fa-signal",
            "Signature"                                  => "fa fa-signature",
            "SIM Card"                                   => "fa fa-sim-card",
            "SimplyBuilt"                                => "fab fa-simplybuilt",
            "SISTRIX"                                    => "fab fa-sistrix",
            "Sitemap"                                    => "fa fa-sitemap",
            "Sith"                                       => "fab fa-sith",
            "Skating"                                    => "fa fa-skating",
            "Sketch"                                     => "fab fa-sketch",
            "Skiing"                                     => "fa fa-skiing",
            "Skiing Nordic"                              => "fa fa-skiing-nordic",
            "Skull"                                      => "fa fa-skull",
            "Skull & Crossbones"                         => "fa fa-skull-crossbones",
            "skyatlas"                                   => "fab fa-skyatlas",
            "Skype"                                      => "fab fa-skype",
            "Slack Logo"                                 => "fab fa-slack",
            "Slack Hashtag"                              => "fab fa-slack-hash",
            "Slash"                                      => "fa fa-slash",
            "Sleigh"                                     => "fa fa-sleigh",
            "Horizontal Sliders"                         => "fa fa-sliders-h",
            "Slideshare"                                 => "fab fa-slideshare",
            "Smiling Face"                               => "fa fa-smile",
            "Beaming Face With Smiling Eyes"             => "fa fa-smile-beam",
            "Winking Face"                               => "fa fa-smile-wink",
            "Smog"                                       => "fa fa-smog",
            "Smoking"                                    => "fa fa-smoking",
            "Smoking Ban"                                => "fa fa-smoking-ban",
            "SMS"                                        => "fa fa-sms",
            "Snapchat"                                   => "fab fa-snapchat",
            "Snapchat Ghost"                             => "fab fa-snapchat-ghost",
            "Snapchat Square"                            => "fab fa-snapchat-square",
            "Snowboarding"                               => "fa fa-snowboarding",
            "Snowflake"                                  => "fa fa-snowflake",
            "Snowman"                                    => "fa fa-snowman",
            "Snowplow"                                   => "fa fa-snowplow",
            "Socks"                                      => "fa fa-socks",
            "Solar Panel"                                => "fa fa-solar-panel",
            "Sort"                                       => "fa fa-sort",
            "Sort Alphabetical Down"                     => "fa fa-sort-alpha-down",
            "Alternate Sort Alphabetical Down"           => "fa fa-sort-alpha-down-alt",
            "Sort Alphabetical Up"                       => "fa fa-sort-alpha-up",
            "Alternate Sort Alphabetical Up"             => "fa fa-sort-alpha-up-alt",
            "Sort Amount Down"                           => "fa fa-sort-amount-down",
            "Alternate Sort Amount Down"                 => "fa fa-sort-amount-down-alt",
            "Sort Amount Up"                             => "fa fa-sort-amount-up",
            "Alternate Sort Amount Up"                   => "fa fa-sort-amount-up-alt",
            "Sort Down (Descending)"                     => "fa fa-sort-down",
            "Sort Numeric Down"                          => "fa fa-sort-numeric-down",
            "Alternate Sort Numeric Down"                => "fa fa-sort-numeric-down-alt",
            "Sort Numeric Up"                            => "fa fa-sort-numeric-up",
            "Alternate Sort Numeric Up"                  => "fa fa-sort-numeric-up-alt",
            "Sort Up (Ascending)"                        => "fa fa-sort-up",
            "SoundCloud"                                 => "fab fa-soundcloud",
            "Sourcetree"                                 => "fab fa-sourcetree",
            "Spa"                                        => "fa fa-spa",
            "Space Shuttle"                              => "fa fa-space-shuttle",
            "Speakap"                                    => "fab fa-speakap",
            "Speaker Deck"                               => "fab fa-speaker-deck",
            "Spell Check"                                => "fa fa-spell-check",
            "Spider"                                     => "fa fa-spider",
            "Spinner"                                    => "fa fa-spinner",
            "Splotch"                                    => "fa fa-splotch",
            "Spotify"                                    => "fab fa-spotify",
            "Spray Can"                                  => "fa fa-spray-can",
            "Square"                                     => "fa fa-square",
            "Square Full"                                => "fa fa-square-full",
            "Alternate Square Root"                      => "fa fa-square-root-alt",
            "Squarespace"                                => "fab fa-squarespace",
            "Stack Exchange"                             => "fab fa-stack-exchange",
            "Stack Overflow"                             => "fab fa-stack-overflow",
            "Stackpath"                                  => "fab fa-stackpath",
            "Stamp"                                      => "fa fa-stamp",
            "Star"                                       => "fa fa-star",
            "Star and Crescent"                          => "fa fa-star-and-crescent",
            "star-half"                                  => "fa fa-star-half",
            "Alternate Star Half"                        => "fa fa-star-half-alt",
            "Star of David"                              => "fa fa-star-of-david",
            "Star of Life"                               => "fa fa-star-of-life",
            "StayLinked"                                 => "fab fa-staylinked",
            "Steam"                                      => "fab fa-steam",
            "Steam Square"                               => "fab fa-steam-square",
            "Steam Symbol"                               => "fab fa-steam-symbol",
            "step-backward"                              => "fa fa-step-backward",
            "step-forward"                               => "fa fa-step-forward",
            "Stethoscope"                                => "fa fa-stethoscope",
            "Sticker Mule"                               => "fab fa-sticker-mule",
            "Sticky Note"                                => "fa fa-sticky-note",
            "stop"                                       => "fa fa-stop",
            "Stop Circle"                                => "fa fa-stop-circle",
            "Stopwatch"                                  => "fa fa-stopwatch",
            "Store"                                      => "fa fa-store",
            "Alternate Store"                            => "fa fa-store-alt",
            "Strava"                                     => "fab fa-strava",
            "Stream"                                     => "fa fa-stream",
            "Street View"                                => "fa fa-street-view",
            "Strikethrough"                              => "fa fa-strikethrough",
            "Stripe"                                     => "fab fa-stripe",
            "Stripe S"                                   => "fab fa-stripe-s",
            "Stroopwafel"                                => "fa fa-stroopwafel",
            "Studio Vinari"                              => "fab fa-studiovinari",
            "StumbleUpon Logo"                           => "fab fa-stumbleupon",
            "StumbleUpon Circle"                         => "fab fa-stumbleupon-circle",
            "subscript"                                  => "fa fa-subscript",
            "Subway"                                     => "fa fa-subway",
            "Suitcase"                                   => "fa fa-suitcase",
            "Suitcase Rolling"                           => "fa fa-suitcase-rolling",
            "Sun"                                        => "fa fa-sun",
            "Superpowers"                                => "fab fa-superpowers",
            "superscript"                                => "fa fa-superscript",
            "Supple"                                     => "fab fa-supple",
            "Hushed Face"                                => "fa fa-surprise",
            "Suse"                                       => "fab fa-suse",
            "Swatchbook"                                 => "fa fa-swatchbook",
            "Swift"                                      => "fab fa-swift",
            "Swimmer"                                    => "fa fa-swimmer",
            "Swimming Pool"                              => "fa fa-swimming-pool",
            "Symfony"                                    => "fab fa-symfony",
            "Synagogue"                                  => "fa fa-synagogue",
            "Sync"                                       => "fa fa-sync",
            "Alternate Sync"                             => "fa fa-sync-alt",
            "Syringe"                                    => "fa fa-syringe",
            "table"                                      => "fa fa-table",
            "Table Tennis"                               => "fa fa-table-tennis",
            "tablet"                                     => "fa fa-tablet",
            "Alternate Tablet"                           => "fa fa-tablet-alt",
            "Tablets"                                    => "fa fa-tablets",
            "Alternate Tachometer"                       => "fa fa-tachometer-alt",
            "tag"                                        => "fa fa-tag",
            "tags"                                       => "fa fa-tags",
            "Tape"                                       => "fa fa-tape",
            "Tasks"                                      => "fa fa-tasks",
            "Taxi"                                       => "fa fa-taxi",
            "TeamSpeak"                                  => "fab fa-teamspeak",
            "Teeth"                                      => "fa fa-teeth",
            "Teeth Open"                                 => "fa fa-teeth-open",
            "Telegram"                                   => "fab fa-telegram",
            "Telegram Plane"                             => "fab fa-telegram-plane",
            "High Temperature"                           => "fa fa-temperature-high",
            "Low Temperature"                            => "fa fa-temperature-low",
            "Tencent Weibo"                              => "fab fa-tencent-weibo",
            "Tenge"                                      => "fa fa-tenge",
            "Terminal"                                   => "fa fa-terminal",
            "text-height"                                => "fa fa-text-height",
            "Text Width"                                 => "fa fa-text-width",
            "th"                                         => "fa fa-th",
            "th-large"                                   => "fa fa-th-large",
            "th-list"                                    => "fa fa-th-list",
            "The Red Yeti"                               => "fab fa-the-red-yeti",
            "Theater Masks"                              => "fa fa-theater-masks",
            "Themeco"                                    => "fab fa-themeco",
            "ThemeIsle"                                  => "fab fa-themeisle",
            "Thermometer"                                => "fa fa-thermometer",
            "Thermometer Empty"                          => "fa fa-thermometer-empty",
            "Thermometer Full"                           => "fa fa-thermometer-full",
            "Thermometer 1/2 Full"                       => "fa fa-thermometer-half",
            "Thermometer 1/4 Full"                       => "fa fa-thermometer-quarter",
            "Thermometer 3/4 Full"                       => "fa fa-thermometer-three-quarters",
            "Think Peaks"                                => "fab fa-think-peaks",
            "thumbs-down"                                => "fa fa-thumbs-down",
            "thumbs-up"                                  => "fa fa-thumbs-up",
            "Thumbtack"                                  => "fa fa-thumbtack",
            "Alternate Ticket"                           => "fa fa-ticket-alt",
            "Times"                                      => "fa fa-times",
            "Times Circle"                               => "fa fa-times-circle",
            "tint"                                       => "fa fa-tint",
            "Tint Slash"                                 => "fa fa-tint-slash",
            "Tired Face"                                 => "fa fa-tired",
            "Toggle Off"                                 => "fa fa-toggle-off",
            "Toggle On"                                  => "fa fa-toggle-on",
            "Toilet"                                     => "fa fa-toilet",
            "Toilet Paper"                               => "fa fa-toilet-paper",
            "Toolbox"                                    => "fa fa-toolbox",
            "Tools"                                      => "fa fa-tools",
            "Tooth"                                      => "fa fa-tooth",
            "Torah"                                      => "fa fa-torah",
            "Torii Gate"                                 => "fa fa-torii-gate",
            "Tractor"                                    => "fa fa-tractor",
            "Trade Federation"                           => "fab fa-trade-federation",
            "Trademark"                                  => "fa fa-trademark",
            "Traffic Light"                              => "fa fa-traffic-light",
            "Trailer"                                    => "fa fa-trailer",
            "Train"                                      => "fa fa-train",
            "Tram"                                       => "fa fa-tram",
            "Transgender"                                => "fa fa-transgender",
            "Alternate Transgender"                      => "fa fa-transgender-alt",
            "Trash"                                      => "fa fa-trash",
            "Alternate Trash"                            => "fa fa-trash-alt",
            "Trash Restore"                              => "fa fa-trash-restore",
            "Alternative Trash Restore"                  => "fa fa-trash-restore-alt",
            "Tree"                                       => "fa fa-tree",
            "Trello"                                     => "fab fa-trello",
            "TripAdvisor"                                => "fab fa-tripadvisor",
            "trophy"                                     => "fa fa-trophy",
            "truck"                                      => "fa fa-truck",
            "Truck Loading"                              => "fa fa-truck-loading",
            "Truck Monster"                              => "fa fa-truck-monster",
            "Truck Moving"                               => "fa fa-truck-moving",
            "Truck Side"                                 => "fa fa-truck-pickup",
            "T-Shirt"                                    => "fa fa-tshirt",
            "TTY"                                        => "fa fa-tty",
            "Tumblr"                                     => "fab fa-tumblr",
            "Tumblr Square"                              => "fab fa-tumblr-square",
            "Television"                                 => "fa fa-tv",
            "Twitch"                                     => "fab fa-twitch",
            "Twitter"                                    => "fab fa-twitter",
            "Twitter Square"                             => "fab fa-twitter-square",
            "Typo3"                                      => "fab fa-typo3",
            "Uber"                                       => "fab fa-uber",
            "Ubuntu"                                     => "fab fa-ubuntu",
            "UIkit"                                      => "fab fa-uikit",
            "Umbraco"                                    => "fab fa-umbraco",
            "Umbrella"                                   => "fa fa-umbrella",
            "Umbrella Beach"                             => "fa fa-umbrella-beach",
            "Underline"                                  => "fa fa-underline",
            "Undo"                                       => "fa fa-undo",
            "Alternate Undo"                             => "fa fa-undo-alt",
            "Uniregistry"                                => "fab fa-uniregistry",
            "Unity 3D"                                   => "fab fa-unity",
            "Universal Access"                           => "fa fa-universal-access",
            "University"                                 => "fa fa-university",
            "unlink"                                     => "fa fa-unlink",
            "unlock"                                     => "fa fa-unlock",
            "Alternate Unlock"                           => "fa fa-unlock-alt",
            "Untappd"                                    => "fab fa-untappd",
            "Upload"                                     => "fa fa-upload",
            "UPS"                                        => "fab fa-ups",
            "USB"                                        => "fab fa-usb",
            "User"                                       => "fa fa-user",
            "Alternate User"                             => "fa fa-user-alt",
            "Alternate User Slash"                       => "fa fa-user-alt-slash",
            "User Astronaut"                             => "fa fa-user-astronaut",
            "User Check"                                 => "fa fa-user-check",
            "User Circle"                                => "fa fa-user-circle",
            "User Clock"                                 => "fa fa-user-clock",
            "User Cog"                                   => "fa fa-user-cog",
            "User Edit"                                  => "fa fa-user-edit",
            "User Friends"                               => "fa fa-user-friends",
            "User Graduate"                              => "fa fa-user-graduate",
            "User Injured"                               => "fa fa-user-injured",
            "User Lock"                                  => "fa fa-user-lock",
            "Doctor"                                     => "fa fa-user-md",
            "User Minus"                                 => "fa fa-user-minus",
            "User Ninja"                                 => "fa fa-user-ninja",
            "Nurse"                                      => "fa fa-user-nurse",
            "User Plus"                                  => "fa fa-user-plus",
            "User Secret"                                => "fa fa-user-secret",
            "User Shield"                                => "fa fa-user-shield",
            "User Slash"                                 => "fa fa-user-slash",
            "User Tag"                                   => "fa fa-user-tag",
            "User Tie"                                   => "fa fa-user-tie",
            "Remove User"                                => "fa fa-user-times",
            "Users"                                      => "fa fa-users",
            "Users Cog"                                  => "fa fa-users-cog",
            "United States Postal Service"               => "fab fa-usps",
            "us-Sunnah Foundation"                       => "fab fa-ussunnah",
            "Utensil Spoon"                              => "fa fa-utensil-spoon",
            "Utensils"                                   => "fa fa-utensils",
            "Vaadin"                                     => "fab fa-vaadin",
            "Vector Square"                              => "fa fa-vector-square",
            "Venus"                                      => "fa fa-venus",
            "Venus Double"                               => "fa fa-venus-double",
            "Venus Mars"                                 => "fa fa-venus-mars",
            "Viacoin"                                    => "fab fa-viacoin",
            "Video"                                      => "fab fa-viadeo",
            "Video Square"                               => "fab fa-viadeo-square",
            "Vial"                                       => "fa fa-vial",
            "Vials"                                      => "fa fa-vials",
            "Viber"                                      => "fab fa-viber",
            "Video"                                      => "fa fa-video",
            "Video Slash"                                => "fa fa-video-slash",
            "Vihara"                                     => "fa fa-vihara",
            "Vimeo"                                      => "fab fa-vimeo",
            "Vimeo Square"                               => "fab fa-vimeo-square",
            "Vimeo"                                      => "fab fa-vimeo-v",
            "Vine"                                       => "fab fa-vine",
            "VK"                                         => "fab fa-vk",
            "VNV"                                        => "fab fa-vnv",
            "Voicemail"                                  => "fa fa-voicemail",
            "Volleyball Ball"                            => "fa fa-volleyball-ball",
            "Volume Down"                                => "fa fa-volume-down",
            "Volume Mute"                                => "fa fa-volume-mute",
            "Volume Off"                                 => "fa fa-volume-off",
            "Volume Up"                                  => "fa fa-volume-up",
            "Vote Yea"                                   => "fa fa-vote-yea",
            "Cardboard VR"                               => "fa fa-vr-cardboard",
            "Vue.js"                                     => "fab fa-vuejs",
            "Walking"                                    => "fa fa-walking",
            "Wallet"                                     => "fa fa-wallet",
            "Warehouse"                                  => "fa fa-warehouse",
            "Water"                                      => "fa fa-water",
            "Square Wave"                                => "fa fa-wave-square",
            "Waze"                                       => "fab fa-waze",
            "Weebly"                                     => "fab fa-weebly",
            "Weibo"                                      => "fab fa-weibo",
            "Weight"                                     => "fa fa-weight",
            "Hanging Weight"                             => "fa fa-weight-hanging",
            "Weixin (WeChat)"                            => "fab fa-weixin",
            "What's App"                                 => "fab fa-whatsapp",
            "What's App Square"                          => "fab fa-whatsapp-square",
            "Wheelchair"                                 => "fa fa-wheelchair",
            "WHMCS"                                      => "fab fa-whmcs",
            "WiFi"                                       => "fa fa-wifi",
            "Wikipedia W"                                => "fab fa-wikipedia-w",
            "Wind"                                       => "fa fa-wind",
            "Window Close"                               => "fa fa-window-close",
            "Window Maximize"                            => "fa fa-window-maximize",
            "Window Minimize"                            => "fa fa-window-minimize",
            "Window Restore"                             => "fa fa-window-restore",
            "Windows"                                    => "fab fa-windows",
            "Wine Bottle"                                => "fa fa-wine-bottle",
            "Wine Glass"                                 => "fa fa-wine-glass",
            "Alternate Wine Glas"                        => "fa fa-wine-glass-alt",
            "Wix"                                        => "fab fa-wix",
            "Wizards of the Coast"                       => "fab fa-wizards-of-the-coast",
            "Wolf Pack Battalion"                        => "fab fa-wolf-pack-battalion",
            "Won Sign"                                   => "fa fa-won-sign",
            "WordPress Logo"                             => "fab fa-wordpress",
            "Wordpress Simple"                           => "fab fa-wordpress-simple",
            "WPBeginner"                                 => "fab fa-wpbeginner",
            "WPExplorer"                                 => "fab fa-wpexplorer",
            "WPForms"                                    => "fab fa-wpforms",
            "wpressr"                                    => "fab fa-wpressr",
            "Wrench"                                     => "fa fa-wrench",
            "X-Ray"                                      => "fa fa-x-ray",
            "Xbox"                                       => "fab fa-xbox",
            "Xing"                                       => "fab fa-xing",
            "Xing Square"                                => "fab fa-xing-square",
            "Y Combinator"                               => "fab fa-y-combinator",
            "Yahoo Logo"                                 => "fab fa-yahoo",
            "Yammer"                                     => "fab fa-yammer",
            "Yandex"                                     => "fab fa-yandex",
            "Yandex International"                       => "fab fa-yandex-international",
            "Yarn"                                       => "fab fa-yarn",
            "Yelp"                                       => "fab fa-yelp",
            "Yen Sign"                                   => "fa fa-yen-sign",
            "Yin Yang"                                   => "fa fa-yin-yang",
            "Yoast"                                      => "fab fa-yoast",
            "YouTube"                                    => "fab fa-youtube",
            "YouTube Square"                             => "fab fa-youtube-square",
            "Zhihu"                                      => "fab fa-zhihu"
        ));

        $fa_icons = array();
        $fa_icons[""] = "";
        foreach ($this->icons as $key => $value) {
            $fa_icons[$key] = $key;
        }

        $this->icons = $fa_icons;
    }

    public function getIconsArray() {
        return $this->icons;
    }

    public function render($icon, $params = array()) {
        $html = '';
        extract($params);
        $iconAttributesString = '';
        $iconClass = '';
        if (isset($icon_attributes) && count($icon_attributes)) {
            foreach ($icon_attributes as $icon_attr_name => $icon_attr_val) {
                if ($icon_attr_name === 'class') {
                    $iconClass = $icon_attr_val;
                    unset($icon_attributes[$icon_attr_name]);
                } else {
                    $iconAttributesString .= $icon_attr_name . '="' . $icon_attr_val . '" ';
                }
            }
        }

        if (isset($before_icon) && $before_icon !== '') {
            $beforeIconAttrString = '';
            if (isset($before_icon_attributes) && count($before_icon_attributes)) {
                foreach ($before_icon_attributes as $before_icon_attr_name => $before_icon_attr_val) {
                    $beforeIconAttrString .= $before_icon_attr_name . '="' . $before_icon_attr_val . '" ';
                }
            }

            $html .= '<' . $before_icon . ' ' . $beforeIconAttrString . '>';
        }

        $html .= '<i class="qode_icon_font_awesome_5 fa5 ' . $icon . ' ' . $iconClass . '" ' . $iconAttributesString . '></i>';

        if (isset($before_icon) && $before_icon !== '') {
            $html .= '</' . $before_icon . '>';
        }

        return $html;
    }

    public function hasSocialIcons() {
        return false;
    }

    public function getSearchIcon($params = array()) {

        return $this->render('fa fa-search', $params);
    }

    public function getSearchClose($params = array()) {

        return $this->render('fa fa-times', $params);
    }

    public function getMenuSideIcon() {

        return $this->render('fa fa-bars');
    }

    public function hasBackToTopIcons()	{
        return true;
    }

    public function setBackToTopIconsArray() {
        $this->backTopTopIcons = array(
            ''                      => '',
            'fa fa-angle-up' => esc_html__('Angle Up', 'bridge'),
            'fa fa-angle-double-up' => esc_html__('Angle Double Up', 'bridge'),
            'fa fa-arrow-alt-circle-up' => esc_html__('Alt Circle Up', 'bridge'),
            'fa fa-chevron-up' => esc_html__('Chevron Up', 'bridge'),
            'fa fa-hand-point-up' => esc_html__('Hand Point Up', 'bridge'),
            'fa fa-level-up-alt' => esc_html__('Alt Level Up', 'bridge'),
            'fa fa-long-arrow-alt-up' => esc_html__('Alt Long Arrow Up', 'bridge'),
        );

        $fa_icons = array();
        $fa_icons[""] = "";
        foreach ($this->backTopTopIcons as $key => $value) {
            $fa_icons[$key] = $value;
        }

        $this->backTopTopIcons = $fa_icons;
    }

    public function getBackToTopIconsArray() {

        return $this->backTopTopIcons;
    }

    public function getMobileMenuIcon() {

        return $this->render('fa fa-bars');
    }

    public function getQuoteIcon() {

        return $this->render('fa fa-quote-left');
    }

    public function getSocialIconsArrayVC()	{

        return array();
    }

}