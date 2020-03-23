<?php

namespace App\Domain\Market\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Store
 *
 * @property string $name
 * @property string $niceName
 */
class Store extends Model
{
    protected $table = 'stores';
    protected $fillable = ['name', 'niceName'];

    /** @see https://github.com/broderickhyman/ao-bin-dumps/blob/master/formatted/world.json */
    const KNOWN_PLACES_JSON = <<<END
[
{
  "Index": "Debug",
  "UniqueName": "Debug_DBG_DL_T1_NON"
},
{
  "Index": "ISLAND-GUILD-0001a",
  "UniqueName": "ISLAND-GUILD-0001a_ISL_DL_T1_NON"
},
{
  "Index": "ISLAND-PLAYER-0001a",
  "UniqueName": "ISLAND-PLAYER-0001a_ISL_DL_T1_NON"
},
{
  "Index": "ISLAND-PLAYER-0001f",
  "UniqueName": "ISLAND-PLAYER-0001f_ISL_DL_T1_NON"
},
{
  "Index": "ISLAND-PLAYER-0001e",
  "UniqueName": "ISLAND-PLAYER-0001e_ISL_DL_T1_NON"
},
{
  "Index": "ISLAND-PLAYER-0001d",
  "UniqueName": "ISLAND-PLAYER-0001d_ISL_DL_T1_NON"
},
{
  "Index": "ISLAND-PLAYER-0001c",
  "UniqueName": "ISLAND-PLAYER-0001c_ISL_DL_T1_NON"
},
{
  "Index": "ISLAND-PLAYER-0001b",
  "UniqueName": "ISLAND-PLAYER-0001b_ISL_DL_T1_NON"
},
{
  "Index": "ISLAND-GUILD-0001b",
  "UniqueName": "ISLAND-GUILD-0001b_ISL_DL_T1_NON"
},
{
  "Index": "ISLAND-GUILD-0001c",
  "UniqueName": "ISLAND-GUILD-0001c_ISL_DL_T1_NON"
},
{
  "Index": "ISLAND-GUILD-0001d",
  "UniqueName": "ISLAND-GUILD-0001d_ISL_DL_T1_NON"
},
{
  "Index": "ISLAND-GUILD-0001e",
  "UniqueName": "ISLAND-GUILD-0001e_ISL_DL_T1_NON"
},
{
  "Index": "ISLAND-GUILD-0001f",
  "UniqueName": "ISLAND-GUILD-0001f_ISL_DL_T1_NON"
},
{
  "Index": "0004",
  "UniqueName": "Swamp Cross"
},
{
  "Index": "0003#1",
  "UniqueName": "Swamp Landing #2"
},
{
  "Index": "4206",
  "UniqueName": "Tharcal Fissure"
},
{
  "Index": "MushroomCave-GROUP",
  "UniqueName": "Mushroom Cave"
},
{
  "Index": "MushroomCave-SOLO",
  "UniqueName": "Mushroom Cave"
},
{
  "Index": "FishyBusiness-GROUP",
  "UniqueName": "Fishy Business"
},
{
  "Index": "FishyBusiness-SOLO",
  "UniqueName": "Fishy Business"
},
{
  "Index": "StoneWars-GROUP",
  "UniqueName": "Stone Wars"
},
{
  "Index": "StoneWars-SOLO",
  "UniqueName": "Stone Wars"
},
{
  "Index": "4209",
  "UniqueName": "Cairn Darg"
},
{
  "Index": "4210",
  "UniqueName": "Gwan Gorge"
},
{
  "Index": "4215",
  "UniqueName": "Malag Crevasse"
},
{
  "Index": "4216",
  "UniqueName": "Creag Morr"
},
{
  "Index": "4213",
  "UniqueName": "Cairn Camain"
},
{
  "Index": "4212",
  "UniqueName": "Cairn Glascore"
},
{
  "Index": "4207",
  "UniqueName": "Pen Gent"
},
{
  "Index": "4201",
  "UniqueName": "Pen Garn"
},
{
  "Index": "4203",
  "UniqueName": "Crose Gorge"
},
{
  "Index": "3201",
  "UniqueName": "Birken Fell"
},
{
  "Index": "3204",
  "UniqueName": "Eldon Hill"
},
{
  "Index": "3203",
  "UniqueName": "Lewsdon Hill"
},
{
  "Index": "3207",
  "UniqueName": "Blackthorn Quarry"
},
{
  "Index": "3206",
  "UniqueName": "Haytor"
},
{
  "Index": "3209",
  "UniqueName": "Brent Knoll"
},
{
  "Index": "3210",
  "UniqueName": "Mase Knoll"
},
{
  "Index": "3212",
  "UniqueName": "Croker Hill"
},
{
  "Index": "3215",
  "UniqueName": "Goffers Knoll"
},
{
  "Index": "3213",
  "UniqueName": "Vixen Tor"
},
{
  "Index": "2215",
  "UniqueName": "Prospector's Hope"
},
{
  "Index": "2213",
  "UniqueName": "Steelhide Meadow"
},
{
  "Index": "2212",
  "UniqueName": "Longmarch Meadow"
},
{
  "Index": "2209",
  "UniqueName": "Lazygrass Plain"
},
{
  "Index": "2210",
  "UniqueName": "Snapshaft Trough"
},
{
  "Index": "2207",
  "UniqueName": "Drywater Meadow"
},
{
  "Index": "2206",
  "UniqueName": "Parchthroat Plain"
},
{
  "Index": "2204",
  "UniqueName": "Deadvein Gully"
},
{
  "Index": "2203",
  "UniqueName": "Roastcorpse Steppe"
},
{
  "Index": "2201",
  "UniqueName": "Kindlegrass Steppe"
},
{
  "Index": "1215",
  "UniqueName": "Ferndell"
},
{
  "Index": "1213",
  "UniqueName": "Wyre Forest"
},
{
  "Index": "1212",
  "UniqueName": "Stagbourne"
},
{
  "Index": "1210",
  "UniqueName": "Murkweald"
},
{
  "Index": "1209",
  "UniqueName": "Longtimber Glen"
},
{
  "Index": "1207",
  "UniqueName": "Birchcopse"
},
{
  "Index": "1206",
  "UniqueName": "Willow Wood"
},
{
  "Index": "1204",
  "UniqueName": "Oakcopse"
},
{
  "Index": "1203",
  "UniqueName": "Rowanwood"
},
{
  "Index": "1201",
  "UniqueName": "Larchroad"
},
{
  "Index": "4204",
  "UniqueName": "Pen Kerrig"
},
{
  "Index": "0214",
  "UniqueName": "Slimehag"
},
{
  "Index": "0212",
  "UniqueName": "Bonepool Marsh"
},
{
  "Index": "0211",
  "UniqueName": "Spectral Sump"
},
{
  "Index": "0203",
  "UniqueName": "Willowsigh Marsh"
},
{
  "Index": "0208",
  "UniqueName": "Stumprot Swamp"
},
{
  "Index": "0206",
  "UniqueName": "Dusklight Fen"
},
{
  "Index": "0209",
  "UniqueName": "Dewleaf Fen"
},
{
  "Index": "0205",
  "UniqueName": "Stinkhag"
},
{
  "Index": "0202",
  "UniqueName": "Chillhag"
},
{
  "Index": "2208",
  "UniqueName": "Slowtree Plain"
},
{
  "Index": "2211",
  "UniqueName": "Smoothfloor Cleft"
},
{
  "Index": "3205",
  "UniqueName": "Gutras Hill"
},
{
  "Index": "3202",
  "UniqueName": "Mardale"
},
{
  "Index": "0210",
  "UniqueName": "Wispwhisper Marsh"
},
{
  "Index": "0213",
  "UniqueName": "Curlew Fen"
},
{
  "Index": "3211",
  "UniqueName": "Saddle Tor"
},
{
  "Index": "0204",
  "UniqueName": "Windripple Fen"
},
{
  "Index": "4208",
  "UniqueName": "Mawar Gorge"
},
{
  "Index": "1202",
  "UniqueName": "Russerdell"
},
{
  "Index": "4202",
  "UniqueName": "Bryn Gorge"
},
{
  "Index": "4205",
  "UniqueName": "Cairn Gorm"
},
{
  "Index": "LumberCampGROUP",
  "UniqueName": "Lumber Lunacy"
},
{
  "Index": "RecruitmentOfTheDead-GROUP",
  "UniqueName": "Preaching to the Dead"
},
{
  "Index": "RecruitmentOfTheDead-SOLO",
  "UniqueName": "Preaching to the Dead"
},
{
  "Index": "3208",
  "UniqueName": "Bowscale Fell"
},
{
  "Index": "4214",
  "UniqueName": "Cairn Fidair"
},
{
  "Index": "4211",
  "UniqueName": "Creag Garr"
},
{
  "Index": "0207",
  "UniqueName": "Nightcreak Marsh"
},
{
  "Index": "2214",
  "UniqueName": "Fractured Ground"
},
{
  "Index": "2202",
  "UniqueName": "Cracked Earth"
},
{
  "Index": "1208",
  "UniqueName": "Redlake"
},
{
  "Index": "1211",
  "UniqueName": "Yew Wood"
},
{
  "Index": "1205",
  "UniqueName": "Highbole Glen"
},
{
  "Index": "1214",
  "UniqueName": "Hornbeam Wood"
},
{
  "Index": "2002",
  "UniqueName": "Steppe Cross"
},
{
  "Index": "3000",
  "UniqueName": "Highland Landing"
},
{
  "Index": "3002",
  "UniqueName": "Highland Cross"
},
{
  "Index": "3214",
  "UniqueName": "Haldon Tor"
},
{
  "Index": "LumberCampSOLO",
  "UniqueName": "Lumber Lunacy"
},
{
  "Index": "3004",
  "UniqueName": "Martlock"
},
{
  "Index": "4000",
  "UniqueName": "Fort Sterling"
},
{
  "Index": "4005",
  "UniqueName": "Mountain Landing"
},
{
  "Index": "1006",
  "UniqueName": "Forest Cross"
},
{
  "Index": "4006",
  "UniqueName": "Mountain Cross"
},
{
  "Index": "0000",
  "UniqueName": "Thetford"
},
{
  "Index": "0201",
  "UniqueName": "Sleetwater Basin"
},
{
  "Index": "1000",
  "UniqueName": "Lymhurst"
},
{
  "Index": "1005",
  "UniqueName": "Forest Landing"
},
{
  "Index": "2001",
  "UniqueName": "Steppe Landing"
},
{
  "Index": "0005",
  "UniqueName": "Camlann"
},
{
  "Index": "2009",
  "UniqueName": "Astolat"
},
{
  "Index": "0003",
  "UniqueName": "Swamp Landing"
},
{
  "Index": "Mine-SOLO",
  "UniqueName": "Curious Excavation"
},
{
  "Index": "SewersMaintenance-GROUP",
  "UniqueName": "Lurking Underneath"
},
{
  "Index": "2000",
  "UniqueName": "Bridgewatch"
},
{
  "Index": "PSG-0001",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0002",
  "UniqueName": "Cougar Den"
},
{
  "Index": "PSG-0003",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0004",
  "UniqueName": "Sabertooth Den"
},
{
  "Index": "PSG-0005",
  "UniqueName": "Swamp Burrow"
},
{
  "Index": "PSG-0006",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0007",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "PSG-0008",
  "UniqueName": "Cougar Den"
},
{
  "Index": "PSG-0009",
  "UniqueName": "Cougar Den"
},
{
  "Index": "PSG-0010",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0011",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "PSG-0012",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0013",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "PSG-0014",
  "UniqueName": "Swamp Burrow"
},
{
  "Index": "PSG-0015",
  "UniqueName": "Swamp Burrow"
},
{
  "Index": "PSG-0016",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "PSG-0017",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0018",
  "UniqueName": "Swamp Burrow"
},
{
  "Index": "PSG-0019",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0020",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0021",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0022",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0023",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0024",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0025",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0026",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0027",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "PSG-0028",
  "UniqueName": "Cougar Den"
},
{
  "Index": "PSG-0029",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "PSG-0030",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0031",
  "UniqueName": "Cougar Den"
},
{
  "Index": "PSG-0032",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0033",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0034",
  "UniqueName": "Sabertooth Den"
},
{
  "Index": "PSG-0035",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0036",
  "UniqueName": "Cougar Den"
},
{
  "Index": "PSG-0037",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0038",
  "UniqueName": "Swamp Burrow"
},
{
  "Index": "PSG-0039",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0040",
  "UniqueName": "Swamp Burrow"
},
{
  "Index": "PSG-0041",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "PSG-0042",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0043",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "PSG-0044",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0045",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0046",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "PSG-0047",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0049",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0050",
  "UniqueName": "Sabertooth Den"
},
{
  "Index": "PSG-0051",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0052",
  "UniqueName": "Swamp Burrow"
},
{
  "Index": "PSG-0053",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "PSG-0054",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "CenterCity-DNG-01",
  "UniqueName": "The Underway"
},
{
  "Index": "3003",
  "UniqueName": "Caerleon"
},
{
  "Index": "TUT-WINECELLAR#5",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "3245",
  "UniqueName": "Runnel Sink"
},
{
  "Index": "TUT-CASTLECELLAR#3",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "STUB-0702#1",
  "UniqueName": "Condemned Vault"
},
{
  "Index": "TUT-CASTLECELLAR#11",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "TUT-WINECELLAR#29",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "FOCUS-DNG-003-MAIN#6",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "TUT-CASTLECELLAR#2",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "TUT-WINECELLAR#4",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "FOCUS-DNG-001-MAIN#7",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#7",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#4",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "FOCUS-DNG-001-MAIN#1",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "TUT-WINECELLAR#19",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#20",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "FOCUS-DNG-003-MAIN#5",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "DNG-0502#7",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "FOCUS-DNG-002#2",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "DNG-0502#9",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "STUB-0302#27",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#28",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "FOCUS-DNG-005-MAIN#8",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "DNG-0402#39",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "DNG-0402#3",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0302#29",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#30",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "DNG-0402#20",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0302#31",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#32",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#33",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#34",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "FOCUS-DNG-005-MAIN#7",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "DNG-0402#21",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-002-MAIN#2",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "STUB-0502#2",
  "UniqueName": "Bonecrusher Sanctuary"
},
{
  "Index": "FOCUS-DNG-003-MAIN#1",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-002-SUB#4",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "STUB-0502#3",
  "UniqueName": "Bonecrusher Sanctuary"
},
{
  "Index": "FOCUS-DNG-003-MAIN#4",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "DNG-0402#15",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-001-SUB#12",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "STUB-0302#36",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "FOCUS-DNG-000#12",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "DNG-0402#17",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "DNG-0402#19",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0302#37",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#38",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "DNG-0402#18",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0302#39",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#40",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "DNG-0402#22",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0402#8",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "STUB-0302#41",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#42",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "FOCUS-DNG-001-SUB#5",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "DNG-0402#25",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-003-MAIN#2",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "STUB-0502#19",
  "UniqueName": "Bonecrusher Sanctuary"
},
{
  "Index": "DNG-0402#5",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-003-SUB#2",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "DNG-0502#16",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "DNG-0402#26",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "DNG-0402#27",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "DNG-0402#28",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-005-MAIN#9",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "DNG-0402#30",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "DNG-0402#14",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0402#23",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "STUB-0402#27",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "FOCUS-DNG-005-MAIN#5",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "DNG-0402#34",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0402#26",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "FOCUS-DNG-003-SUB#10",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "DNG-0602#11",
  "UniqueName": "Obsessive Oubliette"
},
{
  "Index": "FOCUS-DNG-002-SUB#3",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-003-MAIN#8",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "DNG-0602#13",
  "UniqueName": "Obsessive Oubliette"
},
{
  "Index": "STUB-0502#6",
  "UniqueName": "Bonecrusher Sanctuary"
},
{
  "Index": "STUB-0502#7",
  "UniqueName": "Bonecrusher Sanctuary"
},
{
  "Index": "DNG-0502#8",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "STUB-0402#1",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "FOCUS-DNG-000#14",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "STUB-0502#20",
  "UniqueName": "Bonecrusher Sanctuary"
},
{
  "Index": "STUB-0402#18",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "FOCUS-DNG-001-MAIN#12",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "DNG-0402#36",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "DNG-0402#2",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "DNG-0402#38",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0402#19",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "DNG-0402#41",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "DNG-0402#23",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-003-MAIN#7",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "STUB-0602#16",
  "UniqueName": "Obsessive Arena"
},
{
  "Index": "FOCUS-DNG-002-MAIN#4",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-003-MAIN#12",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#12",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "STUB-0602#6",
  "UniqueName": "Obsessive Arena"
},
{
  "Index": "DNG-0502#2",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "FOCUS-DNG-003-MAIN#3",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "STUB-0402#12",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "STUB-0402#17",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "FOCUS-DNG-001-MAIN#6",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#1",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "DNG-0602#20",
  "UniqueName": "Obsessive Oubliette"
},
{
  "Index": "DNG-0602#21",
  "UniqueName": "Obsessive Oubliette"
},
{
  "Index": "FOCUS-DNG-002-MAIN#3",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-003-MAIN#10",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "STUB-0602#1",
  "UniqueName": "Obsessive Arena"
},
{
  "Index": "STUB-0602",
  "UniqueName": "Obsessive Arena"
},
{
  "Index": "FOCUS-DNG-002-MAIN#1",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-001-MAIN#4",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "DNG-0702#2",
  "UniqueName": "Condemned Sepulcher"
},
{
  "Index": "DNG-0702#15",
  "UniqueName": "Condemned Sepulcher"
},
{
  "Index": "1007",
  "UniqueName": "Inis Mon"
},
{
  "Index": "FOCUS-DNG-005-MAIN#1",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "STUB-0602#14",
  "UniqueName": "Obsessive Arena"
},
{
  "Index": "FOCUS-DNG-001-SUB#1",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "FOCUS-DNG-001-MAIN#9",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "TUT-WINECELLAR#17",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "DNG-0602#28",
  "UniqueName": "Obsessive Oubliette"
},
{
  "Index": "FOCUS-DNG-002-SUB#2",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "DNG-0602#30",
  "UniqueName": "Obsessive Oubliette"
},
{
  "Index": "FOCUS-DNG-003-MAIN#11",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "STUB-0602#15",
  "UniqueName": "Obsessive Arena"
},
{
  "Index": "DNG-0502#34",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "DNG-0602#33",
  "UniqueName": "Obsessive Oubliette"
},
{
  "Index": "DNG-0602#34",
  "UniqueName": "Obsessive Oubliette"
},
{
  "Index": "PSG-0048",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "FOCUS-DNG-001-SUB#8",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "TUT-WINECELLAR#30",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#27",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#18",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#16",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-CASTLECELLAR#12",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "TUT-CASTLECELLAR#15",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "TUT-CASTLECELLAR#14",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "TUT-CASTLECELLAR#13",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "TUT-CASTLECELLAR#10",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "0003#2",
  "UniqueName": "Swamp Landing #3"
},
{
  "Index": "4005#1",
  "UniqueName": "Mountain Landing #2"
},
{
  "Index": "4005#2",
  "UniqueName": "Mountain Landing #3"
},
{
  "Index": "1005#1",
  "UniqueName": "Forest Landing #2"
},
{
  "Index": "1005#2",
  "UniqueName": "Forest Landing #3"
},
{
  "Index": "2001#1",
  "UniqueName": "Steppe Landing #2"
},
{
  "Index": "2001#2",
  "UniqueName": "Steppe Landing #3"
},
{
  "Index": "3000#1",
  "UniqueName": "Highland Landing #2"
},
{
  "Index": "3000#2",
  "UniqueName": "Highland Landing #3"
},
{
  "Index": "TUT-WINECELLAR#1",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#3",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#2",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#28",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "ThreeSisters",
  "UniqueName": "Three Sisters"
},
{
  "Index": "FistfulOfSilver",
  "UniqueName": "A Fistful of Silver"
},
{
  "Index": "DNG-0402#1",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "HELLGATE-0001",
  "UniqueName": "Lesser Hell"
},
{
  "Index": "HELLGATE-0002",
  "UniqueName": "Greater Hell"
},
{
  "Index": "HELLGATE-0003",
  "UniqueName": "Greater Hell"
},
{
  "Index": "STUB-0402#2",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "FOCUS-DNG-001-MAIN#10",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "DNG-0502#3",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "STUB-0402#10",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "STUB-0402#11",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "STUB-0302#3",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "FOCUS-DNG-001-MAIN#5",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "1246",
  "UniqueName": "Cedarcopse"
},
{
  "Index": "3249",
  "UniqueName": "Bellever Tor"
},
{
  "Index": "4249",
  "UniqueName": "Pen Uchaf"
},
{
  "Index": "STUB-0602#11",
  "UniqueName": "Obsessive Arena"
},
{
  "Index": "FOCUS-DNG-003-SUB#1",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "DNG-0402#37",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0402#20",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "2205",
  "UniqueName": "Shiftshadow Expanse"
},
{
  "Index": "FOCUS-DNG-002-MAIN#5",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#5",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-001-MAIN#8",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#9",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "FOCUS-DNG-000#1",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-000#2",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-000#3",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-003-SUB#3",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-000#4",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-000#5",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-000#6",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-000#7",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-000#8",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-000#10",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-000#11",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-003-SUB#4",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-003-SUB#5",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-003-SUB#6",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "1005-2",
  "UniqueName": "Forest Beachhead"
},
{
  "Index": "1005-2#1",
  "UniqueName": "Forest Beachhead"
},
{
  "Index": "1006#1",
  "UniqueName": "Forest Outpost"
},
{
  "Index": "2001-2",
  "UniqueName": "Steppe Beachhead"
},
{
  "Index": "2001-2#1",
  "UniqueName": "Steppe Beachhead #2"
},
{
  "Index": "2002#1",
  "UniqueName": "Steppe Outpost"
},
{
  "Index": "3000-2",
  "UniqueName": "Highland Beachhead"
},
{
  "Index": "3000-2#1",
  "UniqueName": "Highland Beachhead #2"
},
{
  "Index": "3002#1",
  "UniqueName": "Highland Outpost"
},
{
  "Index": "0003-2",
  "UniqueName": "Swamp Beachhead"
},
{
  "Index": "0003-2#1",
  "UniqueName": "Swamp Beachhead #2"
},
{
  "Index": "0004#1",
  "UniqueName": "Swamp Outpost"
},
{
  "Index": "4005-2",
  "UniqueName": "Mountain Beachhead"
},
{
  "Index": "4005-2#1",
  "UniqueName": "Mountain Beachhead #2"
},
{
  "Index": "TUT-CASTLECELLAR#26",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "TUT-CASTLECELLAR#27",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "TUT-CASTLECELLAR#25",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "TUT-WINECELLAR#50",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#51",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#48",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#49",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#47",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#31",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#32",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#33",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-CASTLECELLAR#21",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "TUT-CASTLECELLAR#20",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "TUT-CASTLECELLAR#19",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "TUT-WINECELLAR#35",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#36",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "TUT-WINECELLAR#34",
  "UniqueName": "Royal Wine Cellar"
},
{
  "Index": "3005",
  "UniqueName": "Caerleon Market"
},
{
  "Index": "3006",
  "UniqueName": "Bank of Caerleon"
},
{
  "Index": "0003-2#2",
  "UniqueName": "Swamp Beachhead #3"
},
{
  "Index": "1005-2#2",
  "UniqueName": "Forest Beachhead"
},
{
  "Index": "2001-2#2",
  "UniqueName": "Steppe Beachhead #3"
},
{
  "Index": "3000-2#2",
  "UniqueName": "Highland Beachhead #3"
},
{
  "Index": "4005-2#2",
  "UniqueName": "Mountain Beachhead #3"
},
{
  "Index": "EternalBattle",
  "UniqueName": "Eternal Battle"
},
{
  "Index": "SewersMaintenance-SOLO",
  "UniqueName": "Lurking Underneath"
},
{
  "Index": "ARENA-01",
  "UniqueName": "Arena1"
},
{
  "Index": "3011",
  "UniqueName": "Caerleon Realmgate"
},
{
  "Index": "ARENA-01#1",
  "UniqueName": "Arena2"
},
{
  "Index": "ARENA-STANDARD",
  "UniqueName": "The Arena"
},
{
  "Index": "RecruitmentOfTheDead-HRD",
  "UniqueName": "Preaching to the Dead"
},
{
  "Index": "0249",
  "UniqueName": "0249"
},
{
  "Index": "2246",
  "UniqueName": "2246"
},
{
  "Index": "0006",
  "UniqueName": "Bank of Thetford"
},
{
  "Index": "0007",
  "UniqueName": "Thetford Market"
},
{
  "Index": "1001",
  "UniqueName": "Bank of Lymhurst"
},
{
  "Index": "1002",
  "UniqueName": "Lymhurst Market"
},
{
  "Index": "2003",
  "UniqueName": "Bank of Bridgewatch"
},
{
  "Index": "2004",
  "UniqueName": "Bridgewatch Market"
},
{
  "Index": "3007",
  "UniqueName": "Bank of Martlock"
},
{
  "Index": "3008",
  "UniqueName": "Martlock Market"
},
{
  "Index": "4001",
  "UniqueName": "Bank of Fort Sterling"
},
{
  "Index": "4002",
  "UniqueName": "Fort Sterling Market"
},
{
  "Index": "EternalBattle-HRD",
  "UniqueName": "Eternal Battle"
},
{
  "Index": "FishyBusiness-HRD",
  "UniqueName": "Fishy Business"
},
{
  "Index": "LumberCamp-HRD",
  "UniqueName": "Lumber Lunacy"
},
{
  "Index": "MushroomCave-HRD",
  "UniqueName": "Mushroom Cave"
},
{
  "Index": "SewersMaintenance-HRD",
  "UniqueName": "Lurking Underneath"
},
{
  "Index": "StoneWars-HRD",
  "UniqueName": "Stone Wars"
},
{
  "Index": "ThreeSisters-HRD",
  "UniqueName": "Three Sisters"
},
{
  "Index": "FistfulOfSilver-HRD",
  "UniqueName": "A Fistful Of Silver"
},
{
  "Index": "FOCUS-DNG-005-MAIN",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "FOCUS-DNG-005-MAIN#2",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "FOCUS-DNG-005-MAIN#3",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "FOCUS-DNG-005-MAIN#4",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "LEGACY-KEEPER-01",
  "UniqueName": "LEGACY-KEEPER-01"
},
{
  "Index": "LEGACY-UNDEAD-01",
  "UniqueName": "LEGACY-UNDEAD-01"
},
{
  "Index": "LEGACY-UNDEAD-02",
  "UniqueName": "LEGACY-UNDEAD-02"
},
{
  "Index": "Torturer",
  "UniqueName": "In the Raven's Claws"
},
{
  "Index": "TUT-CASTLECELLAR#1",
  "UniqueName": "Forgotten Vaults"
},
{
  "Index": "Torturer-HRD",
  "UniqueName": "In the Raven's Claws"
},
{
  "Index": "HELLGATE-0004",
  "UniqueName": "Lesser Hell"
},
{
  "Index": "FOCUS-DNG-001-MAIN#2",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#2",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "ARENA-FarmLand",
  "UniqueName": "Farmland Skirmish"
},
{
  "Index": "ARENA-HomeTerritory",
  "UniqueName": "HomeTerritory Skirmish"
},
{
  "Index": "ARENA-Resources",
  "UniqueName": "Resource Skirmish"
},
{
  "Index": "9000",
  "UniqueName": "9000"
},
{
  "Index": "9001",
  "UniqueName": "9001"
},
{
  "Index": "9002",
  "UniqueName": "9002"
},
{
  "Index": "9003",
  "UniqueName": "9003"
},
{
  "Index": "FOCUS-DNG-001-MAIN#3",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#3",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "FOCUS-DNG-005-MAIN#6",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "FOCUS-DNG-001-SUB#6",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#10",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "FOCUS-DNG-001-MAIN#11",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#11",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "FOCUS-DNG-005-MAIN#10",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "FOCUS-DNG-002#1",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-000#13",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "DNG-0502#1",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "FOCUS-DNG-003-SUB#7",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "DNG-0602#1",
  "UniqueName": "Obsessive Oubliette"
},
{
  "Index": "FOCUS-DNG-003-SUB#8",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-003-MAIN#9",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#9",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-003-SUB#11",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "DNG-0602#2",
  "UniqueName": "Obsessive Oubliette"
},
{
  "Index": "FOCUS-DNG-000#15",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "DNG-0502#4",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "FOCUS-DNG-002#3",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "DNG-0402#4",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-002#4",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "ARENA-Resources1",
  "UniqueName": "Resource Skirmish"
},
{
  "Index": "ARENA-Resources2",
  "UniqueName": "Resource Skirmish 2"
},
{
  "Index": "9005",
  "UniqueName": "9005"
},
{
  "Index": "CrystalRealm",
  "UniqueName": "CrystalRealm"
},
{
  "Index": "1008",
  "UniqueName": "The Lighthouse"
},
{
  "Index": "1009",
  "UniqueName": "Forgotten Woods"
},
{
  "Index": "1010",
  "UniqueName": "Mountain Fort"
},
{
  "Index": "3010",
  "UniqueName": "Conquerors' Hall Lvl. 1"
},
{
  "Index": "1011",
  "UniqueName": "Cove"
},
{
  "Index": "0246",
  "UniqueName": "0246"
},
{
  "Index": "0247",
  "UniqueName": "0247"
},
{
  "Index": "0248",
  "UniqueName": "0248"
},
{
  "Index": "1247",
  "UniqueName": "1247"
},
{
  "Index": "1248",
  "UniqueName": "1248"
},
{
  "Index": "1249",
  "UniqueName": "1249"
},
{
  "Index": "2243",
  "UniqueName": "2243"
},
{
  "Index": "2244",
  "UniqueName": "2244"
},
{
  "Index": "2245",
  "UniqueName": "2245"
},
{
  "Index": "3250",
  "UniqueName": "3250"
},
{
  "Index": "3251",
  "UniqueName": "3251"
},
{
  "Index": "3252",
  "UniqueName": "3252"
},
{
  "Index": "4250",
  "UniqueName": "4250"
},
{
  "Index": "4251",
  "UniqueName": "4251"
},
{
  "Index": "4252",
  "UniqueName": "4252"
},
{
  "Index": "3012-HALL-02",
  "UniqueName": "Conquerors' Hall Lvl. 2"
},
{
  "Index": "DNG-0402",
  "UniqueName": "DNG-0402"
},
{
  "Index": "DNG-0502",
  "UniqueName": "DNG-0502"
},
{
  "Index": "DNG-0602",
  "UniqueName": "DNG-0602"
},
{
  "Index": "DNG-0702",
  "UniqueName": "DNG-0702"
},
{
  "Index": "DNG-0802",
  "UniqueName": "DNG-0802"
},
{
  "Index": "FOCUS-DNG-000",
  "UniqueName": "FOCUS-DNG-000"
},
{
  "Index": "FOCUS-DNG-001-MAIN",
  "UniqueName": "FOCUS-DNG-001-MAIN"
},
{
  "Index": "FOCUS-DNG-001-SUB",
  "UniqueName": "FOCUS-DNG-001-SUB"
},
{
  "Index": "FOCUS-DNG-001",
  "UniqueName": "FOCUS-DNG-001"
},
{
  "Index": "FOCUS-DNG-002-MAIN",
  "UniqueName": "FOCUS-DNG-002-MAIN"
},
{
  "Index": "FOCUS-DNG-002-SUB",
  "UniqueName": "FOCUS-DNG-002-SUB"
},
{
  "Index": "FOCUS-DNG-002",
  "UniqueName": "FOCUS-DNG-002"
},
{
  "Index": "FOCUS-DNG-003-MAIN",
  "UniqueName": "FOCUS-DNG-003-MAIN"
},
{
  "Index": "FOCUS-DNG-003-SUB",
  "UniqueName": "FOCUS-DNG-003-SUB"
},
{
  "Index": "FOCUS-DNG-004-MAIN",
  "UniqueName": "FOCUS-DNG-004-MAIN"
},
{
  "Index": "FOCUS-DNG-004-SUB",
  "UniqueName": "FOCUS-DNG-004-SUB"
},
{
  "Index": "STUB-0201",
  "UniqueName": "STUB-0201"
},
{
  "Index": "STUB-0203",
  "UniqueName": "STUB-0203"
},
{
  "Index": "STUB-0302",
  "UniqueName": "STUB-0302"
},
{
  "Index": "STUB-0402",
  "UniqueName": "STUB-0402"
},
{
  "Index": "STUB-0502",
  "UniqueName": "STUB-0502"
},
{
  "Index": "STUB-0702",
  "UniqueName": "STUB-0702"
},
{
  "Index": "STUB-0802",
  "UniqueName": "STUB-0802"
},
{
  "Index": "TUT-CASTLECELLAR",
  "UniqueName": "TUT-CASTLECELLAR"
},
{
  "Index": "TUT-WINECELLAR",
  "UniqueName": "TUT-WINECELLAR"
},
{
  "Index": "PSG-0015#1",
  "UniqueName": "Swamp Burrow"
},
{
  "Index": "STUB-0302#1",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#2",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "DNG-0402#6",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0402#3",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "PSG-0014#1",
  "UniqueName": "Swamp Burrow"
},
{
  "Index": "FOCUS-DNG-000#9",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-001-MAIN#13",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#13",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "DNG-0402#7",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "PSG-0016#1",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "FOCUS-DNG-001-MAIN#14",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#14",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "DNG-0402#8",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "PSG-0013#1",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "STUB-0302#4",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#5",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0402#4",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "STUB-0302#6",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#7",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "FOCUS-DNG-005-MAIN#11",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "DNG-0402#9",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-000#16",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "PSG-0011#1",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "STUB-0302#8",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#9",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0402#5",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "DNG-0402#10",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "PSG-0009#1",
  "UniqueName": "Cougar Den"
},
{
  "Index": "FOCUS-DNG-001-MAIN#15",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#15",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "DNG-0402#11",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-000#17",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "PSG-0008#1",
  "UniqueName": "Cougar Den"
},
{
  "Index": "STUB-0402#6",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "STUB-0402#7",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "PSG-0010#1",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0012#1",
  "UniqueName": "Rock Adit"
},
{
  "Index": "STUB-0402#9",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "DNG-0402#12",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-005-MAIN#12",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "DNG-0402#13",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "PSG-0019#1",
  "UniqueName": "Ore Adit"
},
{
  "Index": "DNG-0402#16",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0402#13",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "PSG-0017#1",
  "UniqueName": "Ore Adit"
},
{
  "Index": "FOCUS-DNG-000#18",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-005-MAIN#13",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "DNG-0402#24",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "PSG-0021#1",
  "UniqueName": "Ore Adit"
},
{
  "Index": "STUB-0302#10",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#11",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "PSG-0020#1",
  "UniqueName": "Ore Adit"
},
{
  "Index": "FOCUS-DNG-001-MAIN#16",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#16",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "DNG-0402#29",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-000#19",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-005-MAIN#14",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "DNG-0402#31",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0302#12",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#13",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "PSG-0018#1",
  "UniqueName": "Swamp Burrow"
},
{
  "Index": "STUB-0402#14",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "DNG-0402#32",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "STUB-0302#14",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#15",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "PSG-0029#1",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "FOCUS-DNG-005-MAIN#15",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "DNG-0402#33",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "PSG-0027#1",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "STUB-0302#16",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "STUB-0302#17",
  "UniqueName": "Deranged Shaft"
},
{
  "Index": "DNG-0402#35",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "DNG-0402#40",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "PSG-0031#1",
  "UniqueName": "Cougar Den"
},
{
  "Index": "DNG-0402#42",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "DNG-0402#43",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "DNG-0402#44",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "PSG-0028#1",
  "UniqueName": "Cougar Den"
},
{
  "Index": "DNG-0402#45",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-001-MAIN#17",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#17",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "FOCUS-DNG-000#20",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "PSG-0025#1",
  "UniqueName": "Rock Adit"
},
{
  "Index": "FOCUS-DNG-000#21",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "FOCUS-DNG-001-MAIN#18",
  "UniqueName": "Hallowed Crypt"
},
{
  "Index": "FOCUS-DNG-001-SUB#18",
  "UniqueName": "Hallowed Undercrypt"
},
{
  "Index": "DNG-0402#46",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "PSG-0023#1",
  "UniqueName": "Rock Adit"
},
{
  "Index": "STUB-0402#15",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "DNG-0402#47",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "PSG-0026#1",
  "UniqueName": "Ore Adit"
},
{
  "Index": "STUB-0402#16",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "PSG-0024#1",
  "UniqueName": "Ore Adit"
},
{
  "Index": "FOCUS-DNG-005-MAIN#16",
  "UniqueName": "Trinity Hall"
},
{
  "Index": "DNG-0402#48",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-000#22",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "PSG-0022#1",
  "UniqueName": "Ore Adit"
},
{
  "Index": "STUB-0402#21",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "STUB-0402#22",
  "UniqueName": "Cursed Tomb"
},
{
  "Index": "PSG-0043#1",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "PSG-0040#1",
  "UniqueName": "Swamp Burrow"
},
{
  "Index": "FOCUS-DNG-002#5",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "DNG-0502#5",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "PSG-0038#1",
  "UniqueName": "Swamp Burrow"
},
{
  "Index": "STUB-0502#1",
  "UniqueName": "Bonecrusher Sanctuary"
},
{
  "Index": "DNG-0502#6",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "DNG-0502#10",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "STUB-0502#4",
  "UniqueName": "Bonecrusher Sanctuary"
},
{
  "Index": "PSG-0041#1",
  "UniqueName": "Forest Burrow"
},
{
  "Index": "FOCUS-DNG-003-MAIN#13",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#13",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-000#23",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "DNG-0502#11",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "PSG-0039#1",
  "UniqueName": "Ore Adit"
},
{
  "Index": "PSG-0036#1",
  "UniqueName": "Cougar Den"
},
{
  "Index": "FOCUS-DNG-000#24",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "DNG-0402#49",
  "UniqueName": "Cursed Catacombs"
},
{
  "Index": "FOCUS-DNG-003-MAIN#14",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#14",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "PSG-0034#1",
  "UniqueName": "Sabertooth Den"
},
{
  "Index": "STUB-0502#5",
  "UniqueName": "Bonecrusher Sanctuary"
},
{
  "Index": "DNG-0502#12",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "PSG-0033#1",
  "UniqueName": "Rock Adit"
},
{
  "Index": "PSG-0035#1",
  "UniqueName": "Rock Adit"
},
{
  "Index": "STUB-0502#8",
  "UniqueName": "Bonecrusher Sanctuary"
},
{
  "Index": "PSG-0032#1",
  "UniqueName": "Rock Adit"
},
{
  "Index": "DNG-0502#13",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "FOCUS-DNG-002#6",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-003-MAIN#15",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#15",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-000#25",
  "UniqueName": "Deepwood Enclave"
},
{
  "Index": "DNG-0502#14",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "PSG-0030#1",
  "UniqueName": "Rock Adit"
},
{
  "Index": "STUB-0502#9",
  "UniqueName": "Bonecrusher Sanctuary"
},
{
  "Index": "STUB-0502#10",
  "UniqueName": "Bonecrusher Sanctuary"
},
{
  "Index": "DNG-0502#15",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "PSG-0037#1",
  "UniqueName": "Ore Adit"
},
{
  "Index": "FOCUS-DNG-003-MAIN#16",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#16",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-002#7",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "DNG-0502#17",
  "UniqueName": "Bonecrusher Refuge"
},
{
  "Index": "3013-Auction2",
  "UniqueName": "Caerleon Market"
},
{
  "Index": "ARENA-City",
  "UniqueName": "ARENA-City"
},
{
  "Index": "HIDEOUT-0001a",
  "UniqueName": "HIDEOUT"
},
{
  "Index": "Halloween-01",
  "UniqueName": "Death Race 1"
},
{
  "Index": "HALLOWEEN-UNDEAD-01",
  "UniqueName": "HALLOWEEN-UNDEAD-01"
},
{
  "Index": "Halloween-01#1",
  "UniqueName": "Death Race 2"
},
{
  "Index": "Halloween-01#2",
  "UniqueName": "Death Race 3"
},
{
  "Index": "Halloween-01#3",
  "UniqueName": "Death Race 4"
},
{
  "Index": "Halloween-01#4",
  "UniqueName": "Death Race Finals"
},
{
  "Index": "HALLOWEEN-UNDEAD-01#1",
  "UniqueName": "Hidden Keep"
},
{
  "Index": "HIDEOUT-0001b",
  "UniqueName": "HIDEOUT"
},
{
  "Index": "HIDEOUT-0001c",
  "UniqueName": "HIDEOUT"
},
{
  "Index": "2305",
  "UniqueName": "Northstrand Dunes"
},
{
  "Index": "2326",
  "UniqueName": "Northstrand Beach"
},
{
  "Index": "0324",
  "UniqueName": "Scuttlesink Mouth"
},
{
  "Index": "1306",
  "UniqueName": "Deepwood Dell"
},
{
  "Index": "4302",
  "UniqueName": "Whitebank Portal North"
},
{
  "Index": "4303",
  "UniqueName": "Whitebank Portal South"
},
{
  "Index": "4304",
  "UniqueName": "Whitebank Portal East"
},
{
  "Index": "4308",
  "UniqueName": "Whitebank Stream"
},
{
  "Index": "4309",
  "UniqueName": "Whitebank Shore"
},
{
  "Index": "4311",
  "UniqueName": "Whitebank Cross"
},
{
  "Index": "4326",
  "UniqueName": "Whitebank Wall"
},
{
  "Index": "FOCUS-DNG-001#1",
  "UniqueName": "FOCUS-DNG-001#1"
},
{
  "Index": "FOCUS-DNG-002#8",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "0307",
  "UniqueName": "Meltwater Bog"
},
{
  "Index": "4305",
  "UniqueName": "Whitebank Descent"
},
{
  "Index": "4338",
  "UniqueName": "Whitebank Ridge"
},
{
  "Index": "FOCUS-DNG-002#9",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002-MAIN#6",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#6",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "1326",
  "UniqueName": "Timberslope Dell"
},
{
  "Index": "1340",
  "UniqueName": "Deepwood Pines"
},
{
  "Index": "4306",
  "UniqueName": "Frostpeak Vista"
},
{
  "Index": "4324",
  "UniqueName": "Frostpeak Ascent"
},
{
  "Index": "4327",
  "UniqueName": "Floatshoal Fissure"
},
{
  "Index": "4339",
  "UniqueName": "Floatshoal Bight"
},
{
  "Index": "PSG-0039#2",
  "UniqueName": "Darkseep Core"
},
{
  "Index": "FOCUS-DNG-003-MAIN#17",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#17",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "0325",
  "UniqueName": "Meltwater Delta"
},
{
  "Index": "0338",
  "UniqueName": "Meltwater Sump"
},
{
  "Index": "2307",
  "UniqueName": "Skysand Plateau"
},
{
  "Index": "4307",
  "UniqueName": "Everwinter Crossing"
},
{
  "Index": "4323",
  "UniqueName": "Everwinter Plain"
},
{
  "Index": "4325",
  "UniqueName": "Everwinter Gorge"
},
{
  "Index": "0353",
  "UniqueName": "Scuttlesink Marsh"
},
{
  "Index": "1305",
  "UniqueName": "Brambleshore Hinterlands"
},
{
  "Index": "3338",
  "UniqueName": "Shaleheath Steep"
},
{
  "Index": "4321",
  "UniqueName": "Everwinter Reach"
},
{
  "Index": "4322",
  "UniqueName": "Everwinter Peak"
},
{
  "Index": "4337",
  "UniqueName": "Everwinter Passage"
},
{
  "Index": "4340",
  "UniqueName": "Everwinter Expanse"
},
{
  "Index": "4353",
  "UniqueName": "Everwinter Incline"
},
{
  "Index": "PSG-0042#1",
  "UniqueName": "Stoneslip Passage"
},
{
  "Index": "PSG-0049#1",
  "UniqueName": "Whitecap Cave"
},
{
  "Index": "FOCUS-DNG-003-MAIN#18",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#18",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-002-MAIN#7",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#7",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-004-MAIN#1",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-004-SUB#1",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "0306",
  "UniqueName": "Scuttlesink Pools"
},
{
  "Index": "1325",
  "UniqueName": "Timbertop Dale"
},
{
  "Index": "1338",
  "UniqueName": "Timbertop Wood"
},
{
  "Index": "1353",
  "UniqueName": "Timbertop Escarp"
},
{
  "Index": "3326",
  "UniqueName": "Shaleheath Hills"
},
{
  "Index": "4310",
  "UniqueName": "Everwinter Shores"
},
{
  "Index": "FOCUS-DNG-002-MAIN#8",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#8",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "0305",
  "UniqueName": "Wetgrave Bog"
},
{
  "Index": "0339",
  "UniqueName": "Wetgrave Swale"
},
{
  "Index": "0342",
  "UniqueName": "Wetgrave Marsh"
},
{
  "Index": "1339",
  "UniqueName": "Timberslope Grove"
},
{
  "Index": "1354",
  "UniqueName": "Timberslope Bridge"
},
{
  "Index": "2306",
  "UniqueName": "Swiftsands Plain"
},
{
  "Index": "2308",
  "UniqueName": "Drybasin Riverbed"
},
{
  "Index": "2339",
  "UniqueName": "Swiftsands Basin"
},
{
  "Index": "2354",
  "UniqueName": "Swiftsands Chaparral"
},
{
  "Index": "3327",
  "UniqueName": "Skylake Bridge"
},
{
  "Index": "1355",
  "UniqueName": "Greenshore Bay"
},
{
  "Index": "3305",
  "UniqueName": "Flatrock Cliffs"
},
{
  "Index": "FOCUS-DNG-002-MAIN#9",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#9",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-004-MAIN#2",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-004-SUB#2",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-002-MAIN#10",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#10",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "0315",
  "UniqueName": "Skullmarsh Lower"
},
{
  "Index": "0343",
  "UniqueName": "Skullmarsh Upper"
},
{
  "Index": "1307",
  "UniqueName": "Greenshore Peninsula"
},
{
  "Index": "1308",
  "UniqueName": "Giantweald Dale"
},
{
  "Index": "1311",
  "UniqueName": "Watchwood Precipice"
},
{
  "Index": "1315",
  "UniqueName": "Watchwood Grove"
},
{
  "Index": "1328",
  "UniqueName": "Giantweald Woods"
},
{
  "Index": "1329",
  "UniqueName": "Watchwood Lakeside"
},
{
  "Index": "1330",
  "UniqueName": "Watchwood Bluffs"
},
{
  "Index": "1341",
  "UniqueName": "Giantweald Edge"
},
{
  "Index": "2309",
  "UniqueName": "Slakesands Canyon"
},
{
  "Index": "2341",
  "UniqueName": "Drybasin Oasis"
},
{
  "Index": "2342",
  "UniqueName": "Slakesands Mesa"
},
{
  "Index": "3328",
  "UniqueName": "Flatrock Plateau"
},
{
  "Index": "4315",
  "UniqueName": "Munten Rise"
},
{
  "Index": "4331",
  "UniqueName": "Munten Tundra"
},
{
  "Index": "4345",
  "UniqueName": "Munten Fell"
},
{
  "Index": "FOCUS-DNG-002-MAIN#11",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#11",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-002#10",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002#11",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "1302",
  "UniqueName": "Hightree Portal East"
},
{
  "Index": "1303",
  "UniqueName": "Hightree Portal North"
},
{
  "Index": "1304",
  "UniqueName": "Hightree Portal West"
},
{
  "Index": "1313",
  "UniqueName": "Hightree Steep"
},
{
  "Index": "1316",
  "UniqueName": "Hightree Lake"
},
{
  "Index": "1317",
  "UniqueName": "Hightree Dale"
},
{
  "Index": "1319",
  "UniqueName": "Hightree Strand"
},
{
  "Index": "1320",
  "UniqueName": "Hightree Glade"
},
{
  "Index": "1322",
  "UniqueName": "Hightree Enclave"
},
{
  "Index": "1332",
  "UniqueName": "Hightree Pass"
},
{
  "Index": "1335",
  "UniqueName": "Hightree Levee"
},
{
  "Index": "1336",
  "UniqueName": "Hightree Cliffs"
},
{
  "Index": "1345",
  "UniqueName": "Hightree Isle"
},
{
  "Index": "1347",
  "UniqueName": "Hightree Hillock"
},
{
  "Index": "4332",
  "UniqueName": "Glacierbreak Summit"
},
{
  "Index": "FOCUS-DNG-003-MAIN#19",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#19",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-002#12",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002#13",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "0302",
  "UniqueName": "Widemoor Portal North"
},
{
  "Index": "0303",
  "UniqueName": "Widemoor Portal South"
},
{
  "Index": "0304",
  "UniqueName": "Widemoor Portal West"
},
{
  "Index": "0308",
  "UniqueName": "Drownfield Course"
},
{
  "Index": "0309",
  "UniqueName": "Widemoor Shore"
},
{
  "Index": "0312",
  "UniqueName": "Widemoor Pool"
},
{
  "Index": "0314",
  "UniqueName": "Willowshade Wetlands"
},
{
  "Index": "0316",
  "UniqueName": "Widemoor Estuary"
},
{
  "Index": "0327",
  "UniqueName": "Widemoor Hills"
},
{
  "Index": "0328",
  "UniqueName": "Drownfield Wetland"
},
{
  "Index": "0330",
  "UniqueName": "Widemoor End"
},
{
  "Index": "0331",
  "UniqueName": "Willowshade Pools"
},
{
  "Index": "0333",
  "UniqueName": "Widemoor Woods"
},
{
  "Index": "0344",
  "UniqueName": "Willowshade Hills"
},
{
  "Index": "1309",
  "UniqueName": "Timberscar Dell"
},
{
  "Index": "1342",
  "UniqueName": "Timberscar Copse"
},
{
  "Index": "2327",
  "UniqueName": "Drytop Riverbed"
},
{
  "Index": "2328",
  "UniqueName": "Drytop Pillars"
},
{
  "Index": "FOCUS-DNG-002#14",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002-MAIN#12",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#12",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-002#15",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "PSG-0044#1",
  "UniqueName": "Stalagmite Adit"
},
{
  "Index": "0310",
  "UniqueName": "Drownfield Mire"
},
{
  "Index": "0313",
  "UniqueName": "Drownfield Fen"
},
{
  "Index": "0329",
  "UniqueName": "Drownfield Slough"
},
{
  "Index": "0332",
  "UniqueName": "Drownfield Rut"
},
{
  "Index": "0340",
  "UniqueName": "Drownfield Quag"
},
{
  "Index": "0354",
  "UniqueName": "Meltwater Channel"
},
{
  "Index": "0355",
  "UniqueName": "Drownfield Sink"
},
{
  "Index": "1312",
  "UniqueName": "Deadpine Forest"
},
{
  "Index": "2340",
  "UniqueName": "Skysand Ridge"
},
{
  "Index": "2355",
  "UniqueName": "Citadel of Ash "
},
{
  "Index": "4312",
  "UniqueName": "Glacierfall Passage"
},
{
  "Index": "4317",
  "UniqueName": "Whitepeak Ascent"
},
{
  "Index": "4329",
  "UniqueName": "Glacierfall Canyon"
},
{
  "Index": "4341",
  "UniqueName": "Everwinter Gap"
},
{
  "Index": "4343",
  "UniqueName": "Glacierfall Cross"
},
{
  "Index": "4344",
  "UniqueName": "Glacierfall Valley"
},
{
  "Index": "4348",
  "UniqueName": "Whitepeak Spring"
},
{
  "Index": "4355",
  "UniqueName": "Glacierfall Pass"
},
{
  "Index": "4357",
  "UniqueName": "Whitepeak Tundra"
},
{
  "Index": "FOCUS-DNG-003-MAIN#20",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#20",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-004-MAIN#3",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-004-SUB#3",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-002-MAIN#13",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-MAIN#14",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-MAIN#15",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#13",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#14",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#15",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "0321",
  "UniqueName": "Springsump Basin"
},
{
  "Index": "0335",
  "UniqueName": "Springsump Wetland"
},
{
  "Index": "0351",
  "UniqueName": "Springsump Melt"
},
{
  "Index": "1314",
  "UniqueName": "Southgrove Escarp"
},
{
  "Index": "1337",
  "UniqueName": "Southgrove Copse"
},
{
  "Index": "1350",
  "UniqueName": "Southgrove Thicket"
},
{
  "Index": "2315",
  "UniqueName": "Dryvein Cross"
},
{
  "Index": "2316",
  "UniqueName": "Sunstrand Shoal"
},
{
  "Index": "2317",
  "UniqueName": "Sunstrand Delta"
},
{
  "Index": "2319",
  "UniqueName": "Dryvein Plain"
},
{
  "Index": "2320",
  "UniqueName": "Farshore Esker"
},
{
  "Index": "2334",
  "UniqueName": "Dryvein Oasis"
},
{
  "Index": "2335",
  "UniqueName": "Sunstrand Dunes"
},
{
  "Index": "2336",
  "UniqueName": "Farshore Heath"
},
{
  "Index": "2348",
  "UniqueName": "Sunstrand Quicksands"
},
{
  "Index": "3317",
  "UniqueName": "Battlebrae Peaks"
},
{
  "Index": "3325",
  "UniqueName": "Stonelake Fields"
},
{
  "Index": "3336",
  "UniqueName": "Stonelake Hillock"
},
{
  "Index": "3358",
  "UniqueName": "Stonemouth Southbluff"
},
{
  "Index": "4336",
  "UniqueName": "Frostspring Passage"
},
{
  "Index": "4351",
  "UniqueName": "Frostspring Vulcano"
},
{
  "Index": "4352",
  "UniqueName": "Whitewall Ridge"
},
{
  "Index": "4359",
  "UniqueName": "Whitewall Pass"
},
{
  "Index": "0311",
  "UniqueName": "Runnelvein Slough"
},
{
  "Index": "0326",
  "UniqueName": "Runnelvein Bog"
},
{
  "Index": "0341",
  "UniqueName": "Runnelvein Sink"
},
{
  "Index": "1310",
  "UniqueName": "Giantweald Copse"
},
{
  "Index": "1327",
  "UniqueName": "Deepwood Gorge"
},
{
  "Index": "1331",
  "UniqueName": "Giantweald Roots"
},
{
  "Index": "1343",
  "UniqueName": "Deepwood Copse"
},
{
  "Index": "1344",
  "UniqueName": "Giantweald Glade"
},
{
  "Index": "1356",
  "UniqueName": "Eye of the Forest "
},
{
  "Index": "1357",
  "UniqueName": "Eldersleep "
},
{
  "Index": "3339",
  "UniqueName": "Skylake Hinterlands"
},
{
  "Index": "3353",
  "UniqueName": "Thunderrock Draw"
},
{
  "Index": "4313",
  "UniqueName": "Floatshoal Floe"
},
{
  "Index": "4318",
  "UniqueName": "Iceburn Firth"
},
{
  "Index": "4319",
  "UniqueName": "Flammog Fork"
},
{
  "Index": "4328",
  "UniqueName": "Iceburn Peaks"
},
{
  "Index": "4330",
  "UniqueName": "Flammog Valley"
},
{
  "Index": "4342",
  "UniqueName": "Iceburn Cliffs"
},
{
  "Index": "4346",
  "UniqueName": "Iceburn Tundra"
},
{
  "Index": "4354",
  "UniqueName": "Flammog Desolation"
},
{
  "Index": "4356",
  "UniqueName": "Glacierfall Fissure"
},
{
  "Index": "PSG-0053#1",
  "UniqueName": "Driprock Tunnel"
},
{
  "Index": "PSG-0051#1",
  "UniqueName": "Shale Underway"
},
{
  "Index": "PSG-0042#2",
  "UniqueName": "Darkstone Drift"
},
{
  "Index": "FOCUS-DNG-002-MAIN#16",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-MAIN#17",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-MAIN#18",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#16",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#17",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#18",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-004-MAIN#4",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-004-SUB#4",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "PSG-0052#1",
  "UniqueName": "Smuggler's Rut"
},
{
  "Index": "PSG-0038#2",
  "UniqueName": "Crosscut Skip"
},
{
  "Index": "PSG-0054#2",
  "UniqueName": "Gleamstone Deep"
},
{
  "Index": "0317",
  "UniqueName": "Widemoor Delta"
},
{
  "Index": "0318",
  "UniqueName": "Willowshade Mire"
},
{
  "Index": "0319",
  "UniqueName": "Willowshade Lake"
},
{
  "Index": "0320",
  "UniqueName": "Willowshade Icemarsh"
},
{
  "Index": "0334",
  "UniqueName": "Widemoor Flats"
},
{
  "Index": "0345",
  "UniqueName": "Willowshade Sink"
},
{
  "Index": "0348",
  "UniqueName": "Widemoor Fen"
},
{
  "Index": "0350",
  "UniqueName": "Twinchannel Narrows"
},
{
  "Index": "0357",
  "UniqueName": "Unhallowed Cloister "
},
{
  "Index": "1323",
  "UniqueName": "Westweald Thicket"
},
{
  "Index": "1334",
  "UniqueName": "Driftwood Glen"
},
{
  "Index": "1351",
  "UniqueName": "Westweald Shore"
},
{
  "Index": "2302",
  "UniqueName": "Sandrift Portal West"
},
{
  "Index": "2303",
  "UniqueName": "Sandrift Portal North"
},
{
  "Index": "2304",
  "UniqueName": "Sandrift Portal East"
},
{
  "Index": "2312",
  "UniqueName": "Sandmount Strand"
},
{
  "Index": "2314",
  "UniqueName": "Bleachskull Steppe"
},
{
  "Index": "2318",
  "UniqueName": "Sandmount Esker"
},
{
  "Index": "2321",
  "UniqueName": "Sandrift Steppe"
},
{
  "Index": "2322",
  "UniqueName": "Sandrift Prairie"
},
{
  "Index": "2323",
  "UniqueName": "Sandrift Coast"
},
{
  "Index": "2324",
  "UniqueName": "Sandrift Shore"
},
{
  "Index": "2325",
  "UniqueName": "Farshore Bay"
},
{
  "Index": "2333",
  "UniqueName": "Bleachskull Desert"
},
{
  "Index": "2337",
  "UniqueName": "Sandrift Expanse"
},
{
  "Index": "2338",
  "UniqueName": "Farshore Lagoon"
},
{
  "Index": "2349",
  "UniqueName": "Sandmount Desert"
},
{
  "Index": "2350",
  "UniqueName": "Sandrift Dunes"
},
{
  "Index": "2351",
  "UniqueName": "Farshore Drylands"
},
{
  "Index": "2352",
  "UniqueName": "Sandrift Fringe"
},
{
  "Index": "2353",
  "UniqueName": "Farshore Cape"
},
{
  "Index": "2358",
  "UniqueName": "Sandmount Ascent"
},
{
  "Index": "3302",
  "UniqueName": "Windgrass Portal West"
},
{
  "Index": "3303",
  "UniqueName": "Windgrass Portal North"
},
{
  "Index": "3304",
  "UniqueName": "Windgrass Portal South"
},
{
  "Index": "3309",
  "UniqueName": "Braemore Upland"
},
{
  "Index": "3318",
  "UniqueName": "Windgrass Border"
},
{
  "Index": "3320",
  "UniqueName": "Windgrass Gully"
},
{
  "Index": "3321",
  "UniqueName": "Windgrass Rill"
},
{
  "Index": "3322",
  "UniqueName": "Windgrass Precipice"
},
{
  "Index": "3331",
  "UniqueName": "Braemore Lowland"
},
{
  "Index": "3333",
  "UniqueName": "Windgrass Fields"
},
{
  "Index": "3334",
  "UniqueName": "Windgrass Coast"
},
{
  "Index": "3346",
  "UniqueName": "Highstone Mound"
},
{
  "Index": "4314",
  "UniqueName": "Avalanche Ravine"
},
{
  "Index": "4316",
  "UniqueName": "Frostbite Chasm"
},
{
  "Index": "4320",
  "UniqueName": "Frostseep Ravine"
},
{
  "Index": "4335",
  "UniqueName": "Frostbite Mountain"
},
{
  "Index": "4347",
  "UniqueName": "Frostseep Crevasse"
},
{
  "Index": "0322",
  "UniqueName": "Longfen Marsh"
},
{
  "Index": "0323",
  "UniqueName": "Mudfoot Sump"
},
{
  "Index": "0337",
  "UniqueName": "Mudfoot Mounds"
},
{
  "Index": "0352",
  "UniqueName": "Longfen Veins"
},
{
  "Index": "0359",
  "UniqueName": "Deathreach Priory "
},
{
  "Index": "1324",
  "UniqueName": "Greenhollow Vale"
},
{
  "Index": "1352",
  "UniqueName": "Greenhollow Copse"
},
{
  "Index": "3315",
  "UniqueName": "Highstone Plains"
},
{
  "Index": "3316",
  "UniqueName": "Battlebrae Flatland"
},
{
  "Index": "3319",
  "UniqueName": "Highstone Grassland"
},
{
  "Index": "3323",
  "UniqueName": "Gravemound Brim"
},
{
  "Index": "3324",
  "UniqueName": "Gravemound Hills"
},
{
  "Index": "3337",
  "UniqueName": "Gravemound Slope"
},
{
  "Index": "3349",
  "UniqueName": "Battlebrae Meadow"
},
{
  "Index": "3350",
  "UniqueName": "Windgrass Terrace"
},
{
  "Index": "3351",
  "UniqueName": "Gravemound Knoll"
},
{
  "Index": "3352",
  "UniqueName": "Gravemound Cliffs"
},
{
  "Index": "3357",
  "UniqueName": "Highstone Loch"
},
{
  "Index": "3359",
  "UniqueName": "Redtree Enclave"
},
{
  "Index": "FOCUS-DNG-002#16",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002#17",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002#18",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002#19",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002#20",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002#21",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002#22",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-003-MAIN#21",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#21",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-004-MAIN#5",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-004-SUB#5",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-004-MAIN#6",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-004-SUB#7",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-002#23",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002-MAIN#19",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#19",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#20",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-002-MAIN#20",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-003-MAIN#22",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#22",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "PSG-0052#2",
  "UniqueName": "Deathcap Channel"
},
{
  "Index": "PSG-0052#3",
  "UniqueName": "Glowmire Grotto"
},
{
  "Index": "PSG-0051#2",
  "UniqueName": "Lurkers' Hollow"
},
{
  "Index": "FOCUS-DNG-002#24",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002#25",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002#26",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-002-MAIN#21",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#21",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-004-MAIN#7",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-004-SUB#6",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-003-SUB#23",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-003-MAIN#23",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "PSG-0050#1",
  "UniqueName": "Middlemurk Path"
},
{
  "Index": "PSG-0048#1",
  "UniqueName": "Craglight Cavern"
},
{
  "Index": "FOCUS-DNG-003-MAIN#24",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#24",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-003-MAIN#25",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-003-SUB#25",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "0346",
  "UniqueName": "Deathwisp Sink"
},
{
  "Index": "0347",
  "UniqueName": "Deathwisp Bog"
},
{
  "Index": "0349",
  "UniqueName": "Sunkenbough Woods"
},
{
  "Index": "0356",
  "UniqueName": "Black Monastery "
},
{
  "Index": "0358",
  "UniqueName": "Sunkenbough Spring"
},
{
  "Index": "1318",
  "UniqueName": "Rivercopse Crossing"
},
{
  "Index": "1321",
  "UniqueName": "Driftwood Vale"
},
{
  "Index": "1333",
  "UniqueName": "Hightree Borderlands"
},
{
  "Index": "1346",
  "UniqueName": "Rivercopse Curve"
},
{
  "Index": "1348",
  "UniqueName": "Driftwood Hollow"
},
{
  "Index": "1349",
  "UniqueName": "Rivercopse Path"
},
{
  "Index": "1358",
  "UniqueName": "Darkbough Snag"
},
{
  "Index": "1359",
  "UniqueName": "Rivercopse Fount"
},
{
  "Index": "2310",
  "UniqueName": "Sunfang Ravine"
},
{
  "Index": "2330",
  "UniqueName": "Sunfang Approach"
},
{
  "Index": "2331",
  "UniqueName": "Parchsand Cliffs"
},
{
  "Index": "2343",
  "UniqueName": "Sunfang Cliffs"
},
{
  "Index": "2344",
  "UniqueName": "Sunfang Wasteland"
},
{
  "Index": "2356",
  "UniqueName": "Wailing Bulwark "
},
{
  "Index": "2357",
  "UniqueName": "Sunfang Dawn"
},
{
  "Index": "2359",
  "UniqueName": "Parchsand Drought"
},
{
  "Index": "3306",
  "UniqueName": "Murdergulch Cross"
},
{
  "Index": "3307",
  "UniqueName": "Murdergulch Gap"
},
{
  "Index": "3308",
  "UniqueName": "Razorrock Passage"
},
{
  "Index": "3310",
  "UniqueName": "Razorrock Valley"
},
{
  "Index": "3311",
  "UniqueName": "Highstone Meadow"
},
{
  "Index": "3312",
  "UniqueName": "Battlebrae Plain"
},
{
  "Index": "3313",
  "UniqueName": "Battlebrae Lake"
},
{
  "Index": "3314",
  "UniqueName": "Stonemouth Northbluff"
},
{
  "Index": "3329",
  "UniqueName": "Thunderrock Rapids"
},
{
  "Index": "3330",
  "UniqueName": "Razorrock Ravine"
},
{
  "Index": "3332",
  "UniqueName": "Razorrock Edge"
},
{
  "Index": "3335",
  "UniqueName": "Stonemouth Bay"
},
{
  "Index": "3340",
  "UniqueName": "Thunderrock Ascent"
},
{
  "Index": "3341",
  "UniqueName": "Thunderrock Upland"
},
{
  "Index": "3342",
  "UniqueName": "Murdergulch Trail"
},
{
  "Index": "3343",
  "UniqueName": "Razorrock Chasm"
},
{
  "Index": "3344",
  "UniqueName": "Razorrock Verge"
},
{
  "Index": "3345",
  "UniqueName": "Razorrock Bank"
},
{
  "Index": "3347",
  "UniqueName": "Highstone Plateau"
},
{
  "Index": "3348",
  "UniqueName": "Battlebrae Grassland"
},
{
  "Index": "3354",
  "UniqueName": "Murdergulch Divide"
},
{
  "Index": "3355",
  "UniqueName": "Murdergulch Ravine"
},
{
  "Index": "3356",
  "UniqueName": "Razorrock Gulch"
},
{
  "Index": "4333",
  "UniqueName": "Firesink Caldera"
},
{
  "Index": "4334",
  "UniqueName": "Whitecliff Peak"
},
{
  "Index": "4349",
  "UniqueName": "Firesink Trench"
},
{
  "Index": "4350",
  "UniqueName": "Whitecliff Expanse"
},
{
  "Index": "4358",
  "UniqueName": "Avalanche Incline"
},
{
  "Index": "FOCUS-DNG-004-MAIN#8",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-004-SUB#8",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-004-MAIN#9",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-004-MAIN#10",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-004-SUB#9",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-004-SUB#10",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-002-MAIN#22",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-MAIN#23",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-MAIN#24",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#22",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#23",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#24",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "PSG-0051#3",
  "UniqueName": "Bedrock Passage"
},
{
  "Index": "PSG-0048#2",
  "UniqueName": "Bloodrock Cave"
},
{
  "Index": "PSG-0051#4",
  "UniqueName": "Everglow Deep"
},
{
  "Index": "0336",
  "UniqueName": "Longfen Arms"
},
{
  "Index": "2311",
  "UniqueName": "Thirstwater Steppe"
},
{
  "Index": "2313",
  "UniqueName": "Dryvein Riverbed"
},
{
  "Index": "2329",
  "UniqueName": "Thirstwater Waste"
},
{
  "Index": "2332",
  "UniqueName": "Dryvein Steppe"
},
{
  "Index": "2345",
  "UniqueName": "Dryvein End"
},
{
  "Index": "2346",
  "UniqueName": "Thirstwater Gully"
},
{
  "Index": "2347",
  "UniqueName": "Dryvein Confluence"
},
{
  "Index": "2360",
  "UniqueName": "Daemonium Keep "
},
{
  "Index": "PSG-0004#1",
  "UniqueName": "Nightbloom Track"
},
{
  "Index": "FOCUS-DNG-002-SUB#25",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-002-MAIN#25",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#26",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "FOCUS-DNG-002-MAIN#26",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "PSG-0045#1",
  "UniqueName": "Mudrock Burrow"
},
{
  "Index": "PSG-0053#2",
  "UniqueName": "Deathcreep Adit"
},
{
  "Index": "FOCUS-DNG-002-MAIN#27",
  "UniqueName": "Exalted Crypt"
},
{
  "Index": "FOCUS-DNG-002-SUB#27",
  "UniqueName": "Exalted Undercrypt"
},
{
  "Index": "4300",
  "UniqueName": "Arthur's Rest "
},
{
  "Index": "FOCUS-DNG-004-SUB#11",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-003-SUB#27",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-003-MAIN#27",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "1253",
  "UniqueName": "1253"
},
{
  "Index": "9004",
  "UniqueName": "9004"
},
{
  "Index": "1012",
  "UniqueName": "Merlyn's Rest "
},
{
  "Index": "0360-HALL-01",
  "UniqueName": "Conquerors' Hall Lvl. 1"
},
{
  "Index": "0361-HALL-02",
  "UniqueName": "Conquerors' Hall Lvl. 2"
},
{
  "Index": "1013-HALL-01",
  "UniqueName": "Conquerors' Hall Lvl. 1"
},
{
  "Index": "1014-HALL-02",
  "UniqueName": "Conquerors' Hall Lvl. 2"
},
{
  "Index": "2010-HALL-01",
  "UniqueName": "Conquerors' Hall Lvl. 1"
},
{
  "Index": "2011-HALL-02",
  "UniqueName": "Conquerors' Hall Lvl. 2"
},
{
  "Index": "3014-HALL-01",
  "UniqueName": "Conquerors' Hall Lvl. 1"
},
{
  "Index": "3015-HALL-02",
  "UniqueName": "Conquerors' Hall Lvl. 2"
},
{
  "Index": "4007-HALL-01",
  "UniqueName": "Conquerors' Hall Lvl. 1"
},
{
  "Index": "4008-HALL-02",
  "UniqueName": "Conquerors' Hall Lvl. 2"
},
{
  "Index": "0008",
  "UniqueName": "Morgana's Rest "
},
{
  "Index": "4299",
  "UniqueName": "4299"
},
{
  "Index": "FOCUS-DNG-004-MAIN#11",
  "UniqueName": "Cathedral of Light"
},
{
  "Index": "FOCUS-DNG-002#27",
  "UniqueName": "Stoneroot Caverns"
},
{
  "Index": "FOCUS-DNG-004-SUB#12",
  "UniqueName": "Chambers of Truth"
},
{
  "Index": "FOCUS-DNG-004-MAIN#12",
  "UniqueName": "Cathedral of Ligh"
}
]
END;

}
