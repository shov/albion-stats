<?php

namespace App\Domain\Market\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 *
 * @property string $name
 * @property array $details
 */
class Item extends Model
{
    protected $table = 'items';
    protected $fillable = ['name', 'details'];

    public function tier() {
        return  $this->belongsTo(Tier::class);
    }

    public function enchantment() {
        return $this->belongsTo(Enchantment::class);
    }

    const PREFIX = [
        'QUEST_ITEM' => 'QUESTITEM',
    ];

    /**  @see https://github.com/broderickhyman/ao-bin-dumps/blob/master/formatted/items.txt */
    const KNOWN_ITEMS = <<<END
   0: UNIQUE_HIDEOUT                                                   : Hideout Construction Kit
   1: T1_FARM_CARROT_SEED                                              : Carrot Seeds
   2: T2_FARM_BEAN_SEED                                                : Bean Seeds
   3: T3_FARM_WHEAT_SEED                                               : Wheat Seeds
   4: T4_FARM_TURNIP_SEED                                              : Turnip Seeds
   5: T5_FARM_CABBAGE_SEED                                             : Cabbage Seeds
   6: T6_FARM_POTATO_SEED                                              : Potato Seeds
   7: T7_FARM_CORN_SEED                                                : Corn Seeds
   8: T8_FARM_PUMPKIN_SEED                                             : Pumpkin Seeds
   9: T2_FARM_AGARIC_SEED                                              : Arcane Agaric Seeds
  10: T3_FARM_COMFREY_SEED                                             : Brightleaf Comfrey Seeds
  11: T4_FARM_BURDOCK_SEED                                             : Crenellated Burdock Seeds
  12: T5_FARM_TEASEL_SEED                                              : Dragon Teasel Seeds
  13: T6_FARM_FOXGLOVE_SEED                                            : Elusive Foxglove Seeds
  14: T7_FARM_MULLEIN_SEED                                             : Firetouched Mullein Seeds
  15: T8_FARM_YARROW_SEED                                              : Ghoul Yarrow Seeds
  16: T3_FARM_OX_BABY                                                  : Journeyman's Ox Calf
  17: T4_FARM_OX_BABY                                                  : Adept's Ox Calf
  18: T5_FARM_OX_BABY                                                  : Expert's Ox Calf
  19: T6_FARM_OX_BABY                                                  : Master's Ox Calf
  20: T7_FARM_OX_BABY                                                  : Grandmaster's Ox Calf
  21: T8_FARM_OX_BABY                                                  : Elder's Ox Calf
  22: T3_FARM_OX_GROWN                                                 : Journeyman's Ox
  23: T4_FARM_OX_GROWN                                                 : Adept's Ox
  24: T5_FARM_OX_GROWN                                                 : Expert's Ox
  25: T6_FARM_OX_GROWN                                                 : Master's Ox
  26: T7_FARM_OX_GROWN                                                 : Grandmaster's Ox
  27: T8_FARM_OX_GROWN                                                 : Elder's Ox
  28: T3_FARM_HORSE_BABY                                               : Journeyman's Foal
  29: T4_FARM_HORSE_BABY                                               : Adept's Foal
  30: T5_FARM_HORSE_BABY                                               : Expert's Foal
  31: T6_FARM_HORSE_BABY                                               : Master's Foal
  32: T7_FARM_HORSE_BABY                                               : Grandmaster's Foal
  33: T8_FARM_HORSE_BABY                                               : Elder's Foal
  34: T3_FARM_HORSE_GROWN                                              : Journeyman's Horse
  35: T4_FARM_HORSE_GROWN                                              : Adept's Horse
  36: T5_FARM_HORSE_GROWN                                              : Expert's Horse
  37: T6_FARM_HORSE_GROWN                                              : Master's Horse
  38: T7_FARM_HORSE_GROWN                                              : Grandmaster's Horse
  39: T8_FARM_HORSE_GROWN                                              : Elder's Horse
  40: T6_FARM_DIREWOLF_BABY                                            : Direwolf Pup
  41: T7_FARM_DIREBOAR_BABY                                            : Direboar Piglet
  42: T8_FARM_DIREBEAR_BABY                                            : Direbear Cub
  43: T7_FARM_SWAMPDRAGON_BABY                                         : Swamp Dragon Pup
  44: T8_FARM_MAMMOTH_BABY                                             : Mammoth Calf
  45: T5_FARM_COUGAR_BABY                                              : Swiftclaw Cub
  46: T8_FARM_DIREWOLF_BABY                                            : Ghostwolf Pup
  47: T4_FARM_GIANTSTAG_BABY                                           : Adept's Fawn
  48: T6_FARM_GIANTSTAG_BABY                                           : Master's Fawn
  49: T5_FARM_MOABIRD_FW_BRIDGEWATCH_BABY                              : Baby Moabird
  50: T5_FARM_DIREBEAR_FW_FORTSTERLING_BABY                            : Winter Bear Cub
  51: T5_FARM_DIREBOAR_FW_LYMHURST_BABY                                : Wild Boarlet
  52: T5_FARM_RAM_FW_MARTLOCK_BABY                                     : Bighorn Ram Lamb
  53: T5_FARM_SWAMPDRAGON_FW_THETFORD_BABY                             : Baby Swamp Salamander
  54: T6_FARM_DIREWOLF_GROWN                                           : Tame Direwolf
  55: T7_FARM_DIREBOAR_GROWN                                           : Tame Direboar
  56: T8_FARM_DIREBEAR_GROWN                                           : Tame Direbear
  57: T7_FARM_SWAMPDRAGON_GROWN                                        : Tame Swamp Dragon
  58: T8_FARM_MAMMOTH_GROWN                                            : Tame Mammoth
  59: T5_FARM_COUGAR_GROWN                                             : Tame Swiftclaw
  60: T8_FARM_DIREWOLF_GROWN                                           : Tame Ghostwolf
  61: T4_FARM_GIANTSTAG_GROWN                                          : Adept's Tame Giant Stag
  62: T6_FARM_GIANTSTAG_GROWN                                          : Master's Tame Giant Stag
  63: T5_FARM_MOABIRD_FW_BRIDGEWATCH_GROWN                             : Tame Moabird
  64: T5_FARM_DIREBEAR_FW_FORTSTERLING_GROWN                           : Tame Winter Bear
  65: T5_FARM_DIREBOAR_FW_LYMHURST_GROWN                               : Tame Wild Boar
  66: T5_FARM_RAM_FW_MARTLOCK_GROWN                                    : Tame Bighorn Ram
  67: T5_FARM_SWAMPDRAGON_FW_THETFORD_GROWN                            : Tame Swamp Salamander
  68: T3_FARM_CHICKEN_BABY                                             : Baby Chickens
  69: T4_FARM_GOAT_BABY                                                : Kid
  70: T5_FARM_GOOSE_BABY                                               : Gosling
  71: T6_FARM_SHEEP_BABY                                               : Lamb
  72: T7_FARM_PIG_BABY                                                 : Piglet
  73: T8_FARM_COW_BABY                                                 : Calf
  74: T3_FARM_CHICKEN_GROWN                                            : Chicken
  75: T4_FARM_GOAT_GROWN                                               : Goat
  76: T5_FARM_GOOSE_GROWN                                              : Goose
  77: T6_FARM_SHEEP_GROWN                                              : Sheep
  78: T7_FARM_PIG_GROWN                                                : Pig
  79: T8_FARM_COW_GROWN                                                : Cow
  80: T6_MOUNTUPGRADE_GIANTSTAG_XMAS                                   : Decorative Stag Bridle
  81: UNIQUE_MOUNTUPGRADE_RAM_XMAS                                     : Decorative Ram Bridle
  82: T5_MOUNTUPGRADE_HORSE_CURSE                                      : Necromantic Elixir
  83: T8_MOUNTUPGRADE_HORSE_CURSE                                      : Spectral Mask
  84: T8_MOUNTUPGRADE_COUGAR_KEEPER                                    : Sacred Bone Marrow
  85: T5_MOUNTUPGRADE_HORSE_MORGANA                                    : Morgana Mare Saddle
  86: T8_MOUNTUPGRADE_HORSE_MORGANA                                    : Infernal Horseshoes
  87: T1_CARROT                                                        : Carrots
  88: T2_BEAN                                                          : Beans
  89: T3_WHEAT                                                         : Sheaf of Wheat
  90: T4_TURNIP                                                        : Turnips
  91: T5_CABBAGE                                                       : Cabbage
  92: T6_POTATO                                                        : Potatoes
  93: T7_CORN                                                          : Bundle of Corn
  94: T8_PUMPKIN                                                       : Pumpkin
  95: T2_AGARIC                                                        : Arcane Agaric
  96: T3_COMFREY                                                       : Brightleaf Comfrey
  97: T4_BURDOCK                                                       : Crenellated Burdock
  98: T5_TEASEL                                                        : Dragon Teasel
  99: T6_FOXGLOVE                                                      : Elusive Foxglove
 100: T7_MULLEIN                                                       : Firetouched Mullein
 101: T8_YARROW                                                        : Ghoul Yarrow
 102: T3_EGG                                                           : Hen Eggs
 103: T4_MILK                                                          : Goat's Milk
 104: T5_EGG                                                           : Goose Eggs
 105: T6_MILK                                                          : Sheep's Milk
 106: T8_MILK                                                          : Cow's Milk
 107: T1_FISH_FRESHWATER_ALL_COMMON                                    : Common Rudd
 108: T2_FISH_FRESHWATER_ALL_COMMON                                    : Striped Carp
 109: T3_FISH_FRESHWATER_ALL_COMMON                                    : Albion Perch
 110: T4_FISH_FRESHWATER_ALL_COMMON                                    : Bluescale Pike
 111: T5_FISH_FRESHWATER_ALL_COMMON                                    : Spotted Trout
 112: T6_FISH_FRESHWATER_ALL_COMMON                                    : Brightscale Zander
 113: T7_FISH_FRESHWATER_ALL_COMMON                                    : Danglemouth Catfish
 114: T8_FISH_FRESHWATER_ALL_COMMON                                    : River Sturgeon
 115: T1_FISH_SALTWATER_ALL_COMMON                                     : Common Herring
 116: T2_FISH_SALTWATER_ALL_COMMON                                     : Striped Mackerel
 117: T3_FISH_SALTWATER_ALL_COMMON                                     : Flatshore Plaice
 118: T4_FISH_SALTWATER_ALL_COMMON                                     : Bluescale Cod
 119: T5_FISH_SALTWATER_ALL_COMMON                                     : Spotted Wolffish
 120: T6_FISH_SALTWATER_ALL_COMMON                                     : Strongfin Salmon
 121: T7_FISH_SALTWATER_ALL_COMMON                                     : Bluefin Tuna
 122: T8_FISH_SALTWATER_ALL_COMMON                                     : Steelscale Swordfish
 123: T3_FISH_FRESHWATER_FOREST_RARE                                   : Greenriver Eel
 124: T5_FISH_FRESHWATER_FOREST_RARE                                   : Redspring Eel
 125: T7_FISH_FRESHWATER_FOREST_RARE                                   : Deadwater Eel
 126: T3_FISH_FRESHWATER_MOUNTAIN_RARE                                 : Upland Coldeye
 127: T5_FISH_FRESHWATER_MOUNTAIN_RARE                                 : Mountain Blindeye
 128: T7_FISH_FRESHWATER_MOUNTAIN_RARE                                 : Frostpeak Deadeye
 129: T3_FISH_FRESHWATER_HIGHLANDS_RARE                                : Stonestream Lurcher
 130: T5_FISH_FRESHWATER_HIGHLANDS_RARE                                : Rushwater Lurcher
 131: T7_FISH_FRESHWATER_HIGHLANDS_RARE                                : Thunderfall Lurcher
 132: T3_FISH_FRESHWATER_STEPPE_RARE                                   : Lowriver Crab
 133: T5_FISH_FRESHWATER_STEPPE_RARE                                   : Drybrook Crab
 134: T7_FISH_FRESHWATER_STEPPE_RARE                                   : Dusthole Crab
 135: T3_FISH_FRESHWATER_SWAMP_RARE                                    : Greenmoor Clam
 136: T5_FISH_FRESHWATER_SWAMP_RARE                                    : Murkwater Clam
 137: T7_FISH_FRESHWATER_SWAMP_RARE                                    : Blackbog Clam
 138: T3_FISH_SALTWATER_ALL_RARE                                       : Shallowshore Squid
 139: T5_FISH_SALTWATER_ALL_RARE                                       : Midwater Octopus
 140: T7_FISH_SALTWATER_ALL_RARE                                       : Deepwater Kraken
 141: T1_SEAWEED                                                       : Seaweed
 142: T8_FISH_SALTWATER_ALL_BOSS_SHARK                                 : Shark
 143: T1_FISHCHOPS                                                     : Chopped Fish
 144: T1_FISHSAUCE_LEVEL1                                              : Basic Fish Sauce
 145: T1_FISHSAUCE_LEVEL2                                              : Fancy Fish Sauce
 146: T1_FISHSAUCE_LEVEL3                                              : Special Fish Sauce
 147: TREASURE_KNOWLEDGE_RARITY1                                       : Corrupted Scroll
 148: TREASURE_KNOWLEDGE_RARITY2                                       : Thin Booklet
 149: TREASURE_KNOWLEDGE_RARITY3                                       : Ancient Tome
 150: TREASURE_SILVERWARE_RARITY1                                      : Silver Cup
 151: TREASURE_SILVERWARE_RARITY2                                      : Silver Mirror
 152: TREASURE_SILVERWARE_RARITY3                                      : Silver Candelabrum
 153: TREASURE_DECORATIVE_RARITY1                                      : Simple Stone Toy
 154: TREASURE_DECORATIVE_RARITY2                                      : Stone Mask
 155: TREASURE_DECORATIVE_RARITY3                                      : Stone Idol
 156: TREASURE_CEREMONIAL_RARITY1                                      : Ornamental Scepter
 157: TREASURE_CEREMONIAL_RARITY2                                      : Globus Cruciger
 158: TREASURE_CEREMONIAL_RARITY3                                      : Golden Crown
 159: TREASURE_TRIBAL_RARITY1                                          : Feather Talisman
 160: TREASURE_TRIBAL_RARITY2                                          : Dreamcatcher
 161: TREASURE_TRIBAL_RARITY3                                          : Holy Fetish
 162: TREASURE_RITUAL_RARITY1                                          : Ritual Candles
 163: TREASURE_RITUAL_RARITY2                                          : Blood Chalice
 164: TREASURE_RITUAL_RARITY3                                          : Sacrificial Dagger
 165: QUESTITEM_TUTORIAL_HERETIC_PLANS                                 
 166: QUESTITEM_TRANSFER_LETTER                                        : Letter of Transfer
 167: QUESTITEM_LIGHT_BLUEPRINTS                                       : Delivery: Blueprints
 168: QUESTITEM_LIGHT_MANUSCRIPTS                                      : Delivery: Artistic Manuscripts
 169: QUESTITEM_LIGHT_SURVEYS                                          : Delivery: Geomantic Surveys
 170: QUESTITEM_HEAVY_MORTAR                                           : Delivery: Mortar
 171: QUESTITEM_HEAVY_CRATE                                            : Delivery: Crates
 172: QUESTITEM_HEAVY_BARREL                                           : Delivery: Barrels
 173: QUESTITEM_LIGHT_FUR                                              : Delivery: Heavy Fur
 174: QUESTITEM_LIGHT_THEPACKAGE                                       : Delivery: "The Package"
 175: QUESTITEM_LIGHT_PATROLROUTE                                      : Delivery: Patrol Route
 176: QUESTITEM_HEAVY_MOONSHINE                                        : Delivery: Geoff the Brigand's All-Natural Enriched Moonshine
 177: QUESTITEM_LIGHT_KITTENS                                          : Delivery: Sack of Kittens
 178: QUESTITEM_LIGHT_BEES                                             : Delivery: Beehives
 179: QUESTITEM_LIGHT_OLDCLOTHES                                       : Delivery: Old Clothes
 180: QUESTITEM_HEAVY_FARMTOOLS                                        : Delivery: Farmyard Tools
 181: QUESTITEM_HEAVY_MANURE                                           : Delivery: Pile of Manure
 182: QUESTITEM_LIGHT_ASSASSINATION                                    : Delivery: Assassination Order
 183: QUESTITEM_LIGHT_CASUALTIES                                       : Delivery: Casualty Report
 184: QUESTITEM_LIGHT_RINGS                                            : Delivery: Regimental Rings
 185: QUESTITEM_HEAVY_MEDICAL                                          : Delivery: Medical Supplies
 186: QUESTITEM_HEAVY_FIREBARREL                                       : Delivery: Sensitive Barrels
 187: QUESTITEM_CARAVAN_TRADEPACK_SWAMP_LIGHT                          
 188: QUESTITEM_CARAVAN_TRADEPACK_SWAMP_MEDIUM                         
 189: QUESTITEM_CARAVAN_TRADEPACK_SWAMP_HEAVY                          
 190: QUESTITEM_CARAVAN_TRADEPACK_FOREST_LIGHT                         
 191: QUESTITEM_CARAVAN_TRADEPACK_FOREST_MEDIUM                        
 192: QUESTITEM_CARAVAN_TRADEPACK_FOREST_HEAVY                         
 193: QUESTITEM_CARAVAN_TRADEPACK_STEPPE_LIGHT                         
 194: QUESTITEM_CARAVAN_TRADEPACK_STEPPE_MEDIUM                        
 195: QUESTITEM_CARAVAN_TRADEPACK_STEPPE_HEAVY                         
 196: QUESTITEM_CARAVAN_TRADEPACK_HIGHLAND_LIGHT                       
 197: QUESTITEM_CARAVAN_TRADEPACK_HIGHLAND_MEDIUM                      
 198: QUESTITEM_CARAVAN_TRADEPACK_HIGHLAND_HEAVY                       
 199: QUESTITEM_CARAVAN_TRADEPACK_MOUNTAIN_LIGHT                       
 200: QUESTITEM_CARAVAN_TRADEPACK_MOUNTAIN_MEDIUM                      
 201: QUESTITEM_CARAVAN_TRADEPACK_MOUNTAIN_HEAVY                       
 202: QUESTITEM_TOKEN_ARENA_UNRANKED                                   : Arena Sigil
 203: QUESTITEM_TOKEN_AVALON                                           : Avalonian Energy
 204: QUESTITEM_EXP_TOKEN_D1_T6_EXP_HRD_WINTER_EVENT                   
 205: QUESTITEM_EXP_TOKEN_D1_T6_EXP_HRD_UNDEAD_RECRUITMENT             
 206: QUESTITEM_EXP_TOKEN_D2_T6_EXP_HRD_UNDEAD_RECRUITMENT             
 207: QUESTITEM_EXP_TOKEN_D3_T6_EXP_HRD_UNDEAD_RECRUITMENT             
 208: QUESTITEM_EXP_TOKEN_D4_T6_EXP_HRD_UNDEAD_RECRUITMENT             
 209: QUESTITEM_EXP_TOKEN_D5_T6_EXP_HRD_UNDEAD_RECRUITMENT             
 210: QUESTITEM_EXP_TOKEN_D6_T6_EXP_HRD_UNDEAD_RECRUITMENT             
 211: QUESTITEM_EXP_TOKEN_D7_T6_EXP_HRD_UNDEAD_RECRUITMENT             
 212: QUESTITEM_EXP_TOKEN_D8_T6_EXP_HRD_UNDEAD_RECRUITMENT             
 213: QUESTITEM_EXP_TOKEN_D9_T6_EXP_HRD_UNDEAD_RECRUITMENT             
 214: QUESTITEM_EXP_TOKEN_D10_T6_EXP_HRD_UNDEAD_RECRUITMENT            
 215: QUESTITEM_EXP_TOKEN_D11_T6_EXP_HRD_UNDEAD_RECRUITMENT            
 216: QUESTITEM_EXP_TOKEN_D12_T6_EXP_HRD_UNDEAD_RECRUITMENT            
 217: QUESTITEM_EXP_TOKEN_D13_T6_EXP_HRD_UNDEAD_RECRUITMENT            
 218: QUESTITEM_EXP_TOKEN_D14_T6_EXP_HRD_UNDEAD_RECRUITMENT            
 219: QUESTITEM_EXP_TOKEN_D15_T6_EXP_HRD_UNDEAD_RECRUITMENT            
 220: QUESTITEM_EXP_TOKEN_D1_T6_EXP_HRD_HERETIC_FISHYBUSINESS          
 221: QUESTITEM_EXP_TOKEN_D2_T6_EXP_HRD_HERETIC_FISHYBUSINESS          
 222: QUESTITEM_EXP_TOKEN_D3_T6_EXP_HRD_HERETIC_FISHYBUSINESS          
 223: QUESTITEM_EXP_TOKEN_D4_T6_EXP_HRD_HERETIC_FISHYBUSINESS          
 224: QUESTITEM_EXP_TOKEN_D5_T6_EXP_HRD_HERETIC_FISHYBUSINESS          
 225: QUESTITEM_EXP_TOKEN_D6_T6_EXP_HRD_HERETIC_FISHYBUSINESS          
 226: QUESTITEM_EXP_TOKEN_D7_T6_EXP_HRD_HERETIC_FISHYBUSINESS          
 227: QUESTITEM_EXP_TOKEN_D8_T6_EXP_HRD_HERETIC_FISHYBUSINESS          
 228: QUESTITEM_EXP_TOKEN_D9_T6_EXP_HRD_HERETIC_FISHYBUSINESS          
 229: QUESTITEM_EXP_TOKEN_D10_T6_EXP_HRD_HERETIC_FISHYBUSINESS         
 230: QUESTITEM_EXP_TOKEN_D11_T6_EXP_HRD_HERETIC_FISHYBUSINESS         
 231: QUESTITEM_EXP_TOKEN_D12_T6_EXP_HRD_HERETIC_FISHYBUSINESS         
 232: QUESTITEM_EXP_TOKEN_D13_T6_EXP_HRD_HERETIC_FISHYBUSINESS         
 233: QUESTITEM_EXP_TOKEN_D14_T6_EXP_HRD_HERETIC_FISHYBUSINESS         
 234: QUESTITEM_EXP_TOKEN_D15_T6_EXP_HRD_HERETIC_FISHYBUSINESS         
 235: QUESTITEM_EXP_TOKEN_D1_T6_EXP_HRD_KEEPER_STONEWARS               
 236: QUESTITEM_EXP_TOKEN_D2_T6_EXP_HRD_KEEPER_STONEWARS               
 237: QUESTITEM_EXP_TOKEN_D3_T6_EXP_HRD_KEEPER_STONEWARS               
 238: QUESTITEM_EXP_TOKEN_D4_T6_EXP_HRD_KEEPER_STONEWARS               
 239: QUESTITEM_EXP_TOKEN_D5_T6_EXP_HRD_KEEPER_STONEWARS               
 240: QUESTITEM_EXP_TOKEN_D6_T6_EXP_HRD_KEEPER_STONEWARS               
 241: QUESTITEM_EXP_TOKEN_D7_T6_EXP_HRD_KEEPER_STONEWARS               
 242: QUESTITEM_EXP_TOKEN_D8_T6_EXP_HRD_KEEPER_STONEWARS               
 243: QUESTITEM_EXP_TOKEN_D9_T6_EXP_HRD_KEEPER_STONEWARS               
 244: QUESTITEM_EXP_TOKEN_D10_T6_EXP_HRD_KEEPER_STONEWARS              
 245: QUESTITEM_EXP_TOKEN_D11_T6_EXP_HRD_KEEPER_STONEWARS              
 246: QUESTITEM_EXP_TOKEN_D12_T6_EXP_HRD_KEEPER_STONEWARS              
 247: QUESTITEM_EXP_TOKEN_D13_T6_EXP_HRD_KEEPER_STONEWARS              
 248: QUESTITEM_EXP_TOKEN_D14_T6_EXP_HRD_KEEPER_STONEWARS              
 249: QUESTITEM_EXP_TOKEN_D15_T6_EXP_HRD_KEEPER_STONEWARS              
 250: QUESTITEM_EXP_TOKEN_D1_T6_EXP_HRD_HERETIC_LUMBERCAMP             
 251: QUESTITEM_EXP_TOKEN_D2_T6_EXP_HRD_HERETIC_LUMBERCAMP             
 252: QUESTITEM_EXP_TOKEN_D3_T6_EXP_HRD_HERETIC_LUMBERCAMP             
 253: QUESTITEM_EXP_TOKEN_D4_T6_EXP_HRD_HERETIC_LUMBERCAMP             
 254: QUESTITEM_EXP_TOKEN_D5_T6_EXP_HRD_HERETIC_LUMBERCAMP             
 255: QUESTITEM_EXP_TOKEN_D6_T6_EXP_HRD_HERETIC_LUMBERCAMP             
 256: QUESTITEM_EXP_TOKEN_D7_T6_EXP_HRD_HERETIC_LUMBERCAMP             
 257: QUESTITEM_EXP_TOKEN_D8_T6_EXP_HRD_HERETIC_LUMBERCAMP             
 258: QUESTITEM_EXP_TOKEN_D9_T6_EXP_HRD_HERETIC_LUMBERCAMP             
 259: QUESTITEM_EXP_TOKEN_D10_T6_EXP_HRD_HERETIC_LUMBERCAMP            
 260: QUESTITEM_EXP_TOKEN_D11_T6_EXP_HRD_HERETIC_LUMBERCAMP            
 261: QUESTITEM_EXP_TOKEN_D12_T6_EXP_HRD_HERETIC_LUMBERCAMP            
 262: QUESTITEM_EXP_TOKEN_D13_T6_EXP_HRD_HERETIC_LUMBERCAMP            
 263: QUESTITEM_EXP_TOKEN_D14_T6_EXP_HRD_HERETIC_LUMBERCAMP            
 264: QUESTITEM_EXP_TOKEN_D15_T6_EXP_HRD_HERETIC_LUMBERCAMP            
 265: QUESTITEM_EXP_TOKEN_D1_T6_EXP_HRD_UNDEAD_SEWERSCRYPT             
 266: QUESTITEM_EXP_TOKEN_D2_T6_EXP_HRD_UNDEAD_SEWERSCRYPT             
 267: QUESTITEM_EXP_TOKEN_D3_T6_EXP_HRD_UNDEAD_SEWERSCRYPT             
 268: QUESTITEM_EXP_TOKEN_D4_T6_EXP_HRD_UNDEAD_SEWERSCRYPT             
 269: QUESTITEM_EXP_TOKEN_D5_T6_EXP_HRD_UNDEAD_SEWERSCRYPT             
 270: QUESTITEM_EXP_TOKEN_D6_T6_EXP_HRD_UNDEAD_SEWERSCRYPT             
 271: QUESTITEM_EXP_TOKEN_D7_T6_EXP_HRD_UNDEAD_SEWERSCRYPT             
 272: QUESTITEM_EXP_TOKEN_D8_T6_EXP_HRD_UNDEAD_SEWERSCRYPT             
 273: QUESTITEM_EXP_TOKEN_D9_T6_EXP_HRD_UNDEAD_SEWERSCRYPT             
 274: QUESTITEM_EXP_TOKEN_D10_T6_EXP_HRD_UNDEAD_SEWERSCRYPT            
 275: QUESTITEM_EXP_TOKEN_D11_T6_EXP_HRD_UNDEAD_SEWERSCRYPT            
 276: QUESTITEM_EXP_TOKEN_D12_T6_EXP_HRD_UNDEAD_SEWERSCRYPT            
 277: QUESTITEM_EXP_TOKEN_D13_T6_EXP_HRD_UNDEAD_SEWERSCRYPT            
 278: QUESTITEM_EXP_TOKEN_D14_T6_EXP_HRD_UNDEAD_SEWERSCRYPT            
 279: QUESTITEM_EXP_TOKEN_D15_T6_EXP_HRD_UNDEAD_SEWERSCRYPT            
 280: QUESTITEM_EXP_TOKEN_D1_T6_EXP_HRD_KEEPER_MUSHROOM                
 281: QUESTITEM_EXP_TOKEN_D2_T6_EXP_HRD_KEEPER_MUSHROOM                
 282: QUESTITEM_EXP_TOKEN_D3_T6_EXP_HRD_KEEPER_MUSHROOM                
 283: QUESTITEM_EXP_TOKEN_D4_T6_EXP_HRD_KEEPER_MUSHROOM                
 284: QUESTITEM_EXP_TOKEN_D5_T6_EXP_HRD_KEEPER_MUSHROOM                
 285: QUESTITEM_EXP_TOKEN_D6_T6_EXP_HRD_KEEPER_MUSHROOM                
 286: QUESTITEM_EXP_TOKEN_D7_T6_EXP_HRD_KEEPER_MUSHROOM                
 287: QUESTITEM_EXP_TOKEN_D8_T6_EXP_HRD_KEEPER_MUSHROOM                
 288: QUESTITEM_EXP_TOKEN_D9_T6_EXP_HRD_KEEPER_MUSHROOM                
 289: QUESTITEM_EXP_TOKEN_D10_T6_EXP_HRD_KEEPER_MUSHROOM               
 290: QUESTITEM_EXP_TOKEN_D11_T6_EXP_HRD_KEEPER_MUSHROOM               
 291: QUESTITEM_EXP_TOKEN_D12_T6_EXP_HRD_KEEPER_MUSHROOM               
 292: QUESTITEM_EXP_TOKEN_D13_T6_EXP_HRD_KEEPER_MUSHROOM               
 293: QUESTITEM_EXP_TOKEN_D14_T6_EXP_HRD_KEEPER_MUSHROOM               
 294: QUESTITEM_EXP_TOKEN_D15_T6_EXP_HRD_KEEPER_MUSHROOM               
 295: QUESTITEM_EXP_TOKEN_D1_T6_EXP_HRD_MORGANA_TRHEESISTERS           
 296: QUESTITEM_EXP_TOKEN_D2_T6_EXP_HRD_MORGANA_TRHEESISTERS           
 297: QUESTITEM_EXP_TOKEN_D3_T6_EXP_HRD_MORGANA_TRHEESISTERS           
 298: QUESTITEM_EXP_TOKEN_D4_T6_EXP_HRD_MORGANA_TRHEESISTERS           
 299: QUESTITEM_EXP_TOKEN_D5_T6_EXP_HRD_MORGANA_TRHEESISTERS           
 300: QUESTITEM_EXP_TOKEN_D6_T6_EXP_HRD_MORGANA_TRHEESISTERS           
 301: QUESTITEM_EXP_TOKEN_D7_T6_EXP_HRD_MORGANA_TRHEESISTERS           
 302: QUESTITEM_EXP_TOKEN_D8_T6_EXP_HRD_MORGANA_TRHEESISTERS           
 303: QUESTITEM_EXP_TOKEN_D9_T6_EXP_HRD_MORGANA_TRHEESISTERS           
 304: QUESTITEM_EXP_TOKEN_D10_T6_EXP_HRD_MORGANA_TRHEESISTERS          
 305: QUESTITEM_EXP_TOKEN_D11_T6_EXP_HRD_MORGANA_TRHEESISTERS          
 306: QUESTITEM_EXP_TOKEN_D12_T6_EXP_HRD_MORGANA_TRHEESISTERS          
 307: QUESTITEM_EXP_TOKEN_D13_T6_EXP_HRD_MORGANA_TRHEESISTERS          
 308: QUESTITEM_EXP_TOKEN_D14_T6_EXP_HRD_MORGANA_TRHEESISTERS          
 309: QUESTITEM_EXP_TOKEN_D15_T6_EXP_HRD_MORGANA_TRHEESISTERS          
 310: QUESTITEM_EXP_TOKEN_D1_T6_EXP_HRD_UNDEAD_ETERNALBATTLE           
 311: QUESTITEM_EXP_TOKEN_D2_T6_EXP_HRD_UNDEAD_ETERNALBATTLE           
 312: QUESTITEM_EXP_TOKEN_D3_T6_EXP_HRD_UNDEAD_ETERNALBATTLE           
 313: QUESTITEM_EXP_TOKEN_D4_T6_EXP_HRD_UNDEAD_ETERNALBATTLE           
 314: QUESTITEM_EXP_TOKEN_D5_T6_EXP_HRD_UNDEAD_ETERNALBATTLE           
 315: QUESTITEM_EXP_TOKEN_D6_T6_EXP_HRD_UNDEAD_ETERNALBATTLE           
 316: QUESTITEM_EXP_TOKEN_D7_T6_EXP_HRD_UNDEAD_ETERNALBATTLE           
 317: QUESTITEM_EXP_TOKEN_D8_T6_EXP_HRD_UNDEAD_ETERNALBATTLE           
 318: QUESTITEM_EXP_TOKEN_D9_T6_EXP_HRD_UNDEAD_ETERNALBATTLE           
 319: QUESTITEM_EXP_TOKEN_D10_T6_EXP_HRD_UNDEAD_ETERNALBATTLE          
 320: QUESTITEM_EXP_TOKEN_D11_T6_EXP_HRD_UNDEAD_ETERNALBATTLE          
 321: QUESTITEM_EXP_TOKEN_D12_T6_EXP_HRD_UNDEAD_ETERNALBATTLE          
 322: QUESTITEM_EXP_TOKEN_D13_T6_EXP_HRD_UNDEAD_ETERNALBATTLE          
 323: QUESTITEM_EXP_TOKEN_D14_T6_EXP_HRD_UNDEAD_ETERNALBATTLE          
 324: QUESTITEM_EXP_TOKEN_D15_T6_EXP_HRD_UNDEAD_ETERNALBATTLE          
 325: QUESTITEM_EXP_TOKEN_D1_T6_EXP_HRD_HERETIC_FISTFULOFSILVER        
 326: QUESTITEM_EXP_TOKEN_D2_T6_EXP_HRD_HERETIC_FISTFULOFSILVER        
 327: QUESTITEM_EXP_TOKEN_D3_T6_EXP_HRD_HERETIC_FISTFULOFSILVER        
 328: QUESTITEM_EXP_TOKEN_D4_T6_EXP_HRD_HERETIC_FISTFULOFSILVER        
 329: QUESTITEM_EXP_TOKEN_D5_T6_EXP_HRD_HERETIC_FISTFULOFSILVER        
 330: QUESTITEM_EXP_TOKEN_D6_T6_EXP_HRD_HERETIC_FISTFULOFSILVER        
 331: QUESTITEM_EXP_TOKEN_D7_T6_EXP_HRD_HERETIC_FISTFULOFSILVER        
 332: QUESTITEM_EXP_TOKEN_D8_T6_EXP_HRD_HERETIC_FISTFULOFSILVER        
 333: QUESTITEM_EXP_TOKEN_D9_T6_EXP_HRD_HERETIC_FISTFULOFSILVER        
 334: QUESTITEM_EXP_TOKEN_D10_T6_EXP_HRD_HERETIC_FISTFULOFSILVER       
 335: QUESTITEM_EXP_TOKEN_D11_T6_EXP_HRD_HERETIC_FISTFULOFSILVER       
 336: QUESTITEM_EXP_TOKEN_D12_T6_EXP_HRD_HERETIC_FISTFULOFSILVER       
 337: QUESTITEM_EXP_TOKEN_D13_T6_EXP_HRD_HERETIC_FISTFULOFSILVER       
 338: QUESTITEM_EXP_TOKEN_D14_T6_EXP_HRD_HERETIC_FISTFULOFSILVER       
 339: QUESTITEM_EXP_TOKEN_D15_T6_EXP_HRD_HERETIC_FISTFULOFSILVER       
 340: QUESTITEM_EXP_TOKEN_D1_T6_EXP_HRD_MORGANA_TORTURER               
 341: QUESTITEM_EXP_TOKEN_D2_T6_EXP_HRD_MORGANA_TORTURER               
 342: QUESTITEM_EXP_TOKEN_D3_T6_EXP_HRD_MORGANA_TORTURER               
 343: QUESTITEM_EXP_TOKEN_D4_T6_EXP_HRD_MORGANA_TORTURER               
 344: QUESTITEM_EXP_TOKEN_D5_T6_EXP_HRD_MORGANA_TORTURER               
 345: QUESTITEM_EXP_TOKEN_D6_T6_EXP_HRD_MORGANA_TORTURER               
 346: QUESTITEM_EXP_TOKEN_D7_T6_EXP_HRD_MORGANA_TORTURER               
 347: QUESTITEM_EXP_TOKEN_D8_T6_EXP_HRD_MORGANA_TORTURER               
 348: QUESTITEM_EXP_TOKEN_D9_T6_EXP_HRD_MORGANA_TORTURER               
 349: QUESTITEM_EXP_TOKEN_D10_T6_EXP_HRD_MORGANA_TORTURER              
 350: QUESTITEM_EXP_TOKEN_D11_T6_EXP_HRD_MORGANA_TORTURER              
 351: QUESTITEM_EXP_TOKEN_D12_T6_EXP_HRD_MORGANA_TORTURER              
 352: QUESTITEM_EXP_TOKEN_D13_T6_EXP_HRD_MORGANA_TORTURER              
 353: QUESTITEM_EXP_TOKEN_D14_T6_EXP_HRD_MORGANA_TORTURER              
 354: QUESTITEM_EXP_TOKEN_D15_T6_EXP_HRD_MORGANA_TORTURER              
 355: QUESTITEM_TOKEN_ROYAL_HORSE                                      : Royal Horse Token
 356: QUESTITEM_TOKEN_ROYAL_T4                                         : Adept's Royal Sigil
 357: QUESTITEM_TOKEN_ROYAL_T5                                         : Expert's Royal Sigil
 358: QUESTITEM_TOKEN_ROYAL_T6                                         : Master's Royal Sigil
 359: QUESTITEM_TOKEN_ROYAL_T7                                         : Grandmaster's Royal Sigil
 360: QUESTITEM_TOKEN_ROYAL_T8                                         : Elder's Royal Sigil
 361: QUESTITEM_TOKEN_KEEPER                                           : Keeper Totem
 362: QUESTITEM_TOKEN_MORGANA                                          : Morgana's Favor
 363: QUESTITEM_TOKEN_UNDEAD                                           : Undead Knucklebone
 364: QUESTITEM_TOKEN_EVENT_HALLOWEEN_2017                             : Pumpkin Pip
 365: QUESTITEM_TOKEN_EVENT_EASTER_2018                                : Fool's Golden Egg
 366: QUESTITEM_TOKEN_ADC_FRAME                                        : Adventurer Token
 367: T4_SKILLBOOK_STANDARD                                            : Adept's Tome of Insight
 368: T1_SKILLBOOK_NONTRADABLE                                         : Beginner's Tome of Insight
 369: T2_SKILLBOOK_NONTRADABLE                                         : Novice's Tome of Insight
 370: T3_SKILLBOOK_NONTRADABLE                                         : Journeyman's Tome of Insight
 371: T4_SKILLBOOK_NONTRADABLE                                         : Adept's Tome of Insight
 372: T5_SKILLBOOK_NONTRADABLE                                         : Expert's Tome of Insight
 373: T6_SKILLBOOK_NONTRADABLE                                         : Master's Tome of Insight
 374: T7_SKILLBOOK_NONTRADABLE                                         : Grandmaster's Tome of Insight
 375: T8_SKILLBOOK_NONTRADABLE                                         : Elder's Tome of Insight
 376: T3_PREMIUMITEM_3_NONTRADABLE                                     : Three Days of Premium
 377: T1_SILVERBAG_NONTRADABLE                                         : Beginner's Bag of Silver
 378: T2_SILVERBAG_NONTRADABLE                                         : Novice's Bag of Silver
 379: T3_SILVERBAG_NONTRADABLE                                         : Journeyman's Bag of Silver
 380: T4_SILVERBAG_NONTRADABLE                                         : Adept's Bag of Silver
 381: T5_SILVERBAG_NONTRADABLE                                         : Expert's Bag of Silver
 382: T6_SILVERBAG_NONTRADABLE                                         : Master's Bag of Silver
 383: T7_SILVERBAG_NONTRADABLE                                         : Grandmaster's Bag of Silver
 384: T8_SILVERBAG_NONTRADABLE                                         : Elder's Bag of Silver
 385: T2_POTION_HEAL                                                   : Minor Healing Potion
 386: T4_POTION_HEAL                                                   : Healing Potion
 387: T4_POTION_HEAL@1                                                 : Healing Potion
 388: T6_POTION_HEAL                                                   : Major Healing Potion
 389: T6_POTION_HEAL@1                                                 : Major Healing Potion
 390: T2_POTION_ENERGY                                                 : Minor Energy Potion
 391: T4_POTION_ENERGY                                                 : Energy Potion
 392: T4_POTION_ENERGY@1                                               : Energy Potion
 393: T6_POTION_ENERGY                                                 : Major Energy Potion
 394: T6_POTION_ENERGY@1                                               : Major Energy Potion
 395: T3_POTION_REVIVE                                                 : Minor Gigantify Potion
 396: T5_POTION_REVIVE                                                 : Gigantify Potion
 397: T5_POTION_REVIVE@1                                               : Gigantify Potion
 398: T7_POTION_REVIVE                                                 : Major Gigantify Potion
 399: T7_POTION_REVIVE@1                                               : Major Gigantify Potion
 400: T3_POTION_STONESKIN                                              : Minor Resistance Potion
 401: T5_POTION_STONESKIN                                              : Resistance Potion
 402: T5_POTION_STONESKIN@1                                            : Resistance Potion
 403: T7_POTION_STONESKIN                                              : Major Resistance Potion
 404: T7_POTION_STONESKIN@1                                            : Major Resistance Potion
 405: T3_POTION_SLOWFIELD                                              : Minor Sticky Potion
 406: T5_POTION_SLOWFIELD                                              : Sticky Potion
 407: T5_POTION_SLOWFIELD@1                                            : Sticky Potion
 408: T7_POTION_SLOWFIELD                                              : Major Sticky Potion
 409: T7_POTION_SLOWFIELD@1                                            : Major Sticky Potion
 410: T4_POTION_COOLDOWN                                               : Minor Poison Potion
 411: T4_POTION_COOLDOWN@1                                             : Minor Poison Potion
 412: T6_POTION_COOLDOWN                                               : Poison Potion
 413: T6_POTION_COOLDOWN@1                                             : Poison Potion
 414: T8_POTION_COOLDOWN                                               : Major Poison Potion
 415: T8_POTION_COOLDOWN@1                                             : Major Poison Potion
 416: T8_POTION_CLEANSE                                                : Invisibility Potion
 417: T8_POTION_CLEANSE@1                                              : Invisibility Potion
 418: T1_WORM                                                          : Earthworm
 419: T1_FISHINGBAIT                                                   : Simple Fish Bait
 420: T3_FISHINGBAIT                                                   : Fancy Fish Bait
 421: T5_FISHINGBAIT                                                   : Special Fish Bait
 422: T1_MEAL_GRILLEDFISH                                              : Grilled Fish
 423: T1_MEAL_SEAWEEDSALAD                                             : Seaweed Salad
 424: T1_MEAL_SOUP                                                     : Carrot Soup
 425: T1_MEAL_SOUP@1                                                   : Carrot Soup
 426: T1_MEAL_SOUP@2                                                   : Carrot Soup
 427: T1_MEAL_SOUP@3                                                   : Carrot Soup
 428: T3_MEAL_SOUP                                                     : Wheat Soup
 429: T3_MEAL_SOUP@1                                                   : Wheat Soup
 430: T3_MEAL_SOUP@2                                                   : Wheat Soup
 431: T3_MEAL_SOUP@3                                                   : Wheat Soup
 432: T5_MEAL_SOUP                                                     : Cabbage Soup
 433: T5_MEAL_SOUP@1                                                   : Cabbage Soup
 434: T5_MEAL_SOUP@2                                                   : Cabbage Soup
 435: T5_MEAL_SOUP@3                                                   : Cabbage Soup
 436: T1_MEAL_SOUP_FISH                                                : Greenmoor Clam Soup
 437: T1_MEAL_SOUP_FISH@1                                              : Greenmoor Clam Soup
 438: T1_MEAL_SOUP_FISH@2                                              : Greenmoor Clam Soup
 439: T1_MEAL_SOUP_FISH@3                                              : Greenmoor Clam Soup
 440: T3_MEAL_SOUP_FISH                                                : Murkwater Clam Soup
 441: T3_MEAL_SOUP_FISH@1                                              : Murkwater Clam Soup
 442: T3_MEAL_SOUP_FISH@2                                              : Murkwater Clam Soup
 443: T3_MEAL_SOUP_FISH@3                                              : Murkwater Clam Soup
 444: T5_MEAL_SOUP_FISH                                                : Blackbog Clam Soup
 445: T5_MEAL_SOUP_FISH@1                                              : Blackbog Clam Soup
 446: T5_MEAL_SOUP_FISH@2                                              : Blackbog Clam Soup
 447: T5_MEAL_SOUP_FISH@3                                              : Blackbog Clam Soup
 448: T2_MEAL_SALAD                                                    : Bean Salad
 449: T2_MEAL_SALAD@1                                                  : Bean Salad
 450: T2_MEAL_SALAD@2                                                  : Bean Salad
 451: T2_MEAL_SALAD@3                                                  : Bean Salad
 452: T4_MEAL_SALAD                                                    : Turnip Salad
 453: T4_MEAL_SALAD@1                                                  : Turnip Salad
 454: T4_MEAL_SALAD@2                                                  : Turnip Salad
 455: T4_MEAL_SALAD@3                                                  : Turnip Salad
 456: T6_MEAL_SALAD                                                    : Potato Salad
 457: T6_MEAL_SALAD@1                                                  : Potato Salad
 458: T6_MEAL_SALAD@2                                                  : Potato Salad
 459: T6_MEAL_SALAD@3                                                  : Potato Salad
 460: T2_MEAL_SALAD_FISH                                               : Shallowshore Squid Salad
 461: T2_MEAL_SALAD_FISH@1                                             : Shallowshore Squid Salad
 462: T2_MEAL_SALAD_FISH@2                                             : Shallowshore Squid Salad
 463: T2_MEAL_SALAD_FISH@3                                             : Shallowshore Squid Salad
 464: T4_MEAL_SALAD_FISH                                               : Midwater Octopus Salad
 465: T4_MEAL_SALAD_FISH@1                                             : Midwater Octopus Salad
 466: T4_MEAL_SALAD_FISH@2                                             : Midwater Octopus Salad
 467: T4_MEAL_SALAD_FISH@3                                             : Midwater Octopus Salad
 468: T6_MEAL_SALAD_FISH                                               : Deepwater Kraken Salad
 469: T6_MEAL_SALAD_FISH@1                                             : Deepwater Kraken Salad
 470: T6_MEAL_SALAD_FISH@2                                             : Deepwater Kraken Salad
 471: T6_MEAL_SALAD_FISH@3                                             : Deepwater Kraken Salad
 472: T3_MEAL_PIE                                                      : Chicken Pie
 473: T3_MEAL_PIE@1                                                    : Chicken Pie
 474: T3_MEAL_PIE@2                                                    : Chicken Pie
 475: T3_MEAL_PIE@3                                                    : Chicken Pie
 476: T5_MEAL_PIE                                                      : Goose Pie
 477: T5_MEAL_PIE@1                                                    : Goose Pie
 478: T5_MEAL_PIE@2                                                    : Goose Pie
 479: T5_MEAL_PIE@3                                                    : Goose Pie
 480: T7_MEAL_PIE                                                      : Pork Pie
 481: T7_MEAL_PIE@1                                                    : Pork Pie
 482: T7_MEAL_PIE@2                                                    : Pork Pie
 483: T7_MEAL_PIE@3                                                    : Pork Pie
 484: T3_MEAL_PIE_FISH                                                 : Upland Coldeye Pie
 485: T3_MEAL_PIE_FISH@1                                               : Upland Coldeye Pie
 486: T3_MEAL_PIE_FISH@2                                               : Upland Coldeye Pie
 487: T3_MEAL_PIE_FISH@3                                               : Upland Coldeye Pie
 488: T5_MEAL_PIE_FISH                                                 : Mountain Blindeye Pie
 489: T5_MEAL_PIE_FISH@1                                               : Mountain Blindeye Pie
 490: T5_MEAL_PIE_FISH@2                                               : Mountain Blindeye Pie
 491: T5_MEAL_PIE_FISH@3                                               : Mountain Blindeye Pie
 492: T7_MEAL_PIE_FISH                                                 : Frostpeak Deadeye Pie
 493: T7_MEAL_PIE_FISH@1                                               : Frostpeak Deadeye Pie
 494: T7_MEAL_PIE_FISH@2                                               : Frostpeak Deadeye Pie
 495: T7_MEAL_PIE_FISH@3                                               : Frostpeak Deadeye Pie
 496: T3_MEAL_OMELETTE                                                 : Chicken Omelette
 497: T3_MEAL_OMELETTE@1                                               : Chicken Omelette
 498: T3_MEAL_OMELETTE@2                                               : Chicken Omelette
 499: T3_MEAL_OMELETTE@3                                               : Chicken Omelette
 500: T5_MEAL_OMELETTE                                                 : Goose Omelette
 501: T5_MEAL_OMELETTE@1                                               : Goose Omelette
 502: T5_MEAL_OMELETTE@2                                               : Goose Omelette
 503: T5_MEAL_OMELETTE@3                                               : Goose Omelette
 504: T7_MEAL_OMELETTE                                                 : Pork Omelette
 505: T7_MEAL_OMELETTE@1                                               : Pork Omelette
 506: T7_MEAL_OMELETTE@2                                               : Pork Omelette
 507: T7_MEAL_OMELETTE@3                                               : Pork Omelette
 508: T3_MEAL_OMELETTE_FISH                                            : Lowriver Crab Omelette
 509: T3_MEAL_OMELETTE_FISH@1                                          : Lowriver Crab Omelette
 510: T3_MEAL_OMELETTE_FISH@2                                          : Lowriver Crab Omelette
 511: T3_MEAL_OMELETTE_FISH@3                                          : Lowriver Crab Omelette
 512: T5_MEAL_OMELETTE_FISH                                            : Drybrook Crab Omelette
 513: T5_MEAL_OMELETTE_FISH@1                                          : Drybrook Crab Omelette
 514: T5_MEAL_OMELETTE_FISH@2                                          : Drybrook Crab Omelette
 515: T5_MEAL_OMELETTE_FISH@3                                          : Drybrook Crab Omelette
 516: T7_MEAL_OMELETTE_FISH                                            : Dusthole Crab Omelette
 517: T7_MEAL_OMELETTE_FISH@1                                          : Dusthole Crab Omelette
 518: T7_MEAL_OMELETTE_FISH@2                                          : Dusthole Crab Omelette
 519: T7_MEAL_OMELETTE_FISH@3                                          : Dusthole Crab Omelette
 520: T3_MEAL_OMELETTE_AVALON                                          : Avalonian Chicken Omelette
 521: T3_MEAL_OMELETTE_AVALON@1                                        : Avalonian Chicken Omelette
 522: T3_MEAL_OMELETTE_AVALON@2                                        : Avalonian Chicken Omelette
 523: T3_MEAL_OMELETTE_AVALON@3                                        : Avalonian Chicken Omelette
 524: T5_MEAL_OMELETTE_AVALON                                          : Avalonian Goose Omelette
 525: T5_MEAL_OMELETTE_AVALON@1                                        : Avalonian Goose Omelette
 526: T5_MEAL_OMELETTE_AVALON@2                                        : Avalonian Goose Omelette
 527: T5_MEAL_OMELETTE_AVALON@3                                        : Avalonian Goose Omelette
 528: T7_MEAL_OMELETTE_AVALON                                          : Avalonian Pork Omelette
 529: T7_MEAL_OMELETTE_AVALON@1                                        : Avalonian Pork Omelette
 530: T7_MEAL_OMELETTE_AVALON@2                                        : Avalonian Pork Omelette
 531: T7_MEAL_OMELETTE_AVALON@3                                        : Avalonian Pork Omelette
 532: T4_MEAL_STEW                                                     : Goat Stew
 533: T4_MEAL_STEW@1                                                   : Goat Stew
 534: T4_MEAL_STEW@2                                                   : Goat Stew
 535: T4_MEAL_STEW@3                                                   : Goat Stew
 536: T6_MEAL_STEW                                                     : Mutton Stew
 537: T6_MEAL_STEW@1                                                   : Mutton Stew
 538: T6_MEAL_STEW@2                                                   : Mutton Stew
 539: T6_MEAL_STEW@3                                                   : Mutton Stew
 540: T8_MEAL_STEW                                                     : Beef Stew
 541: T8_MEAL_STEW@1                                                   : Beef Stew
 542: T8_MEAL_STEW@2                                                   : Beef Stew
 543: T8_MEAL_STEW@3                                                   : Beef Stew
 544: T4_MEAL_STEW_FISH                                                : Greenriver Eel Stew
 545: T4_MEAL_STEW_FISH@1                                              : Greenriver Eel Stew
 546: T4_MEAL_STEW_FISH@2                                              : Greenriver Eel Stew
 547: T4_MEAL_STEW_FISH@3                                              : Greenriver Eel Stew
 548: T6_MEAL_STEW_FISH                                                : Redspring Eel Stew
 549: T6_MEAL_STEW_FISH@1                                              : Redspring Eel Stew
 550: T6_MEAL_STEW_FISH@2                                              : Redspring Eel Stew
 551: T6_MEAL_STEW_FISH@3                                              : Redspring Eel Stew
 552: T8_MEAL_STEW_FISH                                                : Deadwater Eel Stew
 553: T8_MEAL_STEW_FISH@1                                              : Deadwater Eel Stew
 554: T8_MEAL_STEW_FISH@2                                              : Deadwater Eel Stew
 555: T8_MEAL_STEW_FISH@3                                              : Deadwater Eel Stew
 556: T4_MEAL_STEW_AVALON                                              : Avalonian Goat Stew
 557: T4_MEAL_STEW_AVALON@1                                            : Avalonian Goat Stew
 558: T4_MEAL_STEW_AVALON@2                                            : Avalonian Goat Stew
 559: T4_MEAL_STEW_AVALON@3                                            : Avalonian Goat Stew
 560: T6_MEAL_STEW_AVALON                                              : Avalonian Mutton Stew
 561: T6_MEAL_STEW_AVALON@1                                            : Avalonian Mutton Stew
 562: T6_MEAL_STEW_AVALON@2                                            : Avalonian Mutton Stew
 563: T6_MEAL_STEW_AVALON@3                                            : Avalonian Mutton Stew
 564: T8_MEAL_STEW_AVALON                                              : Avalonian Beef Stew
 565: T8_MEAL_STEW_AVALON@1                                            : Avalonian Beef Stew
 566: T8_MEAL_STEW_AVALON@2                                            : Avalonian Beef Stew
 567: T8_MEAL_STEW_AVALON@3                                            : Avalonian Beef Stew
 568: T4_MEAL_SANDWICH                                                 : Goat Sandwich
 569: T4_MEAL_SANDWICH@1                                               : Goat Sandwich
 570: T4_MEAL_SANDWICH@2                                               : Goat Sandwich
 571: T4_MEAL_SANDWICH@3                                               : Goat Sandwich
 572: T6_MEAL_SANDWICH                                                 : Mutton Sandwich
 573: T6_MEAL_SANDWICH@1                                               : Mutton Sandwich
 574: T6_MEAL_SANDWICH@2                                               : Mutton Sandwich
 575: T6_MEAL_SANDWICH@3                                               : Mutton Sandwich
 576: T8_MEAL_SANDWICH                                                 : Beef Sandwich
 577: T8_MEAL_SANDWICH@1                                               : Beef Sandwich
 578: T8_MEAL_SANDWICH@2                                               : Beef Sandwich
 579: T8_MEAL_SANDWICH@3                                               : Beef Sandwich
 580: T4_MEAL_SANDWICH_FISH                                            : Stonestream Lurcher Sandwich
 581: T4_MEAL_SANDWICH_FISH@1                                          : Stonestream Lurcher Sandwich
 582: T4_MEAL_SANDWICH_FISH@2                                          : Stonestream Lurcher Sandwich
 583: T4_MEAL_SANDWICH_FISH@3                                          : Stonestream Lurcher Sandwich
 584: T6_MEAL_SANDWICH_FISH                                            : Rushwater Lurcher Sandwich
 585: T6_MEAL_SANDWICH_FISH@1                                          : Rushwater Lurcher Sandwich
 586: T6_MEAL_SANDWICH_FISH@2                                          : Rushwater Lurcher Sandwich
 587: T6_MEAL_SANDWICH_FISH@3                                          : Rushwater Lurcher Sandwich
 588: T8_MEAL_SANDWICH_FISH                                            : Thunderfall Lurcher Sandwich
 589: T8_MEAL_SANDWICH_FISH@1                                          : Thunderfall Lurcher Sandwich
 590: T8_MEAL_SANDWICH_FISH@2                                          : Thunderfall Lurcher Sandwich
 591: T8_MEAL_SANDWICH_FISH@3                                          : Thunderfall Lurcher Sandwich
 592: T4_MEAL_SANDWICH_AVALON                                          : Avalonian Goat Sandwich
 593: T4_MEAL_SANDWICH_AVALON@1                                        : Avalonian Goat Sandwich
 594: T4_MEAL_SANDWICH_AVALON@2                                        : Avalonian Goat Sandwich
 595: T4_MEAL_SANDWICH_AVALON@3                                        : Avalonian Goat Sandwich
 596: T6_MEAL_SANDWICH_AVALON                                          : Avalonian Mutton Sandwich
 597: T6_MEAL_SANDWICH_AVALON@1                                        : Avalonian Mutton Sandwich
 598: T6_MEAL_SANDWICH_AVALON@2                                        : Avalonian Mutton Sandwich
 599: T6_MEAL_SANDWICH_AVALON@3                                        : Avalonian Mutton Sandwich
 600: T8_MEAL_SANDWICH_AVALON                                          : Avalonian Beef Sandwich
 601: T8_MEAL_SANDWICH_AVALON@1                                        : Avalonian Beef Sandwich
 602: T8_MEAL_SANDWICH_AVALON@2                                        : Avalonian Beef Sandwich
 603: T8_MEAL_SANDWICH_AVALON@3                                        : Avalonian Beef Sandwich
 604: T3_MEAT                                                          : Raw Chicken
 605: T4_MEAT                                                          : Raw Goat
 606: T5_MEAT                                                          : Raw Goose
 607: T6_MEAT                                                          : Raw Mutton
 608: T7_MEAT                                                          : Raw Pork
 609: T8_MEAT                                                          : Raw Beef
 610: T4_BUTTER                                                        : Goat's Butter
 611: T6_BUTTER                                                        : Sheep's Butter
 612: T8_BUTTER                                                        : Cow's Butter
 613: T6_ALCOHOL                                                       : Potato Schnapps
 614: T7_ALCOHOL                                                       : Corn Hooch
 615: T8_ALCOHOL                                                       : Pumpkin Moonshine
 616: T4_BREAD                                                         : Bread
 617: T3_FLOUR                                                         : Flour
 618: T1_WOOD                                                          : Rough Logs
 619: T2_WOOD                                                          : Birch Logs
 620: T3_WOOD                                                          : Chestnut Logs
 621: T4_WOOD                                                          : Pine Logs
 622: T5_WOOD                                                          : Cedar Logs
 623: T6_WOOD                                                          : Bloodoak Logs
 624: T7_WOOD                                                          : Ashenbark Logs
 625: T8_WOOD                                                          : Whitewood Logs
 626: T4_WOOD_LEVEL1@1                                                 : Uncommon Pine Logs
 627: T5_WOOD_LEVEL1@1                                                 : Uncommon Cedar Logs
 628: T6_WOOD_LEVEL1@1                                                 : Uncommon Bloodoak Logs
 629: T7_WOOD_LEVEL1@1                                                 : Uncommon Ashenbark Logs
 630: T8_WOOD_LEVEL1@1                                                 : Uncommon Whitewood Logs
 631: T4_WOOD_LEVEL2@2                                                 : Rare Pine Logs
 632: T5_WOOD_LEVEL2@2                                                 : Rare Cedar Logs
 633: T6_WOOD_LEVEL2@2                                                 : Rare Bloodoak Logs
 634: T7_WOOD_LEVEL2@2                                                 : Rare Ashenbark Logs
 635: T8_WOOD_LEVEL2@2                                                 : Rare Whitewood Logs
 636: T4_WOOD_LEVEL3@3                                                 : Exceptional Pine Logs
 637: T5_WOOD_LEVEL3@3                                                 : Exceptional Cedar Logs
 638: T6_WOOD_LEVEL3@3                                                 : Exceptional Bloodoak Logs
 639: T7_WOOD_LEVEL3@3                                                 : Exceptional Ashenbark Logs
 640: T8_WOOD_LEVEL3@3                                                 : Exceptional Whitewood Logs
 641: T1_ROCK                                                          : Rough Stone
 642: T2_ROCK                                                          : Limestone
 643: T3_ROCK                                                          : Sandstone
 644: T4_ROCK                                                          : Travertine
 645: T5_ROCK                                                          : Granite
 646: T6_ROCK                                                          : Slate
 647: T7_ROCK                                                          : Basalt
 648: T8_ROCK                                                          : Marble
 649: T4_ROCK_LEVEL1@1                                                 : Uncommon Travertine
 650: T5_ROCK_LEVEL1@1                                                 : Uncommon Granite
 651: T6_ROCK_LEVEL1@1                                                 : Uncommon Slate
 652: T7_ROCK_LEVEL1@1                                                 : Uncommon Basalt
 653: T8_ROCK_LEVEL1@1                                                 : Uncommon Marble
 654: T4_ROCK_LEVEL2@2                                                 : Rare Travertine
 655: T5_ROCK_LEVEL2@2                                                 : Rare Granite
 656: T6_ROCK_LEVEL2@2                                                 : Rare Slate
 657: T7_ROCK_LEVEL2@2                                                 : Rare Basalt
 658: T8_ROCK_LEVEL2@2                                                 : Rare Marble
 659: T4_ROCK_LEVEL3@3                                                 : Exceptional Travertine
 660: T5_ROCK_LEVEL3@3                                                 : Exceptional Granite
 661: T6_ROCK_LEVEL3@3                                                 : Exceptional Slate
 662: T7_ROCK_LEVEL3@3                                                 : Exceptional Basalt
 663: T8_ROCK_LEVEL3@3                                                 : Exceptional Marble
 664: T2_ORE                                                           : Copper Ore
 665: T3_ORE                                                           : Tin Ore
 666: T4_ORE                                                           : Iron Ore
 667: T5_ORE                                                           : Titanium Ore
 668: T6_ORE                                                           : Runite Ore
 669: T7_ORE                                                           : Meteorite Ore
 670: T8_ORE                                                           : Adamantium Ore
 671: T4_ORE_LEVEL1@1                                                  : Uncommon Iron Ore
 672: T5_ORE_LEVEL1@1                                                  : Uncommon Titanium Ore
 673: T6_ORE_LEVEL1@1                                                  : Uncommon Runite Ore
 674: T7_ORE_LEVEL1@1                                                  : Uncommon Meteorite Ore
 675: T8_ORE_LEVEL1@1                                                  : Uncommon Adamantium Ore
 676: T4_ORE_LEVEL2@2                                                  : Rare Iron Ore
 677: T5_ORE_LEVEL2@2                                                  : Rare Titanium Ore
 678: T6_ORE_LEVEL2@2                                                  : Rare Runite Ore
 679: T7_ORE_LEVEL2@2                                                  : Rare Meteorite Ore
 680: T8_ORE_LEVEL2@2                                                  : Rare Adamantium Ore
 681: T4_ORE_LEVEL3@3                                                  : Exceptional Iron Ore
 682: T5_ORE_LEVEL3@3                                                  : Exceptional Titanium Ore
 683: T6_ORE_LEVEL3@3                                                  : Exceptional Runite Ore
 684: T7_ORE_LEVEL3@3                                                  : Exceptional Meteorite Ore
 685: T8_ORE_LEVEL3@3                                                  : Exceptional Adamantium Ore
 686: T1_HIDE                                                          : Scraps of Hide
 687: T2_HIDE                                                          : Rugged Hide
 688: T3_HIDE                                                          : Thin Hide
 689: T4_HIDE                                                          : Medium Hide
 690: T5_HIDE                                                          : Heavy Hide
 691: T6_HIDE                                                          : Robust Hide
 692: T7_HIDE                                                          : Thick Hide
 693: T8_HIDE                                                          : Resilient Hide
 694: T4_HIDE_LEVEL1@1                                                 : Uncommon Medium Hide
 695: T5_HIDE_LEVEL1@1                                                 : Uncommon Heavy Hide
 696: T6_HIDE_LEVEL1@1                                                 : Uncommon Robust Hide
 697: T7_HIDE_LEVEL1@1                                                 : Uncommon Thick Hide
 698: T8_HIDE_LEVEL1@1                                                 : Uncommon Resilient Hide
 699: T4_HIDE_LEVEL2@2                                                 : Rare Medium Hide
 700: T5_HIDE_LEVEL2@2                                                 : Rare Heavy Hide
 701: T6_HIDE_LEVEL2@2                                                 : Rare Robust Hide
 702: T7_HIDE_LEVEL2@2                                                 : Rare Thick Hide
 703: T8_HIDE_LEVEL2@2                                                 : Rare Resilient Hide
 704: T4_HIDE_LEVEL3@3                                                 : Exceptional Medium Hide
 705: T5_HIDE_LEVEL3@3                                                 : Exceptional Heavy Hide
 706: T6_HIDE_LEVEL3@3                                                 : Exceptional Robust Hide
 707: T7_HIDE_LEVEL3@3                                                 : Exceptional Thick Hide
 708: T8_HIDE_LEVEL3@3                                                 : Exceptional Resilient Hide
 709: T2_FIBER                                                         : Cotton
 710: T3_FIBER                                                         : Flax
 711: T4_FIBER                                                         : Hemp
 712: T5_FIBER                                                         : Skyflower
 713: T6_FIBER                                                         : Redleaf Cotton
 714: T7_FIBER                                                         : Sunflax
 715: T8_FIBER                                                         : Ghost Hemp
 716: T4_FIBER_LEVEL1@1                                                : Uncommon Hemp
 717: T5_FIBER_LEVEL1@1                                                : Uncommon Skyflower
 718: T6_FIBER_LEVEL1@1                                                : Uncommon Redleaf Cotton
 719: T7_FIBER_LEVEL1@1                                                : Uncommon Sunflax
 720: T8_FIBER_LEVEL1@1                                                : Uncommon Ghost Hemp
 721: T4_FIBER_LEVEL2@2                                                : Rare Hemp
 722: T5_FIBER_LEVEL2@2                                                : Rare Skyflower
 723: T6_FIBER_LEVEL2@2                                                : Rare Redleaf Cotton
 724: T7_FIBER_LEVEL2@2                                                : Rare Sunflax
 725: T8_FIBER_LEVEL2@2                                                : Rare Ghost Hemp
 726: T4_FIBER_LEVEL3@3                                                : Exceptional Hemp
 727: T5_FIBER_LEVEL3@3                                                : Exceptional Skyflower
 728: T6_FIBER_LEVEL3@3                                                : Exceptional Redleaf Cotton
 729: T7_FIBER_LEVEL3@3                                                : Exceptional Sunflax
 730: T8_FIBER_LEVEL3@3                                                : Exceptional Ghost Hemp
 731: T2_PLANKS                                                        : Birch Planks
 732: T3_PLANKS                                                        : Chestnut Planks
 733: T4_PLANKS                                                        : Pine Planks
 734: T5_PLANKS                                                        : Cedar Planks
 735: T6_PLANKS                                                        : Bloodoak Planks
 736: T7_PLANKS                                                        : Ashenbark Planks
 737: T8_PLANKS                                                        : Whitewood Planks
 738: T4_PLANKS_LEVEL1@1                                               : Uncommon Pine Planks
 739: T5_PLANKS_LEVEL1@1                                               : Uncommon Cedar Planks
 740: T6_PLANKS_LEVEL1@1                                               : Uncommon Bloodoak Planks
 741: T7_PLANKS_LEVEL1@1                                               : Uncommon Ashenbark Planks
 742: T8_PLANKS_LEVEL1@1                                               : Uncommon Whitewood Planks
 743: T4_PLANKS_LEVEL2@2                                               : Rare Pine Planks
 744: T5_PLANKS_LEVEL2@2                                               : Rare Cedar Planks
 745: T6_PLANKS_LEVEL2@2                                               : Rare Bloodoak Planks
 746: T7_PLANKS_LEVEL2@2                                               : Rare Ashenbark Planks
 747: T8_PLANKS_LEVEL2@2                                               : Rare Whitewood Planks
 748: T4_PLANKS_LEVEL3@3                                               : Exceptional Pine Planks
 749: T5_PLANKS_LEVEL3@3                                               : Exceptional Cedar Planks
 750: T6_PLANKS_LEVEL3@3                                               : Exceptional Bloodoak Planks
 751: T7_PLANKS_LEVEL3@3                                               : Exceptional Ashenbark Planks
 752: T8_PLANKS_LEVEL3@3                                               : Exceptional Whitewood Planks
 753: T2_STONEBLOCK                                                    : Limestone Block
 754: T3_STONEBLOCK                                                    : Sandstone Block
 755: T4_STONEBLOCK                                                    : Travertine Block
 756: T5_STONEBLOCK                                                    : Granite Block
 757: T6_STONEBLOCK                                                    : Slate Block
 758: T7_STONEBLOCK                                                    : Basalt Block
 759: T8_STONEBLOCK                                                    : Marble Block
 760: T2_METALBAR                                                      : Copper Bar
 761: T3_METALBAR                                                      : Bronze Bar
 762: T4_METALBAR                                                      : Steel Bar
 763: T5_METALBAR                                                      : Titanium Steel Bar
 764: T6_METALBAR                                                      : Runite Steel Bar
 765: T7_METALBAR                                                      : Meteorite Steel Bar
 766: T8_METALBAR                                                      : Adamantium Steel Bar
 767: T4_METALBAR_LEVEL1@1                                             : Uncommon Steel Bar
 768: T5_METALBAR_LEVEL1@1                                             : Uncommon Titanium Steel Bar
 769: T6_METALBAR_LEVEL1@1                                             : Uncommon Runite Steel Bar
 770: T7_METALBAR_LEVEL1@1                                             : Uncommon Meteorite Steel Bar
 771: T8_METALBAR_LEVEL1@1                                             : Uncommon Adamantium Steel Bar
 772: T4_METALBAR_LEVEL2@2                                             : Rare Steel Bar
 773: T5_METALBAR_LEVEL2@2                                             : Rare Titanium Steel Bar
 774: T6_METALBAR_LEVEL2@2                                             : Rare Runite Steel Bar
 775: T7_METALBAR_LEVEL2@2                                             : Rare Meteorite Steel Bar
 776: T8_METALBAR_LEVEL2@2                                             : Rare Adamantium Steel Bar
 777: T4_METALBAR_LEVEL3@3                                             : Exceptional Steel Bar
 778: T5_METALBAR_LEVEL3@3                                             : Exceptional Titanium Steel Bar
 779: T6_METALBAR_LEVEL3@3                                             : Exceptional Runite Steel Bar
 780: T7_METALBAR_LEVEL3@3                                             : Exceptional Meteorite Steel Bar
 781: T8_METALBAR_LEVEL3@3                                             : Exceptional Adamantium Steel Bar
 782: T2_LEATHER                                                       : Stiff Leather
 783: T3_LEATHER                                                       : Thick Leather
 784: T4_LEATHER                                                       : Worked Leather
 785: T5_LEATHER                                                       : Cured Leather
 786: T6_LEATHER                                                       : Hardened Leather
 787: T7_LEATHER                                                       : Reinforced Leather
 788: T8_LEATHER                                                       : Fortified Leather
 789: T4_LEATHER_LEVEL1@1                                              : Uncommon Worked Leather
 790: T5_LEATHER_LEVEL1@1                                              : Uncommon Cured Leather
 791: T6_LEATHER_LEVEL1@1                                              : Uncommon Hardened Leather
 792: T7_LEATHER_LEVEL1@1                                              : Uncommon Reinforced Leather
 793: T8_LEATHER_LEVEL1@1                                              : Uncommon Fortified Leather
 794: T4_LEATHER_LEVEL2@2                                              : Rare Worked Leather
 795: T5_LEATHER_LEVEL2@2                                              : Rare Cured Leather
 796: T6_LEATHER_LEVEL2@2                                              : Rare Hardened Leather
 797: T7_LEATHER_LEVEL2@2                                              : Rare Reinforced Leather
 798: T8_LEATHER_LEVEL2@2                                              : Rare Fortified Leather
 799: T4_LEATHER_LEVEL3@3                                              : Exceptional Worked Leather
 800: T5_LEATHER_LEVEL3@3                                              : Exceptional Cured Leather
 801: T6_LEATHER_LEVEL3@3                                              : Exceptional Hardened Leather
 802: T7_LEATHER_LEVEL3@3                                              : Exceptional Reinforced Leather
 803: T8_LEATHER_LEVEL3@3                                              : Exceptional Fortified Leather
 804: T2_CLOTH                                                         : Simple Cloth
 805: T3_CLOTH                                                         : Neat Cloth
 806: T4_CLOTH                                                         : Fine Cloth
 807: T5_CLOTH                                                         : Ornate Cloth
 808: T6_CLOTH                                                         : Lavish Cloth
 809: T7_CLOTH                                                         : Opulent Cloth
 810: T8_CLOTH                                                         : Baroque Cloth
 811: T4_CLOTH_LEVEL1@1                                                : Uncommon Fine Cloth
 812: T5_CLOTH_LEVEL1@1                                                : Uncommon Ornate Cloth
 813: T6_CLOTH_LEVEL1@1                                                : Uncommon Lavish Cloth
 814: T7_CLOTH_LEVEL1@1                                                : Uncommon Opulent Cloth
 815: T8_CLOTH_LEVEL1@1                                                : Uncommon Baroque Cloth
 816: T4_CLOTH_LEVEL2@2                                                : Rare Fine Cloth
 817: T5_CLOTH_LEVEL2@2                                                : Rare Ornate Cloth
 818: T6_CLOTH_LEVEL2@2                                                : Rare Lavish Cloth
 819: T7_CLOTH_LEVEL2@2                                                : Rare Opulent Cloth
 820: T8_CLOTH_LEVEL2@2                                                : Rare Baroque Cloth
 821: T4_CLOTH_LEVEL3@3                                                : Exceptional Fine Cloth
 822: T5_CLOTH_LEVEL3@3                                                : Exceptional Ornate Cloth
 823: T6_CLOTH_LEVEL3@3                                                : Exceptional Lavish Cloth
 824: T7_CLOTH_LEVEL3@3                                                : Exceptional Opulent Cloth
 825: T8_CLOTH_LEVEL3@3                                                : Exceptional Baroque Cloth
 826: T4_ARTEFACT_2H_ARCANESTAFF_HELL                                  : Adept's Occult Orb
 827: T4_ARTEFACT_2H_BOW_HELL                                          : Adept's Demonic Arrowheads
 828: T4_ARTEFACT_2H_BOW_KEEPER                                        : Adept's Carved bone
 829: T4_ARTEFACT_2H_CLEAVER_HELL                                      : Adept's Demonic Blade
 830: T4_ARTEFACT_2H_COMBATSTAFF_MORGANA                               : Adept's Reinforced Morgana Pole
 831: T4_ARTEFACT_2H_CROSSBOWLARGE_MORGANA                             : Adept's Alluring Bolts
 832: T4_ARTEFACT_2H_CURSEDSTAFF_MORGANA                               : Adept's Bloodforged Catalyst
 833: T5_ARTEFACT_2H_CURSEDSTAFF_MORGANA                               : Expert's Bloodforged Catalyst
 834: T6_ARTEFACT_2H_CURSEDSTAFF_MORGANA                               : Master's Bloodforged Catalyst
 835: T7_ARTEFACT_2H_CURSEDSTAFF_MORGANA                               : Grandmaster's Bloodforged Catalyst
 836: T8_ARTEFACT_2H_CURSEDSTAFF_MORGANA                               : Elder's Bloodforged Catalyst
 837: T4_ARTEFACT_2H_DUALAXE_KEEPER                                    : Adept's Keeper Axeheads
 838: T4_ARTEFACT_2H_DUALCROSSBOW_HELL                                 : Adept's Hellish Bolts
 839: T4_ARTEFACT_2H_DUALHAMMER_HELL                                   : Adept's Hellish Hammer Heads
 840: T4_ARTEFACT_2H_DUALSCIMITAR_UNDEAD                               : Adept's Cursed Blades
 841: T4_ARTEFACT_2H_DUALSICKLE_UNDEAD                                 : Adept's Ghastly Blades
 842: T4_ARTEFACT_2H_ENIGMATICORB_MORGANA                              : Adept's Possessed Catalyst
 843: T4_ARTEFACT_2H_FIRESTAFF_HELL                                    : Adept's Burning Orb
 844: T4_ARTEFACT_2H_HALBERD_MORGANA                                   : Adept's Morgana Halberd Head
 845: T4_ARTEFACT_2H_HAMMER_UNDEAD                                     : Adept's Ancient Hammer Head
 846: T4_ARTEFACT_2H_HARPOON_HELL                                      : Adept's Infernal Harpoon Tip
 847: T4_ARTEFACT_MAIN_HOLYSTAFF_MORGANA                               : Adept's Possessed Scroll
 848: T4_ARTEFACT_2H_HOLYSTAFF_HELL                                    : Adept's Infernal Scroll
 849: T4_ARTEFACT_2H_HOLYSTAFF_UNDEAD                                  : Adept's Ghastly Scroll
 850: T4_ARTEFACT_2H_ICECRYSTAL_UNDEAD                                 : Adept's Cursed Frozen Crystal
 851: T4_ARTEFACT_2H_ICEGAUNTLETS_HELL                                 : Adept's Icicle Orb
 852: T4_ARTEFACT_2H_INFERNOSTAFF_MORGANA                              : Adept's Unholy Scroll
 853: T4_ARTEFACT_2H_IRONGAUNTLETS_HELL                                : Adept's Black Leather
 854: T4_ARTEFACT_2H_LONGBOW_UNDEAD                                    : Adept's Ghastly Arrows
 855: T4_ARTEFACT_2H_MACE_MORGANA                                      : Adept's Imbued Mace Head
 856: T4_ARTEFACT_2H_NATURESTAFF_HELL                                  : Adept's Symbol of Blight
 857: T4_ARTEFACT_2H_NATURESTAFF_KEEPER                                : Adept's Preserved Log
 858: T4_ARTEFACT_2H_RAM_KEEPER                                        : Adept's Engraved Log
 859: T4_ARTEFACT_2H_REPEATINGCROSSBOW_UNDEAD                          : Adept's Lost Crossbow Mechanism
 860: T4_ARTEFACT_2H_ROCKSTAFF_KEEPER                                  : Adept's Preserved Rocks
 861: T4_ARTEFACT_2H_SKULLORB_HELL                                     : Adept's Cursed Jawbone
 862: T4_ARTEFACT_2H_TRIDENT_UNDEAD                                    : Adept's Cursed Barbs
 863: T4_ARTEFACT_2H_TWINSCYTHE_HELL                                   : Adept's Hellish Sicklehead Pair
 864: T4_ARTEFACT_MAIN_ARCANESTAFF_UNDEAD                              : Adept's Lost Arcane Crystal
 865: T4_ARTEFACT_MAIN_CURSEDSTAFF_UNDEAD                              : Adept's Lost Cursed Crystal
 866: T4_ARTEFACT_MAIN_FIRESTAFF_KEEPER                                : Adept's Wildfire Orb
 867: T4_ARTEFACT_MAIN_FROSTSTAFF_KEEPER                               : Adept's Hoarfrost Orb
 868: T4_ARTEFACT_MAIN_MACE_HELL                                       : Adept's Infernal Mace Head
 869: T4_ARTEFACT_MAIN_NATURESTAFF_KEEPER                              : Adept's Druidic Inscriptions
 870: T4_ARTEFACT_MAIN_RAPIER_MORGANA                                  : Adept's Hardened Debole
 871: T4_ARTEFACT_MAIN_ROCKMACE_KEEPER                                 : Adept's Runed Rock
 872: T4_ARTEFACT_MAIN_SCIMITAR_MORGANA                                : Adept's Bloodforged Blade
 873: T4_ARTEFACT_MAIN_SPEAR_KEEPER                                    : Adept's Keeper Spearhead
 874: T5_ARTEFACT_2H_ARCANESTAFF_HELL                                  : Expert's Occult Orb
 875: T5_ARTEFACT_2H_BOW_HELL                                          : Expert's Demonic Arrowheads
 876: T5_ARTEFACT_2H_BOW_KEEPER                                        : Expert's Carved bone
 877: T5_ARTEFACT_2H_CLEAVER_HELL                                      : Expert's Demonic Blade
 878: T5_ARTEFACT_2H_COMBATSTAFF_MORGANA                               : Expert's Reinforced Morgana Pole
 879: T5_ARTEFACT_2H_CROSSBOWLARGE_MORGANA                             : Expert's Alluring Bolts
 880: T5_ARTEFACT_2H_DUALAXE_KEEPER                                    : Expert's Keeper Axeheads
 881: T5_ARTEFACT_2H_DUALCROSSBOW_HELL                                 : Expert's Hellish Bolts
 882: T5_ARTEFACT_2H_DUALHAMMER_HELL                                   : Expert's Hellish Hammer Heads
 883: T5_ARTEFACT_2H_DUALSCIMITAR_UNDEAD                               : Expert's Cursed Blades
 884: T5_ARTEFACT_2H_DUALSICKLE_UNDEAD                                 : Expert's Ghastly Blades
 885: T5_ARTEFACT_2H_ENIGMATICORB_MORGANA                              : Expert's Possessed Catalyst
 886: T5_ARTEFACT_2H_FIRESTAFF_HELL                                    : Expert's Burning Orb
 887: T5_ARTEFACT_2H_HALBERD_MORGANA                                   : Expert's Morgana Halberd Head
 888: T5_ARTEFACT_2H_HAMMER_UNDEAD                                     : Expert's Ancient Hammer Head
 889: T5_ARTEFACT_2H_HARPOON_HELL                                      : Expert's Infernal Harpoon Tip
 890: T5_ARTEFACT_MAIN_HOLYSTAFF_MORGANA                               : Expert's Possessed Scroll
 891: T5_ARTEFACT_2H_HOLYSTAFF_HELL                                    : Expert's Infernal Scroll
 892: T5_ARTEFACT_2H_HOLYSTAFF_UNDEAD                                  : Expert's Ghastly Scroll
 893: T5_ARTEFACT_2H_ICECRYSTAL_UNDEAD                                 : Expert's Cursed Frozen Crystal
 894: T5_ARTEFACT_2H_ICEGAUNTLETS_HELL                                 : Expert's Icicle Orb
 895: T5_ARTEFACT_2H_INFERNOSTAFF_MORGANA                              : Expert's Unholy Scroll
 896: T5_ARTEFACT_2H_IRONGAUNTLETS_HELL                                : Expert's Black Leather
 897: T5_ARTEFACT_2H_LONGBOW_UNDEAD                                    : Expert's Ghastly Arrows
 898: T5_ARTEFACT_2H_MACE_MORGANA                                      : Expert's Imbued Mace Head
 899: T5_ARTEFACT_2H_NATURESTAFF_HELL                                  : Expert's Symbol of Blight
 900: T5_ARTEFACT_2H_NATURESTAFF_KEEPER                                : Expert's Preserved Log
 901: T5_ARTEFACT_2H_RAM_KEEPER                                        : Expert's Engraved Log
 902: T5_ARTEFACT_2H_REPEATINGCROSSBOW_UNDEAD                          : Expert's Lost Crossbow Mechanism
 903: T5_ARTEFACT_2H_ROCKSTAFF_KEEPER                                  : Expert's Preserved Rocks
 904: T4_ARTEFACT_2H_SCYTHE_HELL                                       : Adept's Hellish Sicklehead
 905: T5_ARTEFACT_2H_SCYTHE_HELL                                       : Expert's Hellish Sicklehead
 906: T6_ARTEFACT_2H_SCYTHE_HELL                                       : Master's Hellish Sicklehead
 907: T7_ARTEFACT_2H_SCYTHE_HELL                                       : Grandmaster's Hellish Sicklehead
 908: T8_ARTEFACT_2H_SCYTHE_HELL                                       : Elder's Hellish Sicklehead
 909: T5_ARTEFACT_2H_SKULLORB_HELL                                     : Expert's Cursed Jawbone
 910: T5_ARTEFACT_2H_TRIDENT_UNDEAD                                    : Expert's Cursed Barbs
 911: T5_ARTEFACT_2H_TWINSCYTHE_HELL                                   : Expert's Hellish Sicklehead Pair
 912: T5_ARTEFACT_MAIN_ARCANESTAFF_UNDEAD                              : Expert's Lost Arcane Crystal
 913: T5_ARTEFACT_MAIN_CURSEDSTAFF_UNDEAD                              : Expert's Lost Cursed Crystal
 914: T5_ARTEFACT_MAIN_FIRESTAFF_KEEPER                                : Expert's Wildfire Orb
 915: T5_ARTEFACT_MAIN_FROSTSTAFF_KEEPER                               : Expert's Hoarfrost Orb
 916: T5_ARTEFACT_MAIN_MACE_HELL                                       : Expert's Infernal Mace Head
 917: T5_ARTEFACT_MAIN_NATURESTAFF_KEEPER                              : Expert's Druidic Inscriptions
 918: T5_ARTEFACT_MAIN_RAPIER_MORGANA                                  : Expert's Hardened Debole
 919: T5_ARTEFACT_MAIN_ROCKMACE_KEEPER                                 : Expert's Runed Rock
 920: T5_ARTEFACT_MAIN_SCIMITAR_MORGANA                                : Expert's Bloodforged Blade
 921: T5_ARTEFACT_MAIN_SPEAR_KEEPER                                    : Expert's Keeper Spearhead
 922: T6_ARTEFACT_2H_ARCANESTAFF_HELL                                  : Master's Occult Orb
 923: T6_ARTEFACT_2H_BOW_HELL                                          : Master's Demonic Arrowheads
 924: T6_ARTEFACT_2H_BOW_KEEPER                                        : Master's Carved bone
 925: T6_ARTEFACT_2H_CLEAVER_HELL                                      : Master's Demonic Blade
 926: T6_ARTEFACT_2H_COMBATSTAFF_MORGANA                               : Master's Reinforced Morgana Pole
 927: T6_ARTEFACT_2H_CROSSBOWLARGE_MORGANA                             : Master's Alluring Bolts
 928: T6_ARTEFACT_2H_DUALAXE_KEEPER                                    : Master's Keeper Axeheads
 929: T6_ARTEFACT_2H_DUALCROSSBOW_HELL                                 : Master's Hellish Bolts
 930: T6_ARTEFACT_2H_DUALHAMMER_HELL                                   : Master's Hellish Hammer Heads
 931: T6_ARTEFACT_2H_DUALSCIMITAR_UNDEAD                               : Master's Cursed Blades
 932: T6_ARTEFACT_2H_DUALSICKLE_UNDEAD                                 : Master's Ghastly Blades
 933: T6_ARTEFACT_2H_ENIGMATICORB_MORGANA                              : Master's Possessed Catalyst
 934: T6_ARTEFACT_2H_FIRESTAFF_HELL                                    : Master's Burning Orb
 935: T6_ARTEFACT_2H_HALBERD_MORGANA                                   : Master's Morgana Halberd Head
 936: T6_ARTEFACT_2H_HAMMER_UNDEAD                                     : Master's Ancient Hammer Head
 937: T6_ARTEFACT_2H_HARPOON_HELL                                      : Master's Infernal Harpoon Tip
 938: T6_ARTEFACT_MAIN_HOLYSTAFF_MORGANA                               : Master's Possessed Scroll
 939: T6_ARTEFACT_2H_HOLYSTAFF_HELL                                    : Master's Infernal Scroll
 940: T6_ARTEFACT_2H_HOLYSTAFF_UNDEAD                                  : Master's Ghastly Scroll
 941: T6_ARTEFACT_2H_ICECRYSTAL_UNDEAD                                 : Master's Cursed Frozen Crystal
 942: T6_ARTEFACT_2H_ICEGAUNTLETS_HELL                                 : Master's Icicle Orb
 943: T6_ARTEFACT_2H_INFERNOSTAFF_MORGANA                              : Master's Unholy Scroll
 944: T6_ARTEFACT_2H_IRONGAUNTLETS_HELL                                : Master's Black Leather
 945: T6_ARTEFACT_2H_LONGBOW_UNDEAD                                    : Master's Ghastly Arrows
 946: T6_ARTEFACT_2H_MACE_MORGANA                                      : Master's Imbued Mace Head
 947: T6_ARTEFACT_2H_NATURESTAFF_HELL                                  : Master's Symbol of Blight
 948: T6_ARTEFACT_2H_NATURESTAFF_KEEPER                                : Master's Preserved Log
 949: T6_ARTEFACT_2H_RAM_KEEPER                                        : Master's Engraved Log
 950: T6_ARTEFACT_2H_REPEATINGCROSSBOW_UNDEAD                          : Master's Lost Crossbow Mechanism
 951: T6_ARTEFACT_2H_ROCKSTAFF_KEEPER                                  : Master's Preserved Rocks
 952: T6_ARTEFACT_2H_SKULLORB_HELL                                     : Master's Cursed Jawbone
 953: T6_ARTEFACT_2H_TRIDENT_UNDEAD                                    : Master's Cursed Barbs
 954: T6_ARTEFACT_2H_TWINSCYTHE_HELL                                   : Master's Hellish Sicklehead Pair
 955: T6_ARTEFACT_MAIN_ARCANESTAFF_UNDEAD                              : Master's Lost Arcane Crystal
 956: T6_ARTEFACT_MAIN_CURSEDSTAFF_UNDEAD                              : Master's Lost Cursed Crystal
 957: T6_ARTEFACT_MAIN_FIRESTAFF_KEEPER                                : Master's Wildfire Orb
 958: T6_ARTEFACT_MAIN_FROSTSTAFF_KEEPER                               : Master's Hoarfrost Orb
 959: T6_ARTEFACT_MAIN_MACE_HELL                                       : Master's Infernal Mace Head
 960: T6_ARTEFACT_MAIN_NATURESTAFF_KEEPER                              : Master's Druidic Inscriptions
 961: T6_ARTEFACT_MAIN_RAPIER_MORGANA                                  : Master's Hardened Debole
 962: T6_ARTEFACT_MAIN_ROCKMACE_KEEPER                                 : Master's Runed Rock
 963: T6_ARTEFACT_MAIN_SCIMITAR_MORGANA                                : Master's Bloodforged Blade
 964: T6_ARTEFACT_MAIN_SPEAR_KEEPER                                    : Master's Keeper Spearhead
 965: T7_ARTEFACT_2H_ARCANESTAFF_HELL                                  : Grandmaster's Occult Orb
 966: T7_ARTEFACT_2H_BOW_HELL                                          : Grandmaster's Demonic Arrowheads
 967: T7_ARTEFACT_2H_BOW_KEEPER                                        : Grandmaster's Carved Bone
 968: T7_ARTEFACT_2H_CLEAVER_HELL                                      : Grandmaster's Demonic Blade
 969: T7_ARTEFACT_2H_COMBATSTAFF_MORGANA                               : Grandmaster's Reinforced Morgana Pole
 970: T7_ARTEFACT_2H_CROSSBOWLARGE_MORGANA                             : Grandmaster's Alluring Bolts
 971: T7_ARTEFACT_2H_DUALAXE_KEEPER                                    : Grandmaster's Keeper Axeheads
 972: T7_ARTEFACT_2H_DUALCROSSBOW_HELL                                 : Grandmaster's Hellish Bolts
 973: T7_ARTEFACT_2H_DUALHAMMER_HELL                                   : Grandmaster's Hellish Hammer Heads
 974: T7_ARTEFACT_2H_DUALSCIMITAR_UNDEAD                               : Grandmaster's Cursed Blades
 975: T7_ARTEFACT_2H_DUALSICKLE_UNDEAD                                 : Grandmaster's Ghastly Blades
 976: T7_ARTEFACT_2H_ENIGMATICORB_MORGANA                              : Grandmaster's Possessed Catalyst
 977: T7_ARTEFACT_2H_FIRESTAFF_HELL                                    : Grandmaster's Burning Orb
 978: T7_ARTEFACT_2H_HALBERD_MORGANA                                   : Grandmaster's Morgana Halberd Head
 979: T7_ARTEFACT_2H_HAMMER_UNDEAD                                     : Grandmaster's Ancient Hammer Head
 980: T7_ARTEFACT_2H_HARPOON_HELL                                      : Grandmaster's Infernal Harpoon Tip
 981: T7_ARTEFACT_MAIN_HOLYSTAFF_MORGANA                               : Grandmaster's Possessed Scroll
 982: T7_ARTEFACT_2H_HOLYSTAFF_HELL                                    : Grandmaster's Infernal Scroll
 983: T7_ARTEFACT_2H_HOLYSTAFF_UNDEAD                                  : Grandmaster's Ghastly Scroll
 984: T7_ARTEFACT_2H_ICECRYSTAL_UNDEAD                                 : Grandmaster's Cursed Frozen Crystal
 985: T7_ARTEFACT_2H_ICEGAUNTLETS_HELL                                 : Grandmaster's Icicle Orb
 986: T7_ARTEFACT_2H_INFERNOSTAFF_MORGANA                              : Grandmaster's Unholy Scroll
 987: T7_ARTEFACT_2H_IRONGAUNTLETS_HELL                                : Grandmaster's Black Leather
 988: T7_ARTEFACT_2H_LONGBOW_UNDEAD                                    : Grandmaster's Ghastly Arrows
 989: T7_ARTEFACT_2H_MACE_MORGANA                                      : Grandmaster's Imbued Mace Head
 990: T7_ARTEFACT_2H_NATURESTAFF_HELL                                  : Grandmaster's Symbol of Blight
 991: T7_ARTEFACT_2H_NATURESTAFF_KEEPER                                : Grandmaster's Preserved Log
 992: T7_ARTEFACT_2H_RAM_KEEPER                                        : Grandmaster's Engraved Log
 993: T7_ARTEFACT_2H_REPEATINGCROSSBOW_UNDEAD                          : Grandmaster's Lost Crossbow Mechanism
 994: T7_ARTEFACT_2H_ROCKSTAFF_KEEPER                                  : Grandmaster's Preserved Rocks
 995: T7_ARTEFACT_2H_SKULLORB_HELL                                     : Grandmaster's Cursed Jawbone
 996: T7_ARTEFACT_2H_TRIDENT_UNDEAD                                    : Grandmaster's Cursed Barbs
 997: T7_ARTEFACT_2H_TWINSCYTHE_HELL                                   : Grandmaster's Hellish Sicklehead Pair
 998: T7_ARTEFACT_MAIN_ARCANESTAFF_UNDEAD                              : Grandmaster's Lost Arcane Crystal
 999: T7_ARTEFACT_MAIN_CURSEDSTAFF_UNDEAD                              : Grandmaster's Lost Cursed Crystal
1000: T7_ARTEFACT_MAIN_FIRESTAFF_KEEPER                                : Grandmaster's Wildfire Orb
1001: T7_ARTEFACT_MAIN_FROSTSTAFF_KEEPER                               : Grandmaster's Hoarfrost Orb
1002: T7_ARTEFACT_MAIN_MACE_HELL                                       : Grandmaster's Infernal Mace Head
1003: T7_ARTEFACT_MAIN_NATURESTAFF_KEEPER                              : Grandmaster's Druidic Inscriptions
1004: T7_ARTEFACT_MAIN_RAPIER_MORGANA                                  : Grandmaster's Hardened Debole
1005: T7_ARTEFACT_MAIN_ROCKMACE_KEEPER                                 : Grandmaster's Runed Rock
1006: T7_ARTEFACT_MAIN_SCIMITAR_MORGANA                                : Grandmaster's Bloodforged Blade
1007: T7_ARTEFACT_MAIN_SPEAR_KEEPER                                    : Grandmaster's Keeper Spearhead
1008: T8_ARTEFACT_2H_ARCANESTAFF_HELL                                  : Elder's Occult Orb
1009: T8_ARTEFACT_2H_BOW_HELL                                          : Elder's Demonic Arrowheads
1010: T8_ARTEFACT_2H_BOW_KEEPER                                        : Elder's Carved bone
1011: T8_ARTEFACT_2H_CLEAVER_HELL                                      : Elder's Demonic Blade
1012: T8_ARTEFACT_2H_COMBATSTAFF_MORGANA                               : Elder's Reinforced Morgana Pole
1013: T8_ARTEFACT_2H_CROSSBOWLARGE_MORGANA                             : Elder's Alluring Bolts
1014: T8_ARTEFACT_2H_DUALAXE_KEEPER                                    : Elder's Keeper Axeheads
1015: T8_ARTEFACT_2H_DUALCROSSBOW_HELL                                 : Elder's Hellish Bolts
1016: T8_ARTEFACT_2H_DUALHAMMER_HELL                                   : Elder's Hellish Hammer Heads
1017: T8_ARTEFACT_2H_DUALSCIMITAR_UNDEAD                               : Elder's Cursed Blades
1018: T8_ARTEFACT_2H_DUALSICKLE_UNDEAD                                 : Elder's Ghastly Blades
1019: T8_ARTEFACT_2H_ENIGMATICORB_MORGANA                              : Elder's Possessed Catalyst
1020: T8_ARTEFACT_2H_FIRESTAFF_HELL                                    : Elder's Burning Orb
1021: T8_ARTEFACT_2H_HALBERD_MORGANA                                   : Elder's Morgana Halberd Head
1022: T8_ARTEFACT_2H_HAMMER_UNDEAD                                     : Elder's Ancient Hammer Head
1023: T8_ARTEFACT_2H_HARPOON_HELL                                      : Elder's Infernal Harpoon Tip
1024: T8_ARTEFACT_MAIN_HOLYSTAFF_MORGANA                               : Elder's Possessed Scroll
1025: T8_ARTEFACT_2H_HOLYSTAFF_HELL                                    : Elder's Infernal Scroll
1026: T8_ARTEFACT_2H_HOLYSTAFF_UNDEAD                                  : Elder's Ghastly Scroll
1027: T8_ARTEFACT_2H_ICECRYSTAL_UNDEAD                                 : Elder's Cursed Frozen Crystal
1028: T8_ARTEFACT_2H_ICEGAUNTLETS_HELL                                 : Elder's Icicle Orb
1029: T8_ARTEFACT_2H_INFERNOSTAFF_MORGANA                              : Elder's Unholy Scroll
1030: T8_ARTEFACT_2H_IRONGAUNTLETS_HELL                                : Elder's Black Leather
1031: T8_ARTEFACT_2H_LONGBOW_UNDEAD                                    : Elder's Ghastly Arrows
1032: T8_ARTEFACT_2H_MACE_MORGANA                                      : Elder's Imbued Mace Head
1033: T8_ARTEFACT_2H_NATURESTAFF_HELL                                  : Elder's Symbol of Blight
1034: T8_ARTEFACT_2H_NATURESTAFF_KEEPER                                : Elder's Preserved Log
1035: T8_ARTEFACT_2H_RAM_KEEPER                                        : Elder's Engraved Log
1036: T8_ARTEFACT_2H_REPEATINGCROSSBOW_UNDEAD                          : Elder's Lost Crossbow Mechanism
1037: T8_ARTEFACT_2H_ROCKSTAFF_KEEPER                                  : Elder's Preserved Rocks
1038: T8_ARTEFACT_2H_SKULLORB_HELL                                     : Elder's Cursed Jawbone
1039: T8_ARTEFACT_2H_TRIDENT_UNDEAD                                    : Elder's Cursed Barbs
1040: T8_ARTEFACT_2H_TWINSCYTHE_HELL                                   : Elder's Hellish Sicklehead Pair
1041: T8_ARTEFACT_MAIN_ARCANESTAFF_UNDEAD                              : Elder's Lost Arcane Crystal
1042: T8_ARTEFACT_MAIN_CURSEDSTAFF_UNDEAD                              : Elder's Lost Cursed Crystal
1043: T8_ARTEFACT_MAIN_FIRESTAFF_KEEPER                                : Elder's Wildfire Orb
1044: T8_ARTEFACT_MAIN_FROSTSTAFF_KEEPER                               : Elder's Hoarfrost Orb
1045: T8_ARTEFACT_MAIN_MACE_HELL                                       : Elder's Infernal Mace Head
1046: T8_ARTEFACT_MAIN_NATURESTAFF_KEEPER                              : Elder's Druidic Inscriptions
1047: T8_ARTEFACT_MAIN_RAPIER_MORGANA                                  : Elder's Hardened Debole
1048: T8_ARTEFACT_MAIN_ROCKMACE_KEEPER                                 : Elder's Runed Rock
1049: T8_ARTEFACT_MAIN_SCIMITAR_MORGANA                                : Elder's Bloodforged Blade
1050: T8_ARTEFACT_MAIN_SPEAR_KEEPER                                    : Elder's Keeper Spearhead
1051: T4_ARTEFACT_OFF_TOWERSHIELD_UNDEAD                               : Adept's Ancient Shield Core
1052: T5_ARTEFACT_OFF_TOWERSHIELD_UNDEAD                               : Expert's Ancient Shield Core
1053: T6_ARTEFACT_OFF_TOWERSHIELD_UNDEAD                               : Master's Ancient Shield Core
1054: T7_ARTEFACT_OFF_TOWERSHIELD_UNDEAD                               : Grandmaster's Ancient Shield Core
1055: T8_ARTEFACT_OFF_TOWERSHIELD_UNDEAD                               : Elder's Ancient Shield Core
1056: T4_ARTEFACT_OFF_SHIELD_HELL                                      : Adept's Infernal Shield Core
1057: T5_ARTEFACT_OFF_SHIELD_HELL                                      : Expert's Infernal Shield Core
1058: T6_ARTEFACT_OFF_SHIELD_HELL                                      : Master's Infernal Shield Core
1059: T7_ARTEFACT_OFF_SHIELD_HELL                                      : Grandmaster's Infernal Shield Core
1060: T8_ARTEFACT_OFF_SHIELD_HELL                                      : Elder's Infernal Shield Core
1061: T4_ARTEFACT_OFF_SPIKEDSHIELD_MORGANA                             : Adept's Bloodforged Spikes
1062: T5_ARTEFACT_OFF_SPIKEDSHIELD_MORGANA                             : Expert's Bloodforged Spikes
1063: T6_ARTEFACT_OFF_SPIKEDSHIELD_MORGANA                             : Master's Bloodforged Spikes
1064: T7_ARTEFACT_OFF_SPIKEDSHIELD_MORGANA                             : Grandmaster's Bloodforged Spikes
1065: T8_ARTEFACT_OFF_SPIKEDSHIELD_MORGANA                             : Elder's Bloodforged Spikes
1066: T4_ARTEFACT_OFF_ORB_MORGANA                                      : Adept's Alluring Crystal
1067: T5_ARTEFACT_OFF_ORB_MORGANA                                      : Expert's Alluring Crystal
1068: T6_ARTEFACT_OFF_ORB_MORGANA                                      : Master's Alluring Crystal
1069: T7_ARTEFACT_OFF_ORB_MORGANA                                      : Grandmaster's Alluring Crystal
1070: T8_ARTEFACT_OFF_ORB_MORGANA                                      : Elder's Alluring Crystal
1071: T4_ARTEFACT_OFF_DEMONSKULL_HELL                                  : Adept's Demonic Jawbone
1072: T5_ARTEFACT_OFF_DEMONSKULL_HELL                                  : Expert's Demonic Jawbone
1073: T6_ARTEFACT_OFF_DEMONSKULL_HELL                                  : Master's Demonic Jawbone
1074: T7_ARTEFACT_OFF_DEMONSKULL_HELL                                  : Grandmaster's Demonic Jawbone
1075: T8_ARTEFACT_OFF_DEMONSKULL_HELL                                  : Elder's Demonic Jawbone
1076: T4_ARTEFACT_OFF_TOTEM_KEEPER                                     : Adept's Inscribed Stone
1077: T5_ARTEFACT_OFF_TOTEM_KEEPER                                     : Expert's Inscribed Stone
1078: T6_ARTEFACT_OFF_TOTEM_KEEPER                                     : Master's Inscribed Stone
1079: T7_ARTEFACT_OFF_TOTEM_KEEPER                                     : Grandmaster's Inscribed Stone
1080: T8_ARTEFACT_OFF_TOTEM_KEEPER                                     : Elder's Inscribed Stone
1081: T4_ARTEFACT_OFF_HORN_KEEPER                                      : Adept's Runed Horn
1082: T5_ARTEFACT_OFF_HORN_KEEPER                                      : Expert's Runed Horn
1083: T6_ARTEFACT_OFF_HORN_KEEPER                                      : Master's Runed Horn
1084: T7_ARTEFACT_OFF_HORN_KEEPER                                      : Grandmaster's Runed Horn
1085: T8_ARTEFACT_OFF_HORN_KEEPER                                      : Elder's Runed Horn
1086: T4_ARTEFACT_OFF_JESTERCANE_HELL                                  : Adept's Hellish Handle
1087: T5_ARTEFACT_OFF_JESTERCANE_HELL                                  : Expert's Hellish Handle
1088: T6_ARTEFACT_OFF_JESTERCANE_HELL                                  : Master's Hellish Handle
1089: T7_ARTEFACT_OFF_JESTERCANE_HELL                                  : Grandmaster's Hellish Handle
1090: T8_ARTEFACT_OFF_JESTERCANE_HELL                                  : Elder's Hellish Handle
1091: T4_ARTEFACT_OFF_LAMP_UNDEAD                                      : Adept's Ghastly Candle
1092: T5_ARTEFACT_OFF_LAMP_UNDEAD                                      : Expert's Ghastly Candle
1093: T6_ARTEFACT_OFF_LAMP_UNDEAD                                      : Master's Ghastly Candle
1094: T7_ARTEFACT_OFF_LAMP_UNDEAD                                      : Grandmaster's Ghastly Candle
1095: T8_ARTEFACT_OFF_LAMP_UNDEAD                                      : Elder's Ghastly Candle
1096: T4_ARTEFACT_HEAD_PLATE_UNDEAD                                    : Adept's Ancient Padding
1097: T5_ARTEFACT_HEAD_PLATE_UNDEAD                                    : Expert's Ancient Padding
1098: T6_ARTEFACT_HEAD_PLATE_UNDEAD                                    : Master's Ancient Padding
1099: T7_ARTEFACT_HEAD_PLATE_UNDEAD                                    : Grandmaster's Ancient Padding
1100: T8_ARTEFACT_HEAD_PLATE_UNDEAD                                    : Elder's Ancient Padding
1101: T4_ARTEFACT_ARMOR_PLATE_UNDEAD                                   : Adept's Ancient Chain Rings
1102: T5_ARTEFACT_ARMOR_PLATE_UNDEAD                                   : Expert's Ancient Chain Rings
1103: T6_ARTEFACT_ARMOR_PLATE_UNDEAD                                   : Master's Ancient Chain Rings
1104: T7_ARTEFACT_ARMOR_PLATE_UNDEAD                                   : Grandmaster's Ancient Chain Rings
1105: T8_ARTEFACT_ARMOR_PLATE_UNDEAD                                   : Elder's Ancient Chain Rings
1106: T4_ARTEFACT_SHOES_PLATE_UNDEAD                                   : Adept's Ancient Bindings
1107: T5_ARTEFACT_SHOES_PLATE_UNDEAD                                   : Expert's Ancient Bindings
1108: T6_ARTEFACT_SHOES_PLATE_UNDEAD                                   : Master's Ancient Bindings
1109: T7_ARTEFACT_SHOES_PLATE_UNDEAD                                   : Grandmaster's Ancient Bindings
1110: T8_ARTEFACT_SHOES_PLATE_UNDEAD                                   : Elder's Ancient Bindings
1111: T4_ARTEFACT_HEAD_PLATE_HELL                                      : Adept's Demonic Scraps
1112: T5_ARTEFACT_HEAD_PLATE_HELL                                      : Expert's Demonic Scraps
1113: T6_ARTEFACT_HEAD_PLATE_HELL                                      : Master's Demonic Scraps
1114: T7_ARTEFACT_HEAD_PLATE_HELL                                      : Grandmaster's Demonic Scraps
1115: T8_ARTEFACT_HEAD_PLATE_HELL                                      : Elder's Demonic Scraps
1116: T4_ARTEFACT_ARMOR_PLATE_HELL                                     : Adept's Demonic Plates
1117: T5_ARTEFACT_ARMOR_PLATE_HELL                                     : Expert's Demonic Plates
1118: T6_ARTEFACT_ARMOR_PLATE_HELL                                     : Master's Demonic Plates
1119: T7_ARTEFACT_ARMOR_PLATE_HELL                                     : Grandmaster's Demonic Plates
1120: T8_ARTEFACT_ARMOR_PLATE_HELL                                     : Elder's Demonic Plates
1121: T4_ARTEFACT_SHOES_PLATE_HELL                                     : Adept's Demonic Filling
1122: T5_ARTEFACT_SHOES_PLATE_HELL                                     : Expert's Demonic Filling
1123: T6_ARTEFACT_SHOES_PLATE_HELL                                     : Master's Demonic Filling
1124: T7_ARTEFACT_SHOES_PLATE_HELL                                     : Grandmaster's Demonic Filling
1125: T8_ARTEFACT_SHOES_PLATE_HELL                                     : Elder's Demonic Filling
1126: T4_ARTEFACT_HEAD_PLATE_KEEPER                                    : Adept's Carved Skull Padding
1127: T5_ARTEFACT_HEAD_PLATE_KEEPER                                    : Expert's Carved Skull Padding
1128: T6_ARTEFACT_HEAD_PLATE_KEEPER                                    : Master's Carved Skull Padding
1129: T7_ARTEFACT_HEAD_PLATE_KEEPER                                    : Grandmaster's Carved Skull Padding
1130: T8_ARTEFACT_HEAD_PLATE_KEEPER                                    : Elder's Carved Skull Padding
1131: T4_ARTEFACT_ARMOR_PLATE_KEEPER                                   : Adept's Preserved Animal Fur
1132: T5_ARTEFACT_ARMOR_PLATE_KEEPER                                   : Expert's Preserved Animal Fur
1133: T6_ARTEFACT_ARMOR_PLATE_KEEPER                                   : Master's Preserved Animal Fur
1134: T7_ARTEFACT_ARMOR_PLATE_KEEPER                                   : Grandmaster's Preserved Animal Fur
1135: T8_ARTEFACT_ARMOR_PLATE_KEEPER                                   : Elder's Preserved Animal Fur
1136: T4_ARTEFACT_SHOES_PLATE_KEEPER                                   : Adept's Inscribed Bindings
1137: T5_ARTEFACT_SHOES_PLATE_KEEPER                                   : Expert's Inscribed Bindings
1138: T6_ARTEFACT_SHOES_PLATE_KEEPER                                   : Master's Inscribed Bindings
1139: T7_ARTEFACT_SHOES_PLATE_KEEPER                                   : Grandmaster's Inscribed Bindings
1140: T8_ARTEFACT_SHOES_PLATE_KEEPER                                   : Elder's Inscribed Bindings
1141: T4_ARTEFACT_HEAD_PLATE_AVALON                                    : Adept's Exalted Visor
1142: T5_ARTEFACT_HEAD_PLATE_AVALON                                    : Expert's Exalted Visor
1143: T6_ARTEFACT_HEAD_PLATE_AVALON                                    : Master's Exalted Visor
1144: T7_ARTEFACT_HEAD_PLATE_AVALON                                    : Grandmaster's Exalted Visor
1145: T8_ARTEFACT_HEAD_PLATE_AVALON                                    : Elder's Exalted Visor
1146: T4_ARTEFACT_ARMOR_PLATE_AVALON                                   : Adept's Exalted Plating
1147: T5_ARTEFACT_ARMOR_PLATE_AVALON                                   : Expert's Exalted Plating
1148: T6_ARTEFACT_ARMOR_PLATE_AVALON                                   : Master's Exalted Plating
1149: T7_ARTEFACT_ARMOR_PLATE_AVALON                                   : Grandmaster's Exalted Plating
1150: T8_ARTEFACT_ARMOR_PLATE_AVALON                                   : Elder's Exalted Plating
1151: T4_ARTEFACT_SHOES_PLATE_AVALON                                   : Adept's Exalted Greave
1152: T5_ARTEFACT_SHOES_PLATE_AVALON                                   : Expert's Exalted Greave
1153: T6_ARTEFACT_SHOES_PLATE_AVALON                                   : Master's Exalted Greave
1154: T7_ARTEFACT_SHOES_PLATE_AVALON                                   : Grandmaster's Exalted Greave
1155: T8_ARTEFACT_SHOES_PLATE_AVALON                                   : Elder's Exalted Greave
1156: T4_ARTEFACT_HEAD_LEATHER_MORGANA                                 : Adept's Imbued Visor
1157: T5_ARTEFACT_HEAD_LEATHER_MORGANA                                 : Expert's Imbued Visor
1158: T6_ARTEFACT_HEAD_LEATHER_MORGANA                                 : Master's Imbued Visor
1159: T7_ARTEFACT_HEAD_LEATHER_MORGANA                                 : Grandmaster's Imbued Visor
1160: T8_ARTEFACT_HEAD_LEATHER_MORGANA                                 : Elder's Imbued Visor
1161: T4_ARTEFACT_ARMOR_LEATHER_MORGANA                                : Adept's Imbued Leather Folds
1162: T5_ARTEFACT_ARMOR_LEATHER_MORGANA                                : Expert's Imbued Leather Folds
1163: T6_ARTEFACT_ARMOR_LEATHER_MORGANA                                : Master's Imbued Leather Folds
1164: T7_ARTEFACT_ARMOR_LEATHER_MORGANA                                : Grandmaster's Imbued Leather Folds
1165: T8_ARTEFACT_ARMOR_LEATHER_MORGANA                                : Elder's Imbued Leather Folds
1166: T4_ARTEFACT_SHOES_LEATHER_MORGANA                                : Adept's Imbued Soles
1167: T5_ARTEFACT_SHOES_LEATHER_MORGANA                                : Expert's Imbued Soles
1168: T6_ARTEFACT_SHOES_LEATHER_MORGANA                                : Master's Imbued Soles
1169: T7_ARTEFACT_SHOES_LEATHER_MORGANA                                : Grandmaster's Imbued Soles
1170: T8_ARTEFACT_SHOES_LEATHER_MORGANA                                : Elder's Imbued Soles
1171: T4_ARTEFACT_HEAD_LEATHER_HELL                                    : Adept's Demonhide Padding
1172: T5_ARTEFACT_HEAD_LEATHER_HELL                                    : Expert's Demonhide Padding
1173: T6_ARTEFACT_HEAD_LEATHER_HELL                                    : Master's Demonhide Padding
1174: T7_ARTEFACT_HEAD_LEATHER_HELL                                    : Grandmaster's Demonhide Padding
1175: T8_ARTEFACT_HEAD_LEATHER_HELL                                    : Elder's Demonhide Padding
1176: T4_ARTEFACT_ARMOR_LEATHER_HELL                                   : Adept's Demonhide Leather
1177: T5_ARTEFACT_ARMOR_LEATHER_HELL                                   : Expert's Demonhide Leather
1178: T6_ARTEFACT_ARMOR_LEATHER_HELL                                   : Master's Demonhide Leather
1179: T7_ARTEFACT_ARMOR_LEATHER_HELL                                   : Grandmaster's Demonhide Leather
1180: T8_ARTEFACT_ARMOR_LEATHER_HELL                                   : Elder's Demonhide Leather
1181: T4_ARTEFACT_SHOES_LEATHER_HELL                                   : Adept's Demonhide Bindings
1182: T5_ARTEFACT_SHOES_LEATHER_HELL                                   : Expert's Demonhide Bindings
1183: T6_ARTEFACT_SHOES_LEATHER_HELL                                   : Master's Demonhide Bindings
1184: T7_ARTEFACT_SHOES_LEATHER_HELL                                   : Grandmaster's Demonhide Bindings
1185: T8_ARTEFACT_SHOES_LEATHER_HELL                                   : Elder's Demonhide Bindings
1186: T4_ARTEFACT_HEAD_LEATHER_UNDEAD                                  : Adept's Ghastly Visor
1187: T5_ARTEFACT_HEAD_LEATHER_UNDEAD                                  : Expert's Ghastly Visor
1188: T6_ARTEFACT_HEAD_LEATHER_UNDEAD                                  : Master's Ghastly Visor
1189: T7_ARTEFACT_HEAD_LEATHER_UNDEAD                                  : Grandmaster's Ghastly Visor
1190: T8_ARTEFACT_HEAD_LEATHER_UNDEAD                                  : Elder's Ghastly Visor
1191: T4_ARTEFACT_ARMOR_LEATHER_UNDEAD                                 : Adept's Ghastly Leather
1192: T5_ARTEFACT_ARMOR_LEATHER_UNDEAD                                 : Expert's Ghastly Leather
1193: T6_ARTEFACT_ARMOR_LEATHER_UNDEAD                                 : Master's Ghastly Leather
1194: T7_ARTEFACT_ARMOR_LEATHER_UNDEAD                                 : Grandmaster's Ghastly Leather
1195: T8_ARTEFACT_ARMOR_LEATHER_UNDEAD                                 : Elder's Ghastly Leather
1196: T4_ARTEFACT_SHOES_LEATHER_UNDEAD                                 : Adept's Ghastly Bindings
1197: T5_ARTEFACT_SHOES_LEATHER_UNDEAD                                 : Expert's Ghastly Bindings
1198: T6_ARTEFACT_SHOES_LEATHER_UNDEAD                                 : Master's Ghastly Bindings
1199: T7_ARTEFACT_SHOES_LEATHER_UNDEAD                                 : Grandmaster's Ghastly Bindings
1200: T8_ARTEFACT_SHOES_LEATHER_UNDEAD                                 : Elder's Ghastly Bindings
1201: T4_ARTEFACT_HEAD_LEATHER_AVALON                                  : Adept's Augured Padding
1202: T5_ARTEFACT_HEAD_LEATHER_AVALON                                  : Expert's Augured Padding
1203: T6_ARTEFACT_HEAD_LEATHER_AVALON                                  : Master's Augured Padding
1204: T7_ARTEFACT_HEAD_LEATHER_AVALON                                  : Grandmaster's Augured Padding
1205: T8_ARTEFACT_HEAD_LEATHER_AVALON                                  : Elder's Augured Padding
1206: T4_ARTEFACT_ARMOR_LEATHER_AVALON                                 : Adept's Augured Sash
1207: T5_ARTEFACT_ARMOR_LEATHER_AVALON                                 : Expert's Augured Sash
1208: T6_ARTEFACT_ARMOR_LEATHER_AVALON                                 : Master's Augured Sash
1209: T7_ARTEFACT_ARMOR_LEATHER_AVALON                                 : Grandmaster's Augured Sash
1210: T8_ARTEFACT_ARMOR_LEATHER_AVALON                                 : Elder's Augured Sash
1211: T4_ARTEFACT_SHOES_LEATHER_AVALON                                 : Adept's Augured Fasteners
1212: T5_ARTEFACT_SHOES_LEATHER_AVALON                                 : Expert's Augured Fasteners
1213: T6_ARTEFACT_SHOES_LEATHER_AVALON                                 : Master's Augured Fasteners
1214: T7_ARTEFACT_SHOES_LEATHER_AVALON                                 : Grandmaster's Augured Fasteners
1215: T8_ARTEFACT_SHOES_LEATHER_AVALON                                 : Elder's Augured Fasteners
1216: T4_ARTEFACT_HEAD_CLOTH_KEEPER                                    : Adept's Druidic Preserved Beak
1217: T5_ARTEFACT_HEAD_CLOTH_KEEPER                                    : Expert's Druidic Preserved Beak
1218: T6_ARTEFACT_HEAD_CLOTH_KEEPER                                    : Master's Druidic Preserved Beak
1219: T7_ARTEFACT_HEAD_CLOTH_KEEPER                                    : Grandmaster's Druidic Preserved Beak
1220: T8_ARTEFACT_HEAD_CLOTH_KEEPER                                    : Elder's Druidic Preserved Beak
1221: T4_ARTEFACT_ARMOR_CLOTH_KEEPER                                   : Adept's Druidic Feathers
1222: T5_ARTEFACT_ARMOR_CLOTH_KEEPER                                   : Expert's Druidic Feathers
1223: T6_ARTEFACT_ARMOR_CLOTH_KEEPER                                   : Master's Druidic Feathers
1224: T7_ARTEFACT_ARMOR_CLOTH_KEEPER                                   : Grandmaster's Druidic Feathers
1225: T8_ARTEFACT_ARMOR_CLOTH_KEEPER                                   : Elder's Druidic Feathers
1226: T4_ARTEFACT_SHOES_CLOTH_KEEPER                                   : Adept's Druidic Bindings
1227: T5_ARTEFACT_SHOES_CLOTH_KEEPER                                   : Expert's Druidic Bindings
1228: T6_ARTEFACT_SHOES_CLOTH_KEEPER                                   : Master's Druidic Bindings
1229: T7_ARTEFACT_SHOES_CLOTH_KEEPER                                   : Grandmaster's Druidic Bindings
1230: T8_ARTEFACT_SHOES_CLOTH_KEEPER                                   : Elder's Druidic Bindings
1231: T4_ARTEFACT_HEAD_CLOTH_HELL                                      : Adept's Infernal Cloth Visor
1232: T5_ARTEFACT_HEAD_CLOTH_HELL                                      : Expert's Infernal Cloth Visor
1233: T6_ARTEFACT_HEAD_CLOTH_HELL                                      : Master's Infernal Cloth Visor
1234: T7_ARTEFACT_HEAD_CLOTH_HELL                                      : Grandmaster's Infernal Cloth Visor
1235: T8_ARTEFACT_HEAD_CLOTH_HELL                                      : Elder's Infernal Cloth Visor
1236: T4_ARTEFACT_ARMOR_CLOTH_HELL                                     : Adept's Infernal Cloth Folds
1237: T5_ARTEFACT_ARMOR_CLOTH_HELL                                     : Expert's Infernal Cloth Folds
1238: T6_ARTEFACT_ARMOR_CLOTH_HELL                                     : Master's Infernal Cloth Folds
1239: T7_ARTEFACT_ARMOR_CLOTH_HELL                                     : Grandmaster's Infernal Cloth Folds
1240: T8_ARTEFACT_ARMOR_CLOTH_HELL                                     : Elder's Infernal Cloth Folds
1241: T4_ARTEFACT_SHOES_CLOTH_HELL                                     : Adept's Infernal Cloth Bindings
1242: T5_ARTEFACT_SHOES_CLOTH_HELL                                     : Expert's Infernal Cloth Bindings
1243: T6_ARTEFACT_SHOES_CLOTH_HELL                                     : Master's Infernal Cloth Bindings
1244: T7_ARTEFACT_SHOES_CLOTH_HELL                                     : Grandmaster's Infernal Cloth Bindings
1245: T8_ARTEFACT_SHOES_CLOTH_HELL                                     : Elder's Infernal Cloth Bindings
1246: T4_ARTEFACT_HEAD_CLOTH_MORGANA                                   : Adept's Alluring Padding
1247: T5_ARTEFACT_HEAD_CLOTH_MORGANA                                   : Expert's Alluring Padding
1248: T6_ARTEFACT_HEAD_CLOTH_MORGANA                                   : Master's Alluring Padding
1249: T7_ARTEFACT_HEAD_CLOTH_MORGANA                                   : Grandmaster's Alluring Padding
1250: T8_ARTEFACT_HEAD_CLOTH_MORGANA                                   : Elder's Alluring Padding
1251: T4_ARTEFACT_ARMOR_CLOTH_MORGANA                                  : Adept's Alluring Amulet
1252: T5_ARTEFACT_ARMOR_CLOTH_MORGANA                                  : Expert's Alluring Amulet
1253: T6_ARTEFACT_ARMOR_CLOTH_MORGANA                                  : Master's Alluring Amulet
1254: T7_ARTEFACT_ARMOR_CLOTH_MORGANA                                  : Grandmaster's Alluring Amulet
1255: T8_ARTEFACT_ARMOR_CLOTH_MORGANA                                  : Elder's Alluring Amulet
1256: T4_ARTEFACT_SHOES_CLOTH_MORGANA                                  : Adept's Alluring Bindings
1257: T5_ARTEFACT_SHOES_CLOTH_MORGANA                                  : Expert's Alluring Bindings
1258: T6_ARTEFACT_SHOES_CLOTH_MORGANA                                  : Master's Alluring Bindings
1259: T7_ARTEFACT_SHOES_CLOTH_MORGANA                                  : Grandmaster's Alluring Bindings
1260: T8_ARTEFACT_SHOES_CLOTH_MORGANA                                  : Elder's Alluring Bindings
1261: T4_ARTEFACT_HEAD_CLOTH_AVALON                                    : Adept's Sanctified Mask
1262: T5_ARTEFACT_HEAD_CLOTH_AVALON                                    : Expert's Sanctified Mask
1263: T6_ARTEFACT_HEAD_CLOTH_AVALON                                    : Master's Sanctified Mask
1264: T7_ARTEFACT_HEAD_CLOTH_AVALON                                    : Grandmaster's Sanctified Mask
1265: T8_ARTEFACT_HEAD_CLOTH_AVALON                                    : Elder's Sanctified Mask
1266: T4_ARTEFACT_ARMOR_CLOTH_AVALON                                   : Adept's Sanctified Belt
1267: T5_ARTEFACT_ARMOR_CLOTH_AVALON                                   : Expert's Sanctified Belt
1268: T6_ARTEFACT_ARMOR_CLOTH_AVALON                                   : Master's Sanctified Belt
1269: T7_ARTEFACT_ARMOR_CLOTH_AVALON                                   : Grandmaster's Sanctified Belt
1270: T8_ARTEFACT_ARMOR_CLOTH_AVALON                                   : Elder's Sanctified Belt
1271: T4_ARTEFACT_SHOES_CLOTH_AVALON                                   : Adept's Sanctified Bindings
1272: T5_ARTEFACT_SHOES_CLOTH_AVALON                                   : Expert's Sanctified Bindings
1273: T6_ARTEFACT_SHOES_CLOTH_AVALON                                   : Master's Sanctified Bindings
1274: T7_ARTEFACT_SHOES_CLOTH_AVALON                                   : Grandmaster's Sanctified Bindings
1275: T8_ARTEFACT_SHOES_CLOTH_AVALON                                   : Elder's Sanctified Bindings
1276: T4_ESSENCE_POTION                                                : Adept's Arcane Essence
1277: T4_ESSENCE                                                       : Adept's Faded Essence
1278: T4_RUNE                                                          : Adept's Rune
1279: T4_SOUL                                                          : Adept's Soul
1280: T4_RELIC                                                         : Adept's Relic
1281: T4_SHARD_AVALONIAN                                               : Adept's Avalonian Shard
1282: T5_ESSENCE_POTION                                                : Expert's Arcane Essence
1283: T5_ESSENCE                                                       : Expert's Faded Essence
1284: T5_RUNE                                                          : Expert's Rune
1285: T5_SOUL                                                          : Expert's Soul
1286: T5_RELIC                                                         : Expert's Relic
1287: T5_SHARD_AVALONIAN                                               : Expert's Avalonian Shard
1288: T6_ESSENCE_POTION                                                : Master's Arcane Essence
1289: T6_ESSENCE                                                       : Master's Faded Essence
1290: T6_RUNE                                                          : Master's Rune
1291: T6_SOUL                                                          : Master's Soul
1292: T6_RELIC                                                         : Master's Relic
1293: T6_SHARD_AVALONIAN                                               : Master's Avalonian Shard
1294: T7_ESSENCE_POTION                                                : Grandmaster's Arcane Essence
1295: T7_ESSENCE                                                       : Grandmaster's Faded Essence
1296: T7_RUNE                                                          : Grandmaster's Rune
1297: T7_SOUL                                                          : Grandmaster's Soul
1298: T7_RELIC                                                         : Grandmaster's Relic
1299: T7_SHARD_AVALONIAN                                               : Grandmaster's Avalonian Shard
1300: T8_ESSENCE_POTION                                                : Elder's Arcane Essence
1301: T8_ESSENCE                                                       : Elder's Faded Essence
1302: T8_RUNE                                                          : Elder's Rune
1303: T8_SOUL                                                          : Elder's Soul
1304: T8_RELIC                                                         : Elder's Relic
1305: T8_SHARD_AVALONIAN                                               : Elder's Avalonian Shard
1306: T1_TRASH                                                         : Trash
1307: T2_TRASH                                                         : Trash
1308: T3_TRASH                                                         : Trash
1309: T4_TRASH                                                         : Trash
1310: T5_TRASH                                                         : Trash
1311: T6_TRASH                                                         : Trash
1312: T7_TRASH                                                         : Trash
1313: T8_TRASH                                                         : Trash
1314: T1_OFF_SHIELD                                                    : Beginner's Shield
1315: T2_OFF_SHIELD                                                    : Novice's Shield
1316: T3_OFF_SHIELD                                                    : Journeyman's Shield
1317: T4_OFF_SHIELD                                                    : Adept's Shield
1318: T4_OFF_SHIELD@1                                                  : Adept's Shield
1319: T4_OFF_SHIELD@2                                                  : Adept's Shield
1320: T4_OFF_SHIELD@3                                                  : Adept's Shield
1321: T5_OFF_SHIELD                                                    : Expert's Shield
1322: T5_OFF_SHIELD@1                                                  : Expert's Shield
1323: T5_OFF_SHIELD@2                                                  : Expert's Shield
1324: T5_OFF_SHIELD@3                                                  : Expert's Shield
1325: T6_OFF_SHIELD                                                    : Master's Shield
1326: T6_OFF_SHIELD@1                                                  : Master's Shield
1327: T6_OFF_SHIELD@2                                                  : Master's Shield
1328: T6_OFF_SHIELD@3                                                  : Master's Shield
1329: T7_OFF_SHIELD                                                    : Grandmaster's Shield
1330: T7_OFF_SHIELD@1                                                  : Grandmaster's Shield
1331: T7_OFF_SHIELD@2                                                  : Grandmaster's Shield
1332: T7_OFF_SHIELD@3                                                  : Grandmaster's Shield
1333: T8_OFF_SHIELD                                                    : Elder's Shield
1334: T8_OFF_SHIELD@1                                                  : Elder's Shield
1335: T8_OFF_SHIELD@2                                                  : Elder's Shield
1336: T8_OFF_SHIELD@3                                                  : Elder's Shield
1337: T4_OFF_TOWERSHIELD_UNDEAD                                        : Adept's Sarcophagus
1338: T4_OFF_TOWERSHIELD_UNDEAD@1                                      : Adept's Sarcophagus
1339: T4_OFF_TOWERSHIELD_UNDEAD@2                                      : Adept's Sarcophagus
1340: T4_OFF_TOWERSHIELD_UNDEAD@3                                      : Adept's Sarcophagus
1341: T5_OFF_TOWERSHIELD_UNDEAD                                        : Expert's Sarcophagus
1342: T5_OFF_TOWERSHIELD_UNDEAD@1                                      : Expert's Sarcophagus
1343: T5_OFF_TOWERSHIELD_UNDEAD@2                                      : Expert's Sarcophagus
1344: T5_OFF_TOWERSHIELD_UNDEAD@3                                      : Expert's Sarcophagus
1345: T6_OFF_TOWERSHIELD_UNDEAD                                        : Master's Sarcophagus
1346: T6_OFF_TOWERSHIELD_UNDEAD@1                                      : Master's Sarcophagus
1347: T6_OFF_TOWERSHIELD_UNDEAD@2                                      : Master's Sarcophagus
1348: T6_OFF_TOWERSHIELD_UNDEAD@3                                      : Master's Sarcophagus
1349: T7_OFF_TOWERSHIELD_UNDEAD                                        : Grandmaster's Sarcophagus
1350: T7_OFF_TOWERSHIELD_UNDEAD@1                                      : Grandmaster's Sarcophagus
1351: T7_OFF_TOWERSHIELD_UNDEAD@2                                      : Grandmaster's Sarcophagus
1352: T7_OFF_TOWERSHIELD_UNDEAD@3                                      : Grandmaster's Sarcophagus
1353: T8_OFF_TOWERSHIELD_UNDEAD                                        : Elder's Sarcophagus
1354: T8_OFF_TOWERSHIELD_UNDEAD@1                                      : Elder's Sarcophagus
1355: T8_OFF_TOWERSHIELD_UNDEAD@2                                      : Elder's Sarcophagus
1356: T8_OFF_TOWERSHIELD_UNDEAD@3                                      : Elder's Sarcophagus
1357: T4_OFF_SHIELD_HELL                                               : Adept's Caitiff Shield
1358: T4_OFF_SHIELD_HELL@1                                             : Adept's Caitiff Shield
1359: T4_OFF_SHIELD_HELL@2                                             : Adept's Caitiff Shield
1360: T4_OFF_SHIELD_HELL@3                                             : Adept's Caitiff Shield
1361: T5_OFF_SHIELD_HELL                                               : Expert's Caitiff Shield
1362: T5_OFF_SHIELD_HELL@1                                             : Expert's Caitiff Shield
1363: T5_OFF_SHIELD_HELL@2                                             : Expert's Caitiff Shield
1364: T5_OFF_SHIELD_HELL@3                                             : Expert's Caitiff Shield
1365: T6_OFF_SHIELD_HELL                                               : Master's Caitiff Shield
1366: T6_OFF_SHIELD_HELL@1                                             : Master's Caitiff Shield
1367: T6_OFF_SHIELD_HELL@2                                             : Master's Caitiff Shield
1368: T6_OFF_SHIELD_HELL@3                                             : Master's Caitiff Shield
1369: T7_OFF_SHIELD_HELL                                               : Grandmaster's Caitiff Shield
1370: T7_OFF_SHIELD_HELL@1                                             : Grandmaster's Caitiff Shield
1371: T7_OFF_SHIELD_HELL@2                                             : Grandmaster's Caitiff Shield
1372: T7_OFF_SHIELD_HELL@3                                             : Grandmaster's Caitiff Shield
1373: T8_OFF_SHIELD_HELL                                               : Elder's Caitiff Shield
1374: T8_OFF_SHIELD_HELL@1                                             : Elder's Caitiff Shield
1375: T8_OFF_SHIELD_HELL@2                                             : Elder's Caitiff Shield
1376: T8_OFF_SHIELD_HELL@3                                             : Elder's Caitiff Shield
1377: T4_OFF_SPIKEDSHIELD_MORGANA                                      : Adept's Facebreaker
1378: T4_OFF_SPIKEDSHIELD_MORGANA@1                                    : Adept's Facebreaker
1379: T4_OFF_SPIKEDSHIELD_MORGANA@2                                    : Adept's Facebreaker
1380: T4_OFF_SPIKEDSHIELD_MORGANA@3                                    : Adept's Facebreaker
1381: T5_OFF_SPIKEDSHIELD_MORGANA                                      : Expert's Facebreaker
1382: T5_OFF_SPIKEDSHIELD_MORGANA@1                                    : Expert's Facebreaker
1383: T5_OFF_SPIKEDSHIELD_MORGANA@2                                    : Expert's Facebreaker
1384: T5_OFF_SPIKEDSHIELD_MORGANA@3                                    : Expert's Facebreaker
1385: T6_OFF_SPIKEDSHIELD_MORGANA                                      : Master's Facebreaker
1386: T6_OFF_SPIKEDSHIELD_MORGANA@1                                    : Master's Facebreaker
1387: T6_OFF_SPIKEDSHIELD_MORGANA@2                                    : Master's Facebreaker
1388: T6_OFF_SPIKEDSHIELD_MORGANA@3                                    : Master's Facebreaker
1389: T7_OFF_SPIKEDSHIELD_MORGANA                                      : Grandmaster's Facebreaker
1390: T7_OFF_SPIKEDSHIELD_MORGANA@1                                    : Grandmaster's Facebreaker
1391: T7_OFF_SPIKEDSHIELD_MORGANA@2                                    : Grandmaster's Facebreaker
1392: T7_OFF_SPIKEDSHIELD_MORGANA@3                                    : Grandmaster's Facebreaker
1393: T8_OFF_SPIKEDSHIELD_MORGANA                                      : Elder's Facebreaker
1394: T8_OFF_SPIKEDSHIELD_MORGANA@1                                    : Elder's Facebreaker
1395: T8_OFF_SPIKEDSHIELD_MORGANA@2                                    : Elder's Facebreaker
1396: T8_OFF_SPIKEDSHIELD_MORGANA@3                                    : Elder's Facebreaker
1397: T2_OFF_BOOK                                                      : Novice's Tome of Spells
1398: T3_OFF_BOOK                                                      : Journeyman's Tome of Spells
1399: T4_OFF_BOOK                                                      : Adept's Tome of Spells
1400: T4_OFF_BOOK@1                                                    : Adept's Tome of Spells
1401: T4_OFF_BOOK@2                                                    : Adept's Tome of Spells
1402: T4_OFF_BOOK@3                                                    : Adept's Tome of Spells
1403: T5_OFF_BOOK                                                      : Expert's Tome of Spells
1404: T5_OFF_BOOK@1                                                    : Expert's Tome of Spells
1405: T5_OFF_BOOK@2                                                    : Expert's Tome of Spells
1406: T5_OFF_BOOK@3                                                    : Expert's Tome of Spells
1407: T6_OFF_BOOK                                                      : Master's Tome of Spells
1408: T6_OFF_BOOK@1                                                    : Master's Tome of Spells
1409: T6_OFF_BOOK@2                                                    : Master's Tome of Spells
1410: T6_OFF_BOOK@3                                                    : Master's Tome of Spells
1411: T7_OFF_BOOK                                                      : Grandmaster's Tome of Spells
1412: T7_OFF_BOOK@1                                                    : Grandmaster's Tome of Spells
1413: T7_OFF_BOOK@2                                                    : Grandmaster's Tome of Spells
1414: T7_OFF_BOOK@3                                                    : Grandmaster's Tome of Spells
1415: T8_OFF_BOOK                                                      : Rosalia's Diary
1416: T8_OFF_BOOK@1                                                    : Rosalia's Diary
1417: T8_OFF_BOOK@2                                                    : Rosalia's Diary
1418: T8_OFF_BOOK@3                                                    : Rosalia's Diary
1419: T4_OFF_ORB_MORGANA                                               : Adept's Eye of Secrets
1420: T4_OFF_ORB_MORGANA@1                                             : Adept's Eye of Secrets
1421: T4_OFF_ORB_MORGANA@2                                             : Adept's Eye of Secrets
1422: T4_OFF_ORB_MORGANA@3                                             : Adept's Eye of Secrets
1423: T5_OFF_ORB_MORGANA                                               : Expert's Eye of Secrets
1424: T5_OFF_ORB_MORGANA@1                                             : Expert's Eye of Secrets
1425: T5_OFF_ORB_MORGANA@2                                             : Expert's Eye of Secrets
1426: T5_OFF_ORB_MORGANA@3                                             : Expert's Eye of Secrets
1427: T6_OFF_ORB_MORGANA                                               : Master's Eye of Secrets
1428: T6_OFF_ORB_MORGANA@1                                             : Master's Eye of Secrets
1429: T6_OFF_ORB_MORGANA@2                                             : Master's Eye of Secrets
1430: T6_OFF_ORB_MORGANA@3                                             : Master's Eye of Secrets
1431: T7_OFF_ORB_MORGANA                                               : Grandmaster's Eye of Secrets
1432: T7_OFF_ORB_MORGANA@1                                             : Grandmaster's Eye of Secrets
1433: T7_OFF_ORB_MORGANA@2                                             : Grandmaster's Eye of Secrets
1434: T7_OFF_ORB_MORGANA@3                                             : Grandmaster's Eye of Secrets
1435: T8_OFF_ORB_MORGANA                                               : Elder's Eye of Secrets
1436: T8_OFF_ORB_MORGANA@1                                             : Elder's Eye of Secrets
1437: T8_OFF_ORB_MORGANA@2                                             : Elder's Eye of Secrets
1438: T8_OFF_ORB_MORGANA@3                                             : Elder's Eye of Secrets
1439: T4_OFF_DEMONSKULL_HELL                                           : Adept's Muisak
1440: T4_OFF_DEMONSKULL_HELL@1                                         : Adept's Muisak
1441: T4_OFF_DEMONSKULL_HELL@2                                         : Adept's Muisak
1442: T4_OFF_DEMONSKULL_HELL@3                                         : Adept's Muisak
1443: T5_OFF_DEMONSKULL_HELL                                           : Expert's Muisak
1444: T5_OFF_DEMONSKULL_HELL@1                                         : Expert's Muisak
1445: T5_OFF_DEMONSKULL_HELL@2                                         : Expert's Muisak
1446: T5_OFF_DEMONSKULL_HELL@3                                         : Expert's Muisak
1447: T6_OFF_DEMONSKULL_HELL                                           : Master's Muisak
1448: T6_OFF_DEMONSKULL_HELL@1                                         : Master's Muisak
1449: T6_OFF_DEMONSKULL_HELL@2                                         : Master's Muisak
1450: T6_OFF_DEMONSKULL_HELL@3                                         : Master's Muisak
1451: T7_OFF_DEMONSKULL_HELL                                           : Grandmaster's Muisak
1452: T7_OFF_DEMONSKULL_HELL@1                                         : Grandmaster's Muisak
1453: T7_OFF_DEMONSKULL_HELL@2                                         : Grandmaster's Muisak
1454: T7_OFF_DEMONSKULL_HELL@3                                         : Grandmaster's Muisak
1455: T8_OFF_DEMONSKULL_HELL                                           : Elder's Muisak
1456: T8_OFF_DEMONSKULL_HELL@1                                         : Elder's Muisak
1457: T8_OFF_DEMONSKULL_HELL@2                                         : Elder's Muisak
1458: T8_OFF_DEMONSKULL_HELL@3                                         : Elder's Muisak
1459: T4_OFF_TOTEM_KEEPER                                              : Adept's Taproot
1460: T4_OFF_TOTEM_KEEPER@1                                            : Adept's Taproot
1461: T4_OFF_TOTEM_KEEPER@2                                            : Adept's Taproot
1462: T4_OFF_TOTEM_KEEPER@3                                            : Adept's Taproot
1463: T5_OFF_TOTEM_KEEPER                                              : Expert's Taproot
1464: T5_OFF_TOTEM_KEEPER@1                                            : Expert's Taproot
1465: T5_OFF_TOTEM_KEEPER@2                                            : Expert's Taproot
1466: T5_OFF_TOTEM_KEEPER@3                                            : Expert's Taproot
1467: T6_OFF_TOTEM_KEEPER                                              : Master's Taproot
1468: T6_OFF_TOTEM_KEEPER@1                                            : Master's Taproot
1469: T6_OFF_TOTEM_KEEPER@2                                            : Master's Taproot
1470: T6_OFF_TOTEM_KEEPER@3                                            : Master's Taproot
1471: T7_OFF_TOTEM_KEEPER                                              : Grandmaster's Taproot
1472: T7_OFF_TOTEM_KEEPER@1                                            : Grandmaster's Taproot
1473: T7_OFF_TOTEM_KEEPER@2                                            : Grandmaster's Taproot
1474: T7_OFF_TOTEM_KEEPER@3                                            : Grandmaster's Taproot
1475: T8_OFF_TOTEM_KEEPER                                              : Elder's Taproot
1476: T8_OFF_TOTEM_KEEPER@1                                            : Elder's Taproot
1477: T8_OFF_TOTEM_KEEPER@2                                            : Elder's Taproot
1478: T8_OFF_TOTEM_KEEPER@3                                            : Elder's Taproot
1479: T3_OFF_TORCH                                                     : Journeyman's Torch
1480: T4_OFF_TORCH                                                     : Adept's Torch
1481: T4_OFF_TORCH@1                                                   : Adept's Torch
1482: T4_OFF_TORCH@2                                                   : Adept's Torch
1483: T4_OFF_TORCH@3                                                   : Adept's Torch
1484: T5_OFF_TORCH                                                     : Expert's Torch
1485: T5_OFF_TORCH@1                                                   : Expert's Torch
1486: T5_OFF_TORCH@2                                                   : Expert's Torch
1487: T5_OFF_TORCH@3                                                   : Expert's Torch
1488: T6_OFF_TORCH                                                     : Master's Torch
1489: T6_OFF_TORCH@1                                                   : Master's Torch
1490: T6_OFF_TORCH@2                                                   : Master's Torch
1491: T6_OFF_TORCH@3                                                   : Master's Torch
1492: T7_OFF_TORCH                                                     : Grandmaster's Torch
1493: T7_OFF_TORCH@1                                                   : Grandmaster's Torch
1494: T7_OFF_TORCH@2                                                   : Grandmaster's Torch
1495: T7_OFF_TORCH@3                                                   : Grandmaster's Torch
1496: T8_OFF_TORCH                                                     : Elder's Torch
1497: T8_OFF_TORCH@1                                                   : Elder's Torch
1498: T8_OFF_TORCH@2                                                   : Elder's Torch
1499: T8_OFF_TORCH@3                                                   : Elder's Torch
1500: T4_OFF_HORN_KEEPER                                               : Adept's Mistcaller
1501: T4_OFF_HORN_KEEPER@1                                             : Adept's Mistcaller
1502: T4_OFF_HORN_KEEPER@2                                             : Adept's Mistcaller
1503: T4_OFF_HORN_KEEPER@3                                             : Adept's Mistcaller
1504: T5_OFF_HORN_KEEPER                                               : Expert's Mistcaller
1505: T5_OFF_HORN_KEEPER@1                                             : Expert's Mistcaller
1506: T5_OFF_HORN_KEEPER@2                                             : Expert's Mistcaller
1507: T5_OFF_HORN_KEEPER@3                                             : Expert's Mistcaller
1508: T6_OFF_HORN_KEEPER                                               : Master's Mistcaller
1509: T6_OFF_HORN_KEEPER@1                                             : Master's Mistcaller
1510: T6_OFF_HORN_KEEPER@2                                             : Master's Mistcaller
1511: T6_OFF_HORN_KEEPER@3                                             : Master's Mistcaller
1512: T7_OFF_HORN_KEEPER                                               : Grandmaster's Mistcaller
1513: T7_OFF_HORN_KEEPER@1                                             : Grandmaster's Mistcaller
1514: T7_OFF_HORN_KEEPER@2                                             : Grandmaster's Mistcaller
1515: T7_OFF_HORN_KEEPER@3                                             : Grandmaster's Mistcaller
1516: T8_OFF_HORN_KEEPER                                               : Elder's Mistcaller
1517: T8_OFF_HORN_KEEPER@1                                             : Elder's Mistcaller
1518: T8_OFF_HORN_KEEPER@2                                             : Elder's Mistcaller
1519: T8_OFF_HORN_KEEPER@3                                             : Elder's Mistcaller
1520: T4_OFF_JESTERCANE_HELL                                           : Adept's Leering Cane
1521: T4_OFF_JESTERCANE_HELL@1                                         : Adept's Leering Cane
1522: T4_OFF_JESTERCANE_HELL@2                                         : Adept's Leering Cane
1523: T4_OFF_JESTERCANE_HELL@3                                         : Adept's Leering Cane
1524: T5_OFF_JESTERCANE_HELL                                           : Expert's Leering Cane
1525: T5_OFF_JESTERCANE_HELL@1                                         : Expert's Leering Cane
1526: T5_OFF_JESTERCANE_HELL@2                                         : Expert's Leering Cane
1527: T5_OFF_JESTERCANE_HELL@3                                         : Expert's Leering Cane
1528: T6_OFF_JESTERCANE_HELL                                           : Master's Leering Cane
1529: T6_OFF_JESTERCANE_HELL@1                                         : Master's Leering Cane
1530: T6_OFF_JESTERCANE_HELL@2                                         : Master's Leering Cane
1531: T6_OFF_JESTERCANE_HELL@3                                         : Master's Leering Cane
1532: T7_OFF_JESTERCANE_HELL                                           : Grandmaster's Leering Cane
1533: T7_OFF_JESTERCANE_HELL@1                                         : Grandmaster's Leering Cane
1534: T7_OFF_JESTERCANE_HELL@2                                         : Grandmaster's Leering Cane
1535: T7_OFF_JESTERCANE_HELL@3                                         : Grandmaster's Leering Cane
1536: T8_OFF_JESTERCANE_HELL                                           : Elder's Leering Cane
1537: T8_OFF_JESTERCANE_HELL@1                                         : Elder's Leering Cane
1538: T8_OFF_JESTERCANE_HELL@2                                         : Elder's Leering Cane
1539: T8_OFF_JESTERCANE_HELL@3                                         : Elder's Leering Cane
1540: T4_OFF_LAMP_UNDEAD                                               : Adept's Cryptcandle
1541: T4_OFF_LAMP_UNDEAD@1                                             : Adept's Cryptcandle
1542: T4_OFF_LAMP_UNDEAD@2                                             : Adept's Cryptcandle
1543: T4_OFF_LAMP_UNDEAD@3                                             : Adept's Cryptcandle
1544: T5_OFF_LAMP_UNDEAD                                               : Expert's Cryptcandle
1545: T5_OFF_LAMP_UNDEAD@1                                             : Expert's Cryptcandle
1546: T5_OFF_LAMP_UNDEAD@2                                             : Expert's Cryptcandle
1547: T5_OFF_LAMP_UNDEAD@3                                             : Expert's Cryptcandle
1548: T6_OFF_LAMP_UNDEAD                                               : Master's Cryptcandle
1549: T6_OFF_LAMP_UNDEAD@1                                             : Master's Cryptcandle
1550: T6_OFF_LAMP_UNDEAD@2                                             : Master's Cryptcandle
1551: T6_OFF_LAMP_UNDEAD@3                                             : Master's Cryptcandle
1552: T7_OFF_LAMP_UNDEAD                                               : Grandmaster's Cryptcandle
1553: T7_OFF_LAMP_UNDEAD@1                                             : Grandmaster's Cryptcandle
1554: T7_OFF_LAMP_UNDEAD@2                                             : Grandmaster's Cryptcandle
1555: T7_OFF_LAMP_UNDEAD@3                                             : Grandmaster's Cryptcandle
1556: T8_OFF_LAMP_UNDEAD                                               : Elder's Cryptcandle
1557: T8_OFF_LAMP_UNDEAD@1                                             : Elder's Cryptcandle
1558: T8_OFF_LAMP_UNDEAD@2                                             : Elder's Cryptcandle
1559: T8_OFF_LAMP_UNDEAD@3                                             : Elder's Cryptcandle
1560: T2_CAPE                                                          : Novice's Cape
1561: T3_CAPE                                                          : Journeyman's Cape
1562: T4_CAPE                                                          : Adept's Cape
1563: T4_CAPE@1                                                        : Adept's Cape
1564: T4_CAPE@2                                                        : Adept's Cape
1565: T4_CAPE@3                                                        : Adept's Cape
1566: T5_CAPE                                                          : Expert's Cape
1567: T5_CAPE@1                                                        : Expert's Cape
1568: T5_CAPE@2                                                        : Expert's Cape
1569: T5_CAPE@3                                                        : Expert's Cape
1570: T6_CAPE                                                          : Master's Cape
1571: T6_CAPE@1                                                        : Master's Cape
1572: T6_CAPE@2                                                        : Master's Cape
1573: T6_CAPE@3                                                        : Master's Cape
1574: T7_CAPE                                                          : Grandmaster's Cape
1575: T7_CAPE@1                                                        : Grandmaster's Cape
1576: T7_CAPE@2                                                        : Grandmaster's Cape
1577: T7_CAPE@3                                                        : Grandmaster's Cape
1578: T8_CAPE                                                          : Elder's Cape
1579: T8_CAPE@1                                                        : Elder's Cape
1580: T8_CAPE@2                                                        : Elder's Cape
1581: T8_CAPE@3                                                        : Elder's Cape
1582: T4_CAPEITEM_FW_BRIDGEWATCH                                       : Adept's Bridgewatch Cape
1583: T4_CAPEITEM_FW_BRIDGEWATCH@1                                     : Adept's Bridgewatch Cape
1584: T4_CAPEITEM_FW_BRIDGEWATCH@2                                     : Adept's Bridgewatch Cape
1585: T4_CAPEITEM_FW_BRIDGEWATCH@3                                     : Adept's Bridgewatch Cape
1586: T5_CAPEITEM_FW_BRIDGEWATCH                                       : Expert's Bridgewatch Cape
1587: T5_CAPEITEM_FW_BRIDGEWATCH@1                                     : Expert's Bridgewatch Cape
1588: T5_CAPEITEM_FW_BRIDGEWATCH@2                                     : Expert's Bridgewatch Cape
1589: T5_CAPEITEM_FW_BRIDGEWATCH@3                                     : Expert's Bridgewatch Cape
1590: T6_CAPEITEM_FW_BRIDGEWATCH                                       : Master's Bridgewatch Cape
1591: T6_CAPEITEM_FW_BRIDGEWATCH@1                                     : Master's Bridgewatch Cape
1592: T6_CAPEITEM_FW_BRIDGEWATCH@2                                     : Master's Bridgewatch Cape
1593: T6_CAPEITEM_FW_BRIDGEWATCH@3                                     : Master's Bridgewatch Cape
1594: T7_CAPEITEM_FW_BRIDGEWATCH                                       : Grandmaster's Bridgewatch Cape
1595: T7_CAPEITEM_FW_BRIDGEWATCH@1                                     : Grandmaster's Bridgewatch Cape
1596: T7_CAPEITEM_FW_BRIDGEWATCH@2                                     : Grandmaster's Bridgewatch Cape
1597: T7_CAPEITEM_FW_BRIDGEWATCH@3                                     : Grandmaster's Bridgewatch Cape
1598: T8_CAPEITEM_FW_BRIDGEWATCH                                       : Elder's Bridgewatch Cape
1599: T8_CAPEITEM_FW_BRIDGEWATCH@1                                     : Elder's Bridgewatch Cape
1600: T8_CAPEITEM_FW_BRIDGEWATCH@2                                     : Elder's Bridgewatch Cape
1601: T8_CAPEITEM_FW_BRIDGEWATCH@3                                     : Elder's Bridgewatch Cape
1602: T4_CAPEITEM_FW_FORTSTERLING                                      : Adept's Fort Sterling Cape
1603: T4_CAPEITEM_FW_FORTSTERLING@1                                    : Adept's Fort Sterling Cape
1604: T4_CAPEITEM_FW_FORTSTERLING@2                                    : Adept's Fort Sterling Cape
1605: T4_CAPEITEM_FW_FORTSTERLING@3                                    : Adept's Fort Sterling Cape
1606: T5_CAPEITEM_FW_FORTSTERLING                                      : Expert's Fort Sterling Cape
1607: T5_CAPEITEM_FW_FORTSTERLING@1                                    : Expert's Fort Sterling Cape
1608: T5_CAPEITEM_FW_FORTSTERLING@2                                    : Expert's Fort Sterling Cape
1609: T5_CAPEITEM_FW_FORTSTERLING@3                                    : Expert's Fort Sterling Cape
1610: T6_CAPEITEM_FW_FORTSTERLING                                      : Master's Fort Sterling Cape
1611: T6_CAPEITEM_FW_FORTSTERLING@1                                    : Master's Fort Sterling Cape
1612: T6_CAPEITEM_FW_FORTSTERLING@2                                    : Master's Fort Sterling Cape
1613: T6_CAPEITEM_FW_FORTSTERLING@3                                    : Master's Fort Sterling Cape
1614: T7_CAPEITEM_FW_FORTSTERLING                                      : Grandmaster's Fort Sterling Cape
1615: T7_CAPEITEM_FW_FORTSTERLING@1                                    : Grandmaster's Fort Sterling Cape
1616: T7_CAPEITEM_FW_FORTSTERLING@2                                    : Grandmaster's Fort Sterling Cape
1617: T7_CAPEITEM_FW_FORTSTERLING@3                                    : Grandmaster's Fort Sterling Cape
1618: T8_CAPEITEM_FW_FORTSTERLING                                      : Elder's Fort Sterling Cape
1619: T8_CAPEITEM_FW_FORTSTERLING@1                                    : Elder's Fort Sterling Cape
1620: T8_CAPEITEM_FW_FORTSTERLING@2                                    : Elder's Fort Sterling Cape
1621: T8_CAPEITEM_FW_FORTSTERLING@3                                    : Elder's Fort Sterling Cape
1622: T4_CAPEITEM_FW_LYMHURST                                          : Adept's Lymhurst Cape
1623: T4_CAPEITEM_FW_LYMHURST@1                                        : Adept's Lymhurst Cape
1624: T4_CAPEITEM_FW_LYMHURST@2                                        : Adept's Lymhurst Cape
1625: T4_CAPEITEM_FW_LYMHURST@3                                        : Adept's Lymhurst Cape
1626: T5_CAPEITEM_FW_LYMHURST                                          : Expert's Lymhurst Cape
1627: T5_CAPEITEM_FW_LYMHURST@1                                        : Expert's Lymhurst Cape
1628: T5_CAPEITEM_FW_LYMHURST@2                                        : Expert's Lymhurst Cape
1629: T5_CAPEITEM_FW_LYMHURST@3                                        : Expert's Lymhurst Cape
1630: T6_CAPEITEM_FW_LYMHURST                                          : Master's Lymhurst Cape
1631: T6_CAPEITEM_FW_LYMHURST@1                                        : Master's Lymhurst Cape
1632: T6_CAPEITEM_FW_LYMHURST@2                                        : Master's Lymhurst Cape
1633: T6_CAPEITEM_FW_LYMHURST@3                                        : Master's Lymhurst Cape
1634: T7_CAPEITEM_FW_LYMHURST                                          : Grandmaster's Lymhurst Cape
1635: T7_CAPEITEM_FW_LYMHURST@1                                        : Grandmaster's Lymhurst Cape
1636: T7_CAPEITEM_FW_LYMHURST@2                                        : Grandmaster's Lymhurst Cape
1637: T7_CAPEITEM_FW_LYMHURST@3                                        : Grandmaster's Lymhurst Cape
1638: T8_CAPEITEM_FW_LYMHURST                                          : Elder's Lymhurst Cape
1639: T8_CAPEITEM_FW_LYMHURST@1                                        : Elder's Lymhurst Cape
1640: T8_CAPEITEM_FW_LYMHURST@2                                        : Elder's Lymhurst Cape
1641: T8_CAPEITEM_FW_LYMHURST@3                                        : Elder's Lymhurst Cape
1642: T4_CAPEITEM_FW_MARTLOCK                                          : Adept's Martlock Cape
1643: T4_CAPEITEM_FW_MARTLOCK@1                                        : Adept's Martlock Cape
1644: T4_CAPEITEM_FW_MARTLOCK@2                                        : Adept's Martlock Cape
1645: T4_CAPEITEM_FW_MARTLOCK@3                                        : Adept's Martlock Cape
1646: T5_CAPEITEM_FW_MARTLOCK                                          : Expert's Martlock Cape
1647: T5_CAPEITEM_FW_MARTLOCK@1                                        : Expert's Martlock Cape
1648: T5_CAPEITEM_FW_MARTLOCK@2                                        : Expert's Martlock Cape
1649: T5_CAPEITEM_FW_MARTLOCK@3                                        : Expert's Martlock Cape
1650: T6_CAPEITEM_FW_MARTLOCK                                          : Master's Martlock Cape
1651: T6_CAPEITEM_FW_MARTLOCK@1                                        : Master's Martlock Cape
1652: T6_CAPEITEM_FW_MARTLOCK@2                                        : Master's Martlock Cape
1653: T6_CAPEITEM_FW_MARTLOCK@3                                        : Master's Martlock Cape
1654: T7_CAPEITEM_FW_MARTLOCK                                          : Grandmaster's Martlock Cape
1655: T7_CAPEITEM_FW_MARTLOCK@1                                        : Grandmaster's Martlock Cape
1656: T7_CAPEITEM_FW_MARTLOCK@2                                        : Grandmaster's Martlock Cape
1657: T7_CAPEITEM_FW_MARTLOCK@3                                        : Grandmaster's Martlock Cape
1658: T8_CAPEITEM_FW_MARTLOCK                                          : Elder's Martlock Cape
1659: T8_CAPEITEM_FW_MARTLOCK@1                                        : Elder's Martlock Cape
1660: T8_CAPEITEM_FW_MARTLOCK@2                                        : Elder's Martlock Cape
1661: T8_CAPEITEM_FW_MARTLOCK@3                                        : Elder's Martlock Cape
1662: T4_CAPEITEM_FW_THETFORD                                          : Adept's Thetford Cape
1663: T4_CAPEITEM_FW_THETFORD@1                                        : Adept's Thetford Cape
1664: T4_CAPEITEM_FW_THETFORD@2                                        : Adept's Thetford Cape
1665: T4_CAPEITEM_FW_THETFORD@3                                        : Adept's Thetford Cape
1666: T5_CAPEITEM_FW_THETFORD                                          : Expert's Thetford Cape
1667: T5_CAPEITEM_FW_THETFORD@1                                        : Expert's Thetford Cape
1668: T5_CAPEITEM_FW_THETFORD@2                                        : Expert's Thetford Cape
1669: T5_CAPEITEM_FW_THETFORD@3                                        : Expert's Thetford Cape
1670: T6_CAPEITEM_FW_THETFORD                                          : Master's Thetford Cape
1671: T6_CAPEITEM_FW_THETFORD@1                                        : Master's Thetford Cape
1672: T6_CAPEITEM_FW_THETFORD@2                                        : Master's Thetford Cape
1673: T6_CAPEITEM_FW_THETFORD@3                                        : Master's Thetford Cape
1674: T7_CAPEITEM_FW_THETFORD                                          : Grandmaster's Thetford Cape
1675: T7_CAPEITEM_FW_THETFORD@1                                        : Grandmaster's Thetford Cape
1676: T7_CAPEITEM_FW_THETFORD@2                                        : Grandmaster's Thetford Cape
1677: T7_CAPEITEM_FW_THETFORD@3                                        : Grandmaster's Thetford Cape
1678: T8_CAPEITEM_FW_THETFORD                                          : Elder's Thetford Cape
1679: T8_CAPEITEM_FW_THETFORD@1                                        : Elder's Thetford Cape
1680: T8_CAPEITEM_FW_THETFORD@2                                        : Elder's Thetford Cape
1681: T8_CAPEITEM_FW_THETFORD@3                                        : Elder's Thetford Cape
1682: T4_CAPEITEM_HERETIC                                              : Adept's Heretic Cape
1683: T4_CAPEITEM_HERETIC@1                                            : Adept's Heretic Cape
1684: T4_CAPEITEM_HERETIC@2                                            : Adept's Heretic Cape
1685: T4_CAPEITEM_HERETIC@3                                            : Adept's Heretic Cape
1686: T5_CAPEITEM_HERETIC                                              : Expert's Heretic Cape
1687: T5_CAPEITEM_HERETIC@1                                            : Expert's Heretic Cape
1688: T5_CAPEITEM_HERETIC@2                                            : Expert's Heretic Cape
1689: T5_CAPEITEM_HERETIC@3                                            : Expert's Heretic Cape
1690: T6_CAPEITEM_HERETIC                                              : Master's Heretic Cape
1691: T6_CAPEITEM_HERETIC@1                                            : Master's Heretic Cape
1692: T6_CAPEITEM_HERETIC@2                                            : Master's Heretic Cape
1693: T6_CAPEITEM_HERETIC@3                                            : Master's Heretic Cape
1694: T7_CAPEITEM_HERETIC                                              : Grandmaster's Heretic Cape
1695: T7_CAPEITEM_HERETIC@1                                            : Grandmaster's Heretic Cape
1696: T7_CAPEITEM_HERETIC@2                                            : Grandmaster's Heretic Cape
1697: T7_CAPEITEM_HERETIC@3                                            : Grandmaster's Heretic Cape
1698: T8_CAPEITEM_HERETIC                                              : Elder's Heretic Cape
1699: T8_CAPEITEM_HERETIC@1                                            : Elder's Heretic Cape
1700: T8_CAPEITEM_HERETIC@2                                            : Elder's Heretic Cape
1701: T8_CAPEITEM_HERETIC@3                                            : Elder's Heretic Cape
1702: T4_CAPEITEM_UNDEAD                                               : Adept's Undead Cape
1703: T4_CAPEITEM_UNDEAD@1                                             : Adept's Undead Cape
1704: T4_CAPEITEM_UNDEAD@2                                             : Adept's Undead Cape
1705: T4_CAPEITEM_UNDEAD@3                                             : Adept's Undead Cape
1706: T5_CAPEITEM_UNDEAD                                               : Expert's Undead Cape
1707: T5_CAPEITEM_UNDEAD@1                                             : Expert's Undead Cape
1708: T5_CAPEITEM_UNDEAD@2                                             : Expert's Undead Cape
1709: T5_CAPEITEM_UNDEAD@3                                             : Expert's Undead Cape
1710: T6_CAPEITEM_UNDEAD                                               : Master's Undead Cape
1711: T6_CAPEITEM_UNDEAD@1                                             : Master's Undead Cape
1712: T6_CAPEITEM_UNDEAD@2                                             : Master's Undead Cape
1713: T6_CAPEITEM_UNDEAD@3                                             : Master's Undead Cape
1714: T7_CAPEITEM_UNDEAD                                               : Grandmaster's Undead Cape
1715: T7_CAPEITEM_UNDEAD@1                                             : Grandmaster's Undead Cape
1716: T7_CAPEITEM_UNDEAD@2                                             : Grandmaster's Undead Cape
1717: T7_CAPEITEM_UNDEAD@3                                             : Grandmaster's Undead Cape
1718: T8_CAPEITEM_UNDEAD                                               : Elder's Undead Cape
1719: T8_CAPEITEM_UNDEAD@1                                             : Elder's Undead Cape
1720: T8_CAPEITEM_UNDEAD@2                                             : Elder's Undead Cape
1721: T8_CAPEITEM_UNDEAD@3                                             : Elder's Undead Cape
1722: T4_CAPEITEM_KEEPER                                               : Adept's Keeper Cape
1723: T4_CAPEITEM_KEEPER@1                                             : Adept's Keeper Cape
1724: T4_CAPEITEM_KEEPER@2                                             : Adept's Keeper Cape
1725: T4_CAPEITEM_KEEPER@3                                             : Adept's Keeper Cape
1726: T5_CAPEITEM_KEEPER                                               : Expert's Keeper Cape
1727: T5_CAPEITEM_KEEPER@1                                             : Expert's Keeper Cape
1728: T5_CAPEITEM_KEEPER@2                                             : Expert's Keeper Cape
1729: T5_CAPEITEM_KEEPER@3                                             : Expert's Keeper Cape
1730: T6_CAPEITEM_KEEPER                                               : Master's Keeper Cape
1731: T6_CAPEITEM_KEEPER@1                                             : Master's Keeper Cape
1732: T6_CAPEITEM_KEEPER@2                                             : Master's Keeper Cape
1733: T6_CAPEITEM_KEEPER@3                                             : Master's Keeper Cape
1734: T7_CAPEITEM_KEEPER                                               : Grandmaster's Keeper Cape
1735: T7_CAPEITEM_KEEPER@1                                             : Grandmaster's Keeper Cape
1736: T7_CAPEITEM_KEEPER@2                                             : Grandmaster's Keeper Cape
1737: T7_CAPEITEM_KEEPER@3                                             : Grandmaster's Keeper Cape
1738: T8_CAPEITEM_KEEPER                                               : Elder's Keeper Cape
1739: T8_CAPEITEM_KEEPER@1                                             : Elder's Keeper Cape
1740: T8_CAPEITEM_KEEPER@2                                             : Elder's Keeper Cape
1741: T8_CAPEITEM_KEEPER@3                                             : Elder's Keeper Cape
1742: T4_CAPEITEM_MORGANA                                              : Adept's Morgana Cape
1743: T4_CAPEITEM_MORGANA@1                                            : Adept's Morgana Cape
1744: T4_CAPEITEM_MORGANA@2                                            : Adept's Morgana Cape
1745: T4_CAPEITEM_MORGANA@3                                            : Adept's Morgana Cape
1746: T5_CAPEITEM_MORGANA                                              : Expert's Morgana Cape
1747: T5_CAPEITEM_MORGANA@1                                            : Expert's Morgana Cape
1748: T5_CAPEITEM_MORGANA@2                                            : Expert's Morgana Cape
1749: T5_CAPEITEM_MORGANA@3                                            : Expert's Morgana Cape
1750: T6_CAPEITEM_MORGANA                                              : Master's Morgana Cape
1751: T6_CAPEITEM_MORGANA@1                                            : Master's Morgana Cape
1752: T6_CAPEITEM_MORGANA@2                                            : Master's Morgana Cape
1753: T6_CAPEITEM_MORGANA@3                                            : Master's Morgana Cape
1754: T7_CAPEITEM_MORGANA                                              : Grandmaster's Morgana Cape
1755: T7_CAPEITEM_MORGANA@1                                            : Grandmaster's Morgana Cape
1756: T7_CAPEITEM_MORGANA@2                                            : Grandmaster's Morgana Cape
1757: T7_CAPEITEM_MORGANA@3                                            : Grandmaster's Morgana Cape
1758: T8_CAPEITEM_MORGANA                                              : Elder's Morgana Cape
1759: T8_CAPEITEM_MORGANA@1                                            : Elder's Morgana Cape
1760: T8_CAPEITEM_MORGANA@2                                            : Elder's Morgana Cape
1761: T8_CAPEITEM_MORGANA@3                                            : Elder's Morgana Cape
1762: T4_CAPEITEM_DEMON                                                : Adept's Demon Cape
1763: T4_CAPEITEM_DEMON@1                                              : Adept's Demon Cape
1764: T4_CAPEITEM_DEMON@2                                              : Adept's Demon Cape
1765: T4_CAPEITEM_DEMON@3                                              : Adept's Demon Cape
1766: T5_CAPEITEM_DEMON                                                : Expert's Demon Cape
1767: T5_CAPEITEM_DEMON@1                                              : Expert's Demon Cape
1768: T5_CAPEITEM_DEMON@2                                              : Expert's Demon Cape
1769: T5_CAPEITEM_DEMON@3                                              : Expert's Demon Cape
1770: T6_CAPEITEM_DEMON                                                : Master's Demon Cape
1771: T6_CAPEITEM_DEMON@1                                              : Master's Demon Cape
1772: T6_CAPEITEM_DEMON@2                                              : Master's Demon Cape
1773: T6_CAPEITEM_DEMON@3                                              : Master's Demon Cape
1774: T7_CAPEITEM_DEMON                                                : Grandmaster's Demon Cape
1775: T7_CAPEITEM_DEMON@1                                              : Grandmaster's Demon Cape
1776: T7_CAPEITEM_DEMON@2                                              : Grandmaster's Demon Cape
1777: T7_CAPEITEM_DEMON@3                                              : Grandmaster's Demon Cape
1778: T8_CAPEITEM_DEMON                                                : Elder's Demon Cape
1779: T8_CAPEITEM_DEMON@1                                              : Elder's Demon Cape
1780: T8_CAPEITEM_DEMON@2                                              : Elder's Demon Cape
1781: T8_CAPEITEM_DEMON@3                                              : Elder's Demon Cape
1782: UNIQUE_LOOTCHEST_FIRSTREFERRAL                                   : Recruiter's Pile of Tomes
1783: UNIQUE_LOOTCHEST_SKILLBOOKS_TELLAFRIEND                          : Pile of Tomes
1784: T2_BAG                                                           : Novice's Bag
1785: T3_BAG                                                           : Journeyman's Bag
1786: T4_BAG                                                           : Adept's Bag
1787: T4_BAG@1                                                         : Adept's Bag
1788: T4_BAG@2                                                         : Adept's Bag
1789: T4_BAG@3                                                         : Adept's Bag
1790: T5_BAG                                                           : Expert's Bag
1791: T5_BAG@1                                                         : Expert's Bag
1792: T5_BAG@2                                                         : Expert's Bag
1793: T5_BAG@3                                                         : Expert's Bag
1794: T6_BAG                                                           : Master's Bag
1795: T6_BAG@1                                                         : Master's Bag
1796: T6_BAG@2                                                         : Master's Bag
1797: T6_BAG@3                                                         : Master's Bag
1798: T7_BAG                                                           : Grandmaster's Bag
1799: T7_BAG@1                                                         : Grandmaster's Bag
1800: T7_BAG@2                                                         : Grandmaster's Bag
1801: T7_BAG@3                                                         : Grandmaster's Bag
1802: T8_BAG                                                           : Elder's Bag
1803: T8_BAG@1                                                         : Elder's Bag
1804: T8_BAG@2                                                         : Elder's Bag
1805: T8_BAG@3                                                         : Elder's Bag
1806: T1_2H_TOOL_PICK                                                  : Beginner's Pickaxe
1807: T2_2H_TOOL_PICK                                                  : Novice's Pickaxe
1808: T3_2H_TOOL_PICK                                                  : Journeyman's Pickaxe
1809: T4_2H_TOOL_PICK                                                  : Adept's Pickaxe
1810: T5_2H_TOOL_PICK                                                  : Expert's Pickaxe
1811: T6_2H_TOOL_PICK                                                  : Master's Pickaxe
1812: T7_2H_TOOL_PICK                                                  : Grandmaster's Pickaxe
1813: T8_2H_TOOL_PICK                                                  : Elder's Pickaxe
1814: T4_2H_TOOL_PICK_AVALON                                           : Adept's Avalonian Pickaxe
1815: T5_2H_TOOL_PICK_AVALON                                           : Expert's Avalonian Pickaxe
1816: T6_2H_TOOL_PICK_AVALON                                           : Master's Avalonian Pickaxe
1817: T7_2H_TOOL_PICK_AVALON                                           : Grandmaster's Avalonian Pickaxe
1818: T8_2H_TOOL_PICK_AVALON                                           : Elder's Avalonian Pickaxe
1819: T1_2H_TOOL_HAMMER                                                : Beginner's Stone Hammer
1820: T2_2H_TOOL_HAMMER                                                : Novice's Stone Hammer
1821: T3_2H_TOOL_HAMMER                                                : Journeyman's Stone Hammer
1822: T4_2H_TOOL_HAMMER                                                : Adept's Stone Hammer
1823: T5_2H_TOOL_HAMMER                                                : Expert's Stone Hammer
1824: T6_2H_TOOL_HAMMER                                                : Master's Stone Hammer
1825: T7_2H_TOOL_HAMMER                                                : Grandmaster's Stone Hammer
1826: T8_2H_TOOL_HAMMER                                                : Elder's Stone Hammer
1827: T4_2H_TOOL_HAMMER_AVALON                                         : Adept's Avalonian Stone Hammer
1828: T5_2H_TOOL_HAMMER_AVALON                                         : Expert's Avalonian Stone Hammer
1829: T6_2H_TOOL_HAMMER_AVALON                                         : Master's Avalonian Stone Hammer
1830: T7_2H_TOOL_HAMMER_AVALON                                         : Grandmaster's Avalonian Stone Hammer
1831: T8_2H_TOOL_HAMMER_AVALON                                         : Elder's Avalonian Stone Hammer
1832: T1_2H_TOOL_AXE                                                   : Beginner's Axe
1833: T2_2H_TOOL_AXE                                                   : Novice's Axe
1834: T3_2H_TOOL_AXE                                                   : Journeyman's Axe
1835: T4_2H_TOOL_AXE                                                   : Adept's Axe
1836: T5_2H_TOOL_AXE                                                   : Expert's Axe
1837: T6_2H_TOOL_AXE                                                   : Master's Axe
1838: T7_2H_TOOL_AXE                                                   : Grandmaster's Axe
1839: T8_2H_TOOL_AXE                                                   : Elder's Axe
1840: T4_2H_TOOL_AXE_AVALON                                            : Adept's Avalonian Axe
1841: T5_2H_TOOL_AXE_AVALON                                            : Expert's Avalonian Axe
1842: T6_2H_TOOL_AXE_AVALON                                            : Master's Avalonian Axe
1843: T7_2H_TOOL_AXE_AVALON                                            : Grandmaster's Avalonian Axe
1844: T8_2H_TOOL_AXE_AVALON                                            : Elder's Avalonian Axe
1845: T1_2H_TOOL_SICKLE                                                : Beginner's Sickle
1846: T2_2H_TOOL_SICKLE                                                : Novice's Sickle
1847: T3_2H_TOOL_SICKLE                                                : Journeyman's Sickle
1848: T4_2H_TOOL_SICKLE                                                : Adept's Sickle
1849: T5_2H_TOOL_SICKLE                                                : Expert's Sickle
1850: T6_2H_TOOL_SICKLE                                                : Master's Sickle
1851: T7_2H_TOOL_SICKLE                                                : Grandmaster's Sickle
1852: T8_2H_TOOL_SICKLE                                                : Elder's Sickle
1853: T4_2H_TOOL_SICKLE_AVALON                                         : Adept's Avalonian Sickle
1854: T5_2H_TOOL_SICKLE_AVALON                                         : Expert's Avalonian Sickle
1855: T6_2H_TOOL_SICKLE_AVALON                                         : Master's Avalonian Sickle
1856: T7_2H_TOOL_SICKLE_AVALON                                         : Grandmaster's Avalonian Sickle
1857: T8_2H_TOOL_SICKLE_AVALON                                         : Elder's Avalonian Sickle
1858: T1_2H_TOOL_KNIFE                                                 : Beginner's Skinning Knife
1859: T2_2H_TOOL_KNIFE                                                 : Novice's Skinning Knife
1860: T3_2H_TOOL_KNIFE                                                 : Journeyman's Skinning Knife
1861: T4_2H_TOOL_KNIFE                                                 : Adept's Skinning Knife
1862: T5_2H_TOOL_KNIFE                                                 : Expert's Skinning Knife
1863: T6_2H_TOOL_KNIFE                                                 : Master's Skinning Knife
1864: T7_2H_TOOL_KNIFE                                                 : Grandmaster's Skinning Knife
1865: T8_2H_TOOL_KNIFE                                                 : Elder's Skinning Knife
1866: T4_2H_TOOL_KNIFE_AVALON                                          : Adept's Avalonian Skinning Knife
1867: T5_2H_TOOL_KNIFE_AVALON                                          : Expert's Avalonian Skinning Knife
1868: T6_2H_TOOL_KNIFE_AVALON                                          : Master's Avalonian Skinning Knife
1869: T7_2H_TOOL_KNIFE_AVALON                                          : Grandmaster's Avalonian Skinning Knife
1870: T8_2H_TOOL_KNIFE_AVALON                                          : Elder's Avalonian Skinning Knife
1871: T2_2H_TOOL_SIEGEHAMMER                                           : Novice's Demolition Hammer
1872: T3_2H_TOOL_SIEGEHAMMER                                           : Journeyman's Demolition Hammer
1873: T4_2H_TOOL_SIEGEHAMMER                                           : Adept's Demolition Hammer
1874: T5_2H_TOOL_SIEGEHAMMER                                           : Expert's Demolition Hammer
1875: T6_2H_TOOL_SIEGEHAMMER                                           : Master's Demolition Hammer
1876: T7_2H_TOOL_SIEGEHAMMER                                           : Grandmaster's Demolition Hammer
1877: T8_2H_TOOL_SIEGEHAMMER                                           : Elder's Demolition Hammer
1878: T4_2H_TOOL_SIEGEHAMMER_AVALON                                    : Adept's Avalonian Demolition Hammer
1879: T5_2H_TOOL_SIEGEHAMMER_AVALON                                    : Expert's Avalonian Demolition Hammer
1880: T6_2H_TOOL_SIEGEHAMMER_AVALON                                    : Master's Avalonian Demolition Hammer
1881: T7_2H_TOOL_SIEGEHAMMER_AVALON                                    : Grandmaster's Avalonian Demolition Hammer
1882: T8_2H_TOOL_SIEGEHAMMER_AVALON                                    : Elder's Avalonian Demolition Hammer
1883: T3_2H_TOOL_FISHINGROD                                            : Journeyman's Fishing Rod
1884: T4_2H_TOOL_FISHINGROD                                            : Adept's Fishing Rod
1885: T5_2H_TOOL_FISHINGROD                                            : Expert's Fishing Rod
1886: T6_2H_TOOL_FISHINGROD                                            : Master's Fishing Rod
1887: T7_2H_TOOL_FISHINGROD                                            : Grandmaster's Fishing Rod
1888: T8_2H_TOOL_FISHINGROD                                            : Elder's Fishing Rod
1889: T4_2H_TOOL_FISHINGROD_AVALON                                     : Adept's Avalonian Fishing Rod
1890: T5_2H_TOOL_FISHINGROD_AVALON                                     : Expert's Avalonian Fishing Rod
1891: T6_2H_TOOL_FISHINGROD_AVALON                                     : Master's Avalonian Fishing Rod
1892: T7_2H_TOOL_FISHINGROD_AVALON                                     : Grandmaster's Avalonian Fishing Rod
1893: T8_2H_TOOL_FISHINGROD_AVALON                                     : Elder's Avalonian Fishing Rod
1894: T2_MOUNT_MULE                                                    : Novice's Mule
1895: T3_MOUNT_HORSE                                                   : Journeyman's Riding Horse
1896: T4_MOUNT_HORSE                                                   : Adept's Riding Horse
1897: T5_MOUNT_HORSE                                                   : Expert's Riding Horse
1898: T6_MOUNT_HORSE                                                   : Master's Riding Horse
1899: T7_MOUNT_HORSE                                                   : Grandmaster's Riding Horse
1900: T8_MOUNT_HORSE                                                   : Elder's Riding Horse
1901: T5_MOUNT_ARMORED_HORSE                                           : Expert's Armored Horse
1902: T6_MOUNT_ARMORED_HORSE                                           : Master's Armored Horse
1903: T7_MOUNT_ARMORED_HORSE                                           : Grandmaster's Armored Horse
1904: T8_MOUNT_ARMORED_HORSE                                           : Elder's Armored Horse
1905: T3_MOUNT_OX                                                      : Journeyman's Transport Ox
1906: T4_MOUNT_OX                                                      : Adept's Transport Ox
1907: T5_MOUNT_OX                                                      : Expert's Transport Ox
1908: T6_MOUNT_OX                                                      : Master's Transport Ox
1909: T7_MOUNT_OX                                                      : Grandmaster's Transport Ox
1910: T8_MOUNT_OX                                                      : Elder's Transport Ox
1911: T4_MOUNT_GIANTSTAG                                               : Adept's Giant Stag
1912: T6_MOUNT_DIREWOLF                                                : Direwolf
1913: T7_MOUNT_DIREBOAR                                                : Saddled Direboar
1914: T7_MOUNT_SWAMPDRAGON                                             : Saddled Swamp Dragon
1915: T8_MOUNT_DIREBEAR                                                : Saddled Direbear
1916: T8_MOUNT_MAMMOTH_TRANSPORT                                       : Elder's Transport Mammoth
1917: T5_MOUNT_MOABIRD_FW_BRIDGEWATCH                                  : Saddled Moabird
1918: T5_MOUNT_DIREBEAR_FW_FORTSTERLING                                : Saddled Winter Bear
1919: T5_MOUNT_DIREBOAR_FW_LYMHURST                                    : Saddled Wild Boar
1920: T5_MOUNT_RAM_FW_MARTLOCK                                         : Saddled Bighorn Ram
1921: T5_MOUNT_SWAMPDRAGON_FW_THETFORD                                 : Saddled Swamp Salamander
1922: T8_MOUNT_MAMMOTH_BATTLE@1                                        : Elder's Command Mammoth
1923: T7_MOUNT_SWAMPDRAGON_BATTLE                                      : Flame Basilisk
1924: T7_MOUNT_ARMORED_SWAMPDRAGON_BATTLE                              : Venom Basilisk
1925: T6_MOUNT_SIEGE_BALLISTA                                          : Siege Ballista
1926: T8_MOUNT_HORSE_UNDEAD@1                                          : Spectral Bonehorse
1927: T5_MOUNT_COUGAR_KEEPER@1                                         : Swiftclaw
1928: T8_MOUNT_COUGAR_KEEPER@1                                         : Rageclaw
1929: T8_MOUNT_ARMORED_HORSE_MORGANA@1                                 : Morgana Nightmare
1930: UNIQUE_MOUNT_RAM_XMAS                                            : Yule Ram
1931: T7_MOUNT_SWAMPDRAGON_AVALON_BASILISK                             : Avalonian Basilisk
1932: UNIQUE_MOUNT_RAM_TELLAFRIEND                                     : Recruiter's Ram
1933: UNIQUE_MOUNT_MOABIRD_TELLAFRIEND                                 : Recruiter's Moabird
1934: UNIQUE_MOUNT_BAT_TELLAFRIEND                                     : Recruiter's Saddled Bat
1935: UNIQUE_MOUNT_GIANTTOAD_TELLAFRIEND                               : Recruiter's Toad
1936: UNIQUE_MOUNT_PANDA_TELLAFRIEND                                   
1937: UNIQUE_MOUNT_GIANTTOAD_02_TELLAFRIEND                            : Recruiter's Giant Frog
1938: T5_MOUNT_ARMORED_HORSE_SKIN_01                                   : Expert's Warhorse
1939: T6_MOUNT_ARMORED_HORSE_SKIN_01                                   : Master's Warhorse
1940: T7_MOUNT_ARMORED_HORSE_SKIN_01                                   : Grandmaster's Warhorse
1941: T8_MOUNT_ARMORED_HORSE_SKIN_01                                   : Elder's Warhorse
1942: UNIQUE_MOUNT_BAT_PERSONAL                                        : Spectral Bat
1943: T7_MOUNT_MONITORLIZARD_ADC                                       : Pest Lizard
1944: T7_MOUNT_HUSKY_ADC                                               : Snow Husky
1945: T6_MOUNT_FROSTRAM_ADC                                            : Frost Ram
1946: T7_MOUNT_TERRORBIRD_ADC                                          : Saddled Terrorbird
1947: UNIQUE_MOUNT_BEAR_KEEPER_ADC                                     : Grizzly Bear
1948: UNIQUE_MOUNT_BLACK_PANTHER_ADC                                   : Black Panther
1949: UNIQUE_MOUNT_MORGANA_RAVEN_ADC                                   : Morgana Raven
1950: UNIQUE_MOUNT_GIANT_HORSE_ADC                                     : Giant Horse
1951: UNIQUE_MOUNT_UNDEAD_DIREBOAR_ADC                                 : Spectral Direboar
1952: UNIQUE_MOUNT_RHINO_SEASON_CRYSTAL                                : Crystal Battle Rhino
1953: UNIQUE_MOUNT_RHINO_SEASON_GOLD                                   : Gold Battle Rhino
1954: UNIQUE_MOUNT_RHINO_SEASON_SILVER                                 : Silver Battle Rhino
1955: UNIQUE_MOUNT_RHINO_SEASON_BRONZE                                 : Bronze Battle Rhino
1956: UNIQUE_MOUNT_TOWER_CHARIOT_CRYSTAL                               : Crystal Tower Chariot
1957: UNIQUE_MOUNT_TOWER_CHARIOT_GOLD                                  : Gold Tower Chariot
1958: UNIQUE_MOUNT_TOWER_CHARIOT_SILVER                                : Silver Tower Chariot
1959: UNIQUE_MOUNT_ARMORED_EAGLE_CRYSTAL                               : Crystal Battle Eagle
1960: UNIQUE_MOUNT_ARMORED_EAGLE_GOLD                                  : Gold Battle Eagle
1961: UNIQUE_MOUNT_ARMORED_EAGLE_SILVER                                : Silver Battle Eagle
1962: UNIQUE_MOUNT_BEETLE_SILVER                                       : Silver Colossus Beetle
1963: UNIQUE_MOUNT_BEETLE_GOLD                                         : Gold Colossus Beetle
1964: UNIQUE_MOUNT_BEETLE_CRYSTAL                                      : Crystal Colossus Beetle
1965: UNIQUE_MOUNT_RHINO_TELLAFRIEND                                   
1966: UNIQUE_MOUNT_GIANTSTAG_FOUNDER_EPIC                              : Epic Explorer's Giant Stag
1967: T4_FURNITUREITEM_REPAIRKIT                                       : Adept's Repair Kit
1968: T5_FURNITUREITEM_REPAIRKIT                                       : Expert's Repair Kit
1969: T6_FURNITUREITEM_REPAIRKIT                                       : Master's Repair Kit
1970: T7_FURNITUREITEM_REPAIRKIT                                       : Grandmaster's Repair Kit
1971: T8_FURNITUREITEM_REPAIRKIT                                       : Elder's Repair Kit
1972: T2_FURNITUREITEM_GUILDBANNER_FABRIC                              : Guild Banner on Fabric
1973: T3_FURNITUREITEM_GUILDBANNER_FABRIC                              : Guild Banner on Fabric
1974: T4_FURNITUREITEM_GUILDBANNER_FABRIC                              : Guild Banner on Fabric
1975: T5_FURNITUREITEM_GUILDBANNER_FABRIC                              : Guild Banner on Fabric
1976: T2_FURNITUREITEM_GUILDBANNER_SHIELD                              : Guild Banner on Shield
1977: T3_FURNITUREITEM_GUILDBANNER_SHIELD                              : Guild Banner on Shield
1978: T4_FURNITUREITEM_GUILDBANNER_SHIELD                              : Guild Banner on Shield
1979: T5_FURNITUREITEM_GUILDBANNER_SHIELD                              : Guild Banner on Shield
1980: T3_FURNITUREITEM_ANNIVERSARYBANNER                               : Anniversary Banner
1981: UNIQUE_FURNITUREITEM_TELLAFRIEND_CHEST_A@1                       : Recruiter's Crate
1982: UNIQUE_FURNITUREITEM_TELLAFRIEND_CHEST_B@1                       : Recruiter's Chest
1983: UNIQUE_FURNITUREITEM_TELLAFRIEND_CHEST_C@1                       : Recruiter's Wooden Chest
1984: UNIQUE_FURNITUREITEM_TELLAFRIEND_CHEST_COMPANION@1               : Recruiter's Companion Crate
1985: UNIQUE_FURNITUREITEM_TELLAFRIEND_CHEST_BARREL@1                  : Recruiter's Barrel-crate
1986: UNIQUE_FURNITUREITEM_TELLAFRIEND_CHEST_MERLINCUBE@1              : Recruiter's Merlyn Cube
1987: UNIQUE_FURNITUREITEM_TELLAFRIEND_CHEST_SARCOPHAGUS               : Recruiter's Sarcophagus Chest
1988: UNIQUE_FURNITUREITEM_TELLAFRIEND_DEER_STATUE                     : Recruiter's Deer Statue
1989: UNIQUE_FURNITUREITEM_TELLAFRIEND_HUNTER_STATUE                   : Recruiter's Hunter Statue
1990: UNIQUE_FURNITUREITEM_TELLAFRIEND_CHEST_BARREL_B@1                : Recruiter's Storage-Barrel
1991: UNIQUE_FURNITUREITEM_TELLAFRIEND_BANNER_A                        : Recruiter's Guild Banner
1992: T2_FURNITUREITEM_BED                                             : Novice's Bed
1993: T3_FURNITUREITEM_BED                                             : Journeyman's Bed
1994: T4_FURNITUREITEM_BED                                             : Adept's Bed
1995: T5_FURNITUREITEM_BED                                             : Expert's Bed
1996: T6_FURNITUREITEM_BED                                             : Master's Bed
1997: T7_FURNITUREITEM_BED                                             : Grandmaster's Bed
1998: T8_FURNITUREITEM_BED                                             : Elder's Bed
1999: T2_FURNITUREITEM_CHEST                                           : Novice's Chest
2000: T3_FURNITUREITEM_CHEST                                           : Journeyman's Chest
2001: T4_FURNITUREITEM_CHEST                                           : Adept's Chest
2002: T5_FURNITUREITEM_CHEST                                           : Expert's Chest
2003: T3_VANITY_CONSUMABLE_FIREWORKS_BLUE                              : Royal Blue Fireworks
2004: T3_VANITY_CONSUMABLE_FIREWORKS_GREEN                             : Royal Green Fireworks
2005: T3_VANITY_CONSUMABLE_FIREWORKS_YELLOW                            : Royal Yellow Fireworks
2006: T3_VANITY_CONSUMABLE_FIREWORKS_RED                               : Royal Red Fireworks
2007: T3_VANITY_CONSUMABLE_FIREWORKS_BLUE_NONTRADABLE                  : Royal Blue Fireworks
2008: T3_VANITY_CONSUMABLE_FIREWORKS_GREEN_NONTRADABLE                 : Royal Green Fireworks
2009: T3_VANITY_CONSUMABLE_FIREWORKS_YELLOW_NONTRADABLE                : Royal Yellow Fireworks
2010: T3_VANITY_CONSUMABLE_FIREWORKS_RED_NONTRADABLE                   : Royal Red Fireworks
2011: UNIQUE_CONSUMABLE_EVENT_WINTER_2017                              : Snowball
2012: T2_FURNITUREITEM_TABLE                                           : Novice's Table
2013: T3_FURNITUREITEM_TABLE                                           : Journeyman's Table
2014: T4_FURNITUREITEM_TABLE                                           : Adept's Table
2015: T5_FURNITUREITEM_TABLE                                           : Expert's Table
2016: T6_FURNITUREITEM_TABLE                                           : Master's Table
2017: T7_FURNITUREITEM_TABLE                                           : Grandmaster's Table
2018: T8_FURNITUREITEM_TABLE                                           : Elder's Table
2019: UNIQUE_FURNITUREITEM_XMAS_FILL_CITY_TREE_A                       : Decorated Pine Tree
2020: UNIQUE_FURNITUREITEM_XMAS_FILL_CITY_TREE_B                       : Small Decorated Pine Tree
2021: UNIQUE_FURNITUREITEM_XMAS_PRESENT                                : Present Box
2022: UNIQUE_FURNITUREITEM_EASTER_CHEST                                : Egg-shaped Chest
2023: UNIQUE_FURNITUREITEM_VANITY_ARENA_BANNER_01                      : Modest Arena Display
2024: UNIQUE_FURNITUREITEM_VANITY_ARENA_BANNER_02                      : Grand Arena Display
2025: UNIQUE_FURNITUREITEM_VANITY_ARENA_BANNER_03                      : Glorious Arena Display
2026: PLAYERISLAND_FURNITUREITEM_FARM_DECO_B                           : Haystack
2027: PLAYERISLAND_FURNITUREITEM_FARM_DECO_C                           : Haystack and cart
2028: PLAYERISLAND_FURNITUREITEM_FARM_DECO_D                           : Tree stump with pumpkins
2029: PLAYERISLAND_FURNITUREITEM_STONE_FIREBOWL_A                      : Fire bowl
2030: PLAYERISLAND_FURNITUREITEM_STONE_FIREBOWL_B                      : Fire bowl with pedestal
2031: PLAYERISLAND_FURNITUREITEM_STONE_MAGIC_EMBLEM_GROUND_A           : Small arcane stone sigil
2032: PLAYERISLAND_FURNITUREITEM_STONE_MAGIC_EMBLEM_GROUND_B           : Arcane stone sigil
2033: PLAYERISLAND_FURNITUREITEM_STONE_NATURE_EMBLEM_GROUND_A          : Small nature stone sigil
2034: PLAYERISLAND_FURNITUREITEM_STONE_NATURE_EMBLEM_GROUND_B          : Nature stone sigil
2035: PLAYERISLAND_FURNITUREITEM_STONE_STATUE_A                        : Scholar statue
2036: PLAYERISLAND_FURNITUREITEM_STONE_STATUE_A_BROKEN                 : Broken scholar statue
2037: PLAYERISLAND_FURNITUREITEM_STONE_STATUE_HUNTER_A                 : Hunting sculpture
2038: PLAYERISLAND_FURNITUREITEM_STONE_STATUE_HUNTER_B                 : Hunter statue
2039: PLAYERISLAND_FURNITUREITEM_STONE_STATUE_MAGE_A                   : Book sculpture
2040: PLAYERISLAND_FURNITUREITEM_STONE_STATUE_MAGE_B                   : Magician statue
2041: PLAYERISLAND_FURNITUREITEM_STONE_STATUE_SWORD_A                  : Small sword sculpture
2042: PLAYERISLAND_FURNITUREITEM_STONE_STATUE_SWORD_B                  : Sword sculpture
2043: PLAYERISLAND_FURNITUREITEM_STONE_STATUE_WARRIOR_A                : Sword and shield sculpture
2044: PLAYERISLAND_FURNITUREITEM_STONE_STATUE_WARRIOR_B                : Warrior statue
2045: PLAYERISLAND_FURNITUREITEM_STONE_VALOR_EMBLEM_GROUND_A           : Small valorous stone sigil
2046: PLAYERISLAND_FURNITUREITEM_STONE_VALOR_EMBLEM_GROUND_B           : Valorous stone sigil
2047: PLAYERISLAND_FURNITUREITEM_STONE_WELL_A                          : Stone well
2048: PLAYERISLAND_FURNITUREITEM_VEGETATION_TREE_DECO_A                : Autumn tree
2049: PLAYERISLAND_FURNITUREITEM_VEGETATION_TREE_DECO_B                : Summer tree
2050: PLAYERISLAND_FURNITUREITEM_VEGETATION_TREE_DECO_C                : Spring tree
2051: PLAYERISLAND_FURNITUREITEM_VEGETATION_TREE_DOMESTIC_A            : Small fruit tree
2052: PLAYERISLAND_FURNITUREITEM_VEGETATION_TREE_DOMESTIC_B            : Fruit tree
2053: PLAYERISLAND_FURNITUREITEM_WOOD_BUNTING_A                        : Bunting portal
2054: PLAYERISLAND_FURNITUREITEM_WOOD_FENCE_WATCHTOWER_A               : Wooden watchtower
2055: PLAYERISLAND_FURNITUREITEM_WOOD_FLOOR_SIGN_A                     : Wooden sign
2056: PLAYERISLAND_FURNITUREITEM_WOOD_GATE_A                           : Wooden entrance
2057: PLAYERISLAND_FURNITUREITEM_WOOD_GATE_BIG_B                       : Wooden gate
2058: PLAYERISLAND_FURNITUREITEM_WOOD_LAUNDRY_A                        : Clothes line
2059: PLAYERISLAND_FURNITUREITEM_WOOD_FISH_A                           : Fish line
2060: PLAYERISLAND_FURNITUREITEM_VEGETATION_FLOWER_A                   : Flower vase
2061: PLAYERISLAND_FURNITUREITEM_WOOD_LANTERN_A                        : Simple lantern
2062: PLAYERISLAND_FURNITUREITEM_WOOD_LANTERN_CORNER_A                 : Corner lantern
2063: PLAYERISLAND_FURNITUREITEM_WOOD_CANDELABRA_A                     : Candelabra
2064: PLAYERISLAND_FURNITUREITEM_WOOD_BARREL_A                         : Barrel with candle
2065: PLAYERISLAND_FURNITUREITEM_FARM_SCARECROW_A                      
2066: PLAYERISLAND_FURNITUREITEM_FARM_FOODCONTAINER_MEDIUM             
2067: PLAYERISLAND_FURNITUREITEM_FARM_FOODCONTAINER_LARGE              
2068: PLAYERISLAND_FURNITUREITEM_FARM_FOODCONTAINER_SMALL              
2069: PLAYERISLAND_FURNITUREITEM_FARM_LATRINE_A                        
2070: PLAYERISLAND_FURNITUREITEM_FARM_WATERTOWER_A                     
2071: PLAYERISLAND_FURNITUREITEM_FARM_BIRDHOUSE_A                      
2072: PLAYERISLAND_FURNITUREITEM_FARM_DOG_HUT_A                        
2073: PLAYERISLAND_FURNITUREITEM_NOBLE_FOUNTAIN_A                      
2074: PLAYERISLAND_FURNITUREITEM_NOBLE_BENCH_A                         
2075: PLAYERISLAND_FURNITUREITEM_NOBLE_STREET_LANTERN_A                
2076: PLAYERISLAND_FURNITUREITEM_NOBLE_HEDGE_A                         
2077: PLAYERISLAND_FURNITUREITEM_NOBLE_HEDGE_SMALL_A                   
2078: PLAYERISLAND_FURNITUREITEM_NOBLE_HEDGE_RECTANGLE_A               
2079: PLAYERISLAND_FURNITUREITEM_NOBLE_HEDGE_PYRAMID_A                 
2080: PLAYERISLAND_FURNITUREITEM_NOBLE_HEDGE_SPHERE_A                  
2081: PLAYERISLAND_FURNITUREITEM_NOBLE_STONE_PATH_A                    
2082: PLAYERISLAND_FURNITUREITEM_NOBLE_STONE_PATH_PLATFORM_A           
2083: UNIQUE_FURNITUREITEM_MORGANA_TORCH_A                             : Flambeau (Disciples of Morgana)
2084: UNIQUE_FURNITUREITEM_MORGANA_TORCH_C@1                           : Raven Standard Flambeau (Disciples of Morgana)
2085: UNIQUE_FURNITUREITEM_MORGANA_PENTAGRAM@3                         : Pentagram (Disciples of Morgana)
2086: UNIQUE_FURNITUREITEM_MORGANA_FIREBOWL_B                          : Simple Brazier (Disciples of Morgana)
2087: UNIQUE_FURNITUREITEM_MORGANA_FIREBOWL_C@1                        : Reinforced Brazier (Disciples of Morgana)
2088: UNIQUE_FURNITUREITEM_MORGANA_CAMPFIRE_D@2                        : Cauldron (Disciples of Morgana)
2089: UNIQUE_FURNITUREITEM_MORGANA_SACRIFICE_ALTAR_A                   : Raven Standard Shrine (Disciples of Morgana)
2090: UNIQUE_FURNITUREITEM_MORGANA_SIEGE_BALLISTA_A@2                  : Siege Ballista (Disciples of Morgana)
2091: UNIQUE_FURNITUREITEM_MORGANA_STANDARD_A                          : Raven Standard (Disciples of Morgana)
2092: UNIQUE_FURNITUREITEM_MORGANA_WEAPONCRATE_A@2                     : Army Crate (Disciples of Morgana)
2093: UNIQUE_FURNITUREITEM_MORGANA_PRISON_CELL_C@3                     : Prisoner Cage (Disciples of Morgana)
2094: UNIQUE_FURNITUREITEM_MORGANA_TENT_A@3                            : Soldier's Tent (Disciples of Morgana)
2095: UNIQUE_FURNITUREITEM_MORGANA_STATUE_A                            : Morgana Cultist Statue
2096: UNIQUE_FURNITUREITEM_MORGANA_ARCHWAY_A                           : Morgana Stone Archway
2097: UNIQUE_FURNITUREITEM_MORGANA_CANDLESTAND_A                       : Morgana Candle Stand
2098: UNIQUE_FURNITUREITEM_MORGANA_CARPET_A                            : Morgana Carpet
2099: UNIQUE_FURNITUREITEM_KEEPER_SYMBOL_A                             : Keeper Symbol
2100: UNIQUE_FURNITUREITEM_KEEPER_CANDLE_A                             : Keeper Ceremonial Candle
2101: UNIQUE_FURNITUREITEM_KEEPER_SHRINE_A                             : Keeper Shrine
2102: UNIQUE_FURNITUREITEM_KEEPER_CAMP_FIRE_A                          : Keeper Campfire
2103: UNIQUE_FURNITUREITEM_KEEPER_ALTAR_A                              : Keeper Altar
2104: UNIQUE_FURNITUREITEM_KEEPER_FLAG_A                               : Keeper Flag
2105: UNIQUE_FURNITUREITEM_KEEPER_SYMBOL_OF_POWER_A                    : Keeper Symbol of Power
2106: UNIQUE_FURNITUREITEM_KEEPER_STAR_OF_POWER_A                      : Keeper Star of Power
2107: UNIQUE_FURNITUREITEM_KEEPER_FIREBOWL                             : Keeper Fire Bowl
2108: UNIQUE_FURNITUREITEM_KEEPER_CAULDRON                             : Keeper Cauldron
2109: UNIQUE_FURNITUREITEM_KEEPER_HEATER                               : Keeper Rock Fireplace
2110: UNIQUE_FURNITUREITEM_HERETIC_FOOD_PILE                           : Heretic Food Stash
2111: UNIQUE_FURNITUREITEM_HERETIC_ANIMAL_CAGES                        : Heretic Animal Cages
2112: UNIQUE_FURNITUREITEM_HERETIC_WEAPON_RACK                         : Heretic Weapon Rack
2113: UNIQUE_FURNITUREITEM_HERETIC_TRAINING_DUMMY                      : Heretic Training Dummy
2114: UNIQUE_FURNITUREITEM_HERETIC_PALLISADE                           : Heretic Palisade
2115: UNIQUE_FURNITUREITEM_HERETIC_GAME_TABLE                          : Heretic Game Table
2116: UNIQUE_FURNITUREITEM_HERETIC_FLAG                                : Heretic Flag
2117: UNIQUE_FURNITUREITEM_HERETIC_PLANNING_TABLE                      : Heretic Chief's Table
2118: UNIQUE_FURNITUREITEM_HERETIC_TENT                                : Heretic Tent
2119: UNIQUE_FURNITUREITEM_ADC_GRAVE_A                                 : Tomb of the Unknown
2120: UNIQUE_FURNITUREITEM_ADC_GRAVE_B                                 : Memorial of the Fallen
2121: UNIQUE_FURNITUREITEM_ADC_ICESCULPTURE_A                          : Ice Sculpture: Bonecrusher Berserker
2122: UNIQUE_FURNITUREITEM_ADC_ICESCULPTURE_B                          : Ice Sculpture: Cursed Archer
2123: UNIQUE_FURNITUREITEM_ADC_ICESCULPTURE_C                          : Ice Sculpture: Obsessed Cultist
2124: UNIQUE_FURNITUREITEM_ADC_STATUE_MOUNTED_DIREWOLF_A               : Wolf Rider Statue (L)
2125: UNIQUE_FURNITUREITEM_ADC_STATUE_MOUNTED_DIREWOLF_B               : Wolf Rider Statue (R)
2126: UNIQUE_FURNITUREITEM_ADC_RUG_DIREBEAR                            : Direbear Rug
2127: UNIQUE_FURNITUREITEM_ADC_RUG_WOLF                                : Wolf Rug
2128: UNIQUE_FURNITUREITEM_KNIGHT_STATUE_A                             : Knight Statue
2129: UNIQUE_FURNITUREITEM_KNIGHT_CARPET_A                             : Regal Carpet
2130: UNIQUE_FURNITUREITEM_KNIGHT_THRONE_A                             : Stone Throne
2131: UNIQUE_FURNITUREITEM_KNIGHT_ROUNDTABLE_A                         : Round Table
2132: UNIQUE_FURNITUREITEM_ADC_STATUE_MAGE_A                           : Mage Statue
2133: UNIQUE_FURNITUREITEM_ADC_HEALING_CIRCLE_A                        : Magic Rune Circle
2134: UNIQUE_FURNITUREITEM_ADC_GLASS_SPHERE_A                          : Glass Sphere
2135: UNIQUE_FURNITUREITEM_HERETIC_STOVE_A                             : Heretic Stove
2136: UNIQUE_FURNITUREITEM_HERETIC_BARREL_BURNING_A                    : Burning Barrel
2137: UNIQUE_FURNITUREITEM_HERETICS_TOOL_BOARD_A                       : Heretic Toolboard
2138: UNIQUE_FURNITUREITEM_OLD_OUTLAND_CARPET                          : Outlands Map Carpet
2139: UNIQUE_FURNITUREITEM_SEALED_CAERLEON_REALMGATE                   : Caerleon Realmgate
2140: UNIQUE_ALTAR_OF_CHEATING                                         
2141: UNIQUE_INGREDIENT_ANCHOR_FOUNDER_LEGENDARY                       : Explorer's Anchor
2142: UNIQUE_FURNITUREITEM_FOUNDER_LOOKINGGLASS                        : Explorer's Spyglass
2143: UNIQUE_FURNITUREITEM_FOUNDER_CERTIFICATE                         : Founder's Certificate
2144: UNIQUE_FURNITUREITEM_FOUNDER_STATUE                              : Founder's Statue
2145: UNIQUE_SHOES_RUBBERBANDING                                       : Rubberband Boots
2146: UNIQUE_INTERNAL_HEAD_GAMEMASTER                                  : Game Master's Hat
2147: UNIQUE_INTERNAL_ARMOR_GAMEMASTER                                 : Game Master's Doublet
2148: UNIQUE_INTERNAL_SHOES_GAMEMASTER                                 : Game Master's Boots
2149: UNIQUE_INTERNAL_OFF_SCROLL_GAMEMASTER                            : Scroll of the Law
2150: T2_HEAD_PLATE_SET1                                               : Novice's Soldier Helmet
2151: T3_HEAD_PLATE_SET1                                               : Journeyman's Soldier Helmet
2152: T4_HEAD_PLATE_SET1                                               : Adept's Soldier Helmet
2153: T4_HEAD_PLATE_SET1@1                                             : Adept's Soldier Helmet
2154: T4_HEAD_PLATE_SET1@2                                             : Adept's Soldier Helmet
2155: T4_HEAD_PLATE_SET1@3                                             : Adept's Soldier Helmet
2156: T5_HEAD_PLATE_SET1                                               : Expert's Soldier Helmet
2157: T5_HEAD_PLATE_SET1@1                                             : Expert's Soldier Helmet
2158: T5_HEAD_PLATE_SET1@2                                             : Expert's Soldier Helmet
2159: T5_HEAD_PLATE_SET1@3                                             : Expert's Soldier Helmet
2160: T6_HEAD_PLATE_SET1                                               : Master's Soldier Helmet
2161: T6_HEAD_PLATE_SET1@1                                             : Master's Soldier Helmet
2162: T6_HEAD_PLATE_SET1@2                                             : Master's Soldier Helmet
2163: T6_HEAD_PLATE_SET1@3                                             : Master's Soldier Helmet
2164: T7_HEAD_PLATE_SET1                                               : Grandmaster's Soldier Helmet
2165: T7_HEAD_PLATE_SET1@1                                             : Grandmaster's Soldier Helmet
2166: T7_HEAD_PLATE_SET1@2                                             : Grandmaster's Soldier Helmet
2167: T7_HEAD_PLATE_SET1@3                                             : Grandmaster's Soldier Helmet
2168: T8_HEAD_PLATE_SET1                                               : Elder's Soldier Helmet
2169: T8_HEAD_PLATE_SET1@1                                             : Elder's Soldier Helmet
2170: T8_HEAD_PLATE_SET1@2                                             : Elder's Soldier Helmet
2171: T8_HEAD_PLATE_SET1@3                                             : Elder's Soldier Helmet
2172: T2_ARMOR_PLATE_SET1                                              : Novice's Soldier Armor
2173: T3_ARMOR_PLATE_SET1                                              : Journeyman's Soldier Armor
2174: T4_ARMOR_PLATE_SET1                                              : Adept's Soldier Armor
2175: T4_ARMOR_PLATE_SET1@1                                            : Adept's Soldier Armor
2176: T4_ARMOR_PLATE_SET1@2                                            : Adept's Soldier Armor
2177: T4_ARMOR_PLATE_SET1@3                                            : Adept's Soldier Armor
2178: T5_ARMOR_PLATE_SET1                                              : Expert's Soldier Armor
2179: T5_ARMOR_PLATE_SET1@1                                            : Expert's Soldier Armor
2180: T5_ARMOR_PLATE_SET1@2                                            : Expert's Soldier Armor
2181: T5_ARMOR_PLATE_SET1@3                                            : Expert's Soldier Armor
2182: T6_ARMOR_PLATE_SET1                                              : Master's Soldier Armor
2183: T6_ARMOR_PLATE_SET1@1                                            : Master's Soldier Armor
2184: T6_ARMOR_PLATE_SET1@2                                            : Master's Soldier Armor
2185: T6_ARMOR_PLATE_SET1@3                                            : Master's Soldier Armor
2186: T7_ARMOR_PLATE_SET1                                              : Grandmaster's Soldier Armor
2187: T7_ARMOR_PLATE_SET1@1                                            : Grandmaster's Soldier Armor
2188: T7_ARMOR_PLATE_SET1@2                                            : Grandmaster's Soldier Armor
2189: T7_ARMOR_PLATE_SET1@3                                            : Grandmaster's Soldier Armor
2190: T8_ARMOR_PLATE_SET1                                              : Elder's Soldier Armor
2191: T8_ARMOR_PLATE_SET1@1                                            : Elder's Soldier Armor
2192: T8_ARMOR_PLATE_SET1@2                                            : Elder's Soldier Armor
2193: T8_ARMOR_PLATE_SET1@3                                            : Elder's Soldier Armor
2194: T2_SHOES_PLATE_SET1                                              : Novice's Soldier Boots
2195: T3_SHOES_PLATE_SET1                                              : Journeyman's Soldier Boots
2196: T4_SHOES_PLATE_SET1                                              : Adept's Soldier Boots
2197: T4_SHOES_PLATE_SET1@1                                            : Adept's Soldier Boots
2198: T4_SHOES_PLATE_SET1@2                                            : Adept's Soldier Boots
2199: T4_SHOES_PLATE_SET1@3                                            : Adept's Soldier Boots
2200: T5_SHOES_PLATE_SET1                                              : Expert's Soldier Boots
2201: T5_SHOES_PLATE_SET1@1                                            : Expert's Soldier Boots
2202: T5_SHOES_PLATE_SET1@2                                            : Expert's Soldier Boots
2203: T5_SHOES_PLATE_SET1@3                                            : Expert's Soldier Boots
2204: T6_SHOES_PLATE_SET1                                              : Master's Soldier Boots
2205: T6_SHOES_PLATE_SET1@1                                            : Master's Soldier Boots
2206: T6_SHOES_PLATE_SET1@2                                            : Master's Soldier Boots
2207: T6_SHOES_PLATE_SET1@3                                            : Master's Soldier Boots
2208: T7_SHOES_PLATE_SET1                                              : Grandmaster's Soldier Boots
2209: T7_SHOES_PLATE_SET1@1                                            : Grandmaster's Soldier Boots
2210: T7_SHOES_PLATE_SET1@2                                            : Grandmaster's Soldier Boots
2211: T7_SHOES_PLATE_SET1@3                                            : Grandmaster's Soldier Boots
2212: T8_SHOES_PLATE_SET1                                              : Elder's Soldier Boots
2213: T8_SHOES_PLATE_SET1@1                                            : Elder's Soldier Boots
2214: T8_SHOES_PLATE_SET1@2                                            : Elder's Soldier Boots
2215: T8_SHOES_PLATE_SET1@3                                            : Elder's Soldier Boots
2216: T4_HEAD_PLATE_SET2                                               : Adept's Knight Helmet
2217: T4_HEAD_PLATE_SET2@1                                             : Adept's Knight Helmet
2218: T4_HEAD_PLATE_SET2@2                                             : Adept's Knight Helmet
2219: T4_HEAD_PLATE_SET2@3                                             : Adept's Knight Helmet
2220: T5_HEAD_PLATE_SET2                                               : Expert's Knight Helmet
2221: T5_HEAD_PLATE_SET2@1                                             : Expert's Knight Helmet
2222: T5_HEAD_PLATE_SET2@2                                             : Expert's Knight Helmet
2223: T5_HEAD_PLATE_SET2@3                                             : Expert's Knight Helmet
2224: T6_HEAD_PLATE_SET2                                               : Master's Knight Helmet
2225: T6_HEAD_PLATE_SET2@1                                             : Master's Knight Helmet
2226: T6_HEAD_PLATE_SET2@2                                             : Master's Knight Helmet
2227: T6_HEAD_PLATE_SET2@3                                             : Master's Knight Helmet
2228: T7_HEAD_PLATE_SET2                                               : Grandmaster's Knight Helmet
2229: T7_HEAD_PLATE_SET2@1                                             : Grandmaster's Knight Helmet
2230: T7_HEAD_PLATE_SET2@2                                             : Grandmaster's Knight Helmet
2231: T7_HEAD_PLATE_SET2@3                                             : Grandmaster's Knight Helmet
2232: T8_HEAD_PLATE_SET2                                               : Elder's Knight Helmet
2233: T8_HEAD_PLATE_SET2@1                                             : Elder's Knight Helmet
2234: T8_HEAD_PLATE_SET2@2                                             : Elder's Knight Helmet
2235: T8_HEAD_PLATE_SET2@3                                             : Elder's Knight Helmet
2236: T4_ARMOR_PLATE_SET2                                              : Adept's Knight Armor
2237: T4_ARMOR_PLATE_SET2@1                                            : Adept's Knight Armor
2238: T4_ARMOR_PLATE_SET2@2                                            : Adept's Knight Armor
2239: T4_ARMOR_PLATE_SET2@3                                            : Adept's Knight Armor
2240: T5_ARMOR_PLATE_SET2                                              : Expert's Knight Armor
2241: T5_ARMOR_PLATE_SET2@1                                            : Expert's Knight Armor
2242: T5_ARMOR_PLATE_SET2@2                                            : Expert's Knight Armor
2243: T5_ARMOR_PLATE_SET2@3                                            : Expert's Knight Armor
2244: T6_ARMOR_PLATE_SET2                                              : Master's Knight Armor
2245: T6_ARMOR_PLATE_SET2@1                                            : Master's Knight Armor
2246: T6_ARMOR_PLATE_SET2@2                                            : Master's Knight Armor
2247: T6_ARMOR_PLATE_SET2@3                                            : Master's Knight Armor
2248: T7_ARMOR_PLATE_SET2                                              : Grandmaster's Knight Armor
2249: T7_ARMOR_PLATE_SET2@1                                            : Grandmaster's Knight Armor
2250: T7_ARMOR_PLATE_SET2@2                                            : Grandmaster's Knight Armor
2251: T7_ARMOR_PLATE_SET2@3                                            : Grandmaster's Knight Armor
2252: T8_ARMOR_PLATE_SET2                                              : Elder's Knight Armor
2253: T8_ARMOR_PLATE_SET2@1                                            : Elder's Knight Armor
2254: T8_ARMOR_PLATE_SET2@2                                            : Elder's Knight Armor
2255: T8_ARMOR_PLATE_SET2@3                                            : Elder's Knight Armor
2256: T4_SHOES_PLATE_SET2                                              : Adept's Knight Boots
2257: T4_SHOES_PLATE_SET2@1                                            : Adept's Knight Boots
2258: T4_SHOES_PLATE_SET2@2                                            : Adept's Knight Boots
2259: T4_SHOES_PLATE_SET2@3                                            : Adept's Knight Boots
2260: T5_SHOES_PLATE_SET2                                              : Expert's Knight Boots
2261: T5_SHOES_PLATE_SET2@1                                            : Expert's Knight Boots
2262: T5_SHOES_PLATE_SET2@2                                            : Expert's Knight Boots
2263: T5_SHOES_PLATE_SET2@3                                            : Expert's Knight Boots
2264: T6_SHOES_PLATE_SET2                                              : Master's Knight Boots
2265: T6_SHOES_PLATE_SET2@1                                            : Master's Knight Boots
2266: T6_SHOES_PLATE_SET2@2                                            : Master's Knight Boots
2267: T6_SHOES_PLATE_SET2@3                                            : Master's Knight Boots
2268: T7_SHOES_PLATE_SET2                                              : Grandmaster's Knight Boots
2269: T7_SHOES_PLATE_SET2@1                                            : Grandmaster's Knight Boots
2270: T7_SHOES_PLATE_SET2@2                                            : Grandmaster's Knight Boots
2271: T7_SHOES_PLATE_SET2@3                                            : Grandmaster's Knight Boots
2272: T8_SHOES_PLATE_SET2                                              : Elder's Knight Boots
2273: T8_SHOES_PLATE_SET2@1                                            : Elder's Knight Boots
2274: T8_SHOES_PLATE_SET2@2                                            : Elder's Knight Boots
2275: T8_SHOES_PLATE_SET2@3                                            : Elder's Knight Boots
2276: T4_HEAD_PLATE_SET3                                               : Adept's Guardian Helmet
2277: T4_HEAD_PLATE_SET3@1                                             : Adept's Guardian Helmet
2278: T4_HEAD_PLATE_SET3@2                                             : Adept's Guardian Helmet
2279: T4_HEAD_PLATE_SET3@3                                             : Adept's Guardian Helmet
2280: T5_HEAD_PLATE_SET3                                               : Expert's Guardian Helmet
2281: T5_HEAD_PLATE_SET3@1                                             : Expert's Guardian Helmet
2282: T5_HEAD_PLATE_SET3@2                                             : Expert's Guardian Helmet
2283: T5_HEAD_PLATE_SET3@3                                             : Expert's Guardian Helmet
2284: T6_HEAD_PLATE_SET3                                               : Master's Guardian Helmet
2285: T6_HEAD_PLATE_SET3@1                                             : Master's Guardian Helmet
2286: T6_HEAD_PLATE_SET3@2                                             : Master's Guardian Helmet
2287: T6_HEAD_PLATE_SET3@3                                             : Master's Guardian Helmet
2288: T7_HEAD_PLATE_SET3                                               : Grandmaster's Guardian Helmet
2289: T7_HEAD_PLATE_SET3@1                                             : Grandmaster's Guardian Helmet
2290: T7_HEAD_PLATE_SET3@2                                             : Grandmaster's Guardian Helmet
2291: T7_HEAD_PLATE_SET3@3                                             : Grandmaster's Guardian Helmet
2292: T8_HEAD_PLATE_SET3                                               : Elder's Guardian Helmet
2293: T8_HEAD_PLATE_SET3@1                                             : Elder's Guardian Helmet
2294: T8_HEAD_PLATE_SET3@2                                             : Elder's Guardian Helmet
2295: T8_HEAD_PLATE_SET3@3                                             : Elder's Guardian Helmet
2296: T4_ARMOR_PLATE_SET3                                              : Adept's Guardian Armor
2297: T4_ARMOR_PLATE_SET3@1                                            : Adept's Guardian Armor
2298: T4_ARMOR_PLATE_SET3@2                                            : Adept's Guardian Armor
2299: T4_ARMOR_PLATE_SET3@3                                            : Adept's Guardian Armor
2300: T5_ARMOR_PLATE_SET3                                              : Expert's Guardian Armor
2301: T5_ARMOR_PLATE_SET3@1                                            : Expert's Guardian Armor
2302: T5_ARMOR_PLATE_SET3@2                                            : Expert's Guardian Armor
2303: T5_ARMOR_PLATE_SET3@3                                            : Expert's Guardian Armor
2304: T6_ARMOR_PLATE_SET3                                              : Master's Guardian Armor
2305: T6_ARMOR_PLATE_SET3@1                                            : Master's Guardian Armor
2306: T6_ARMOR_PLATE_SET3@2                                            : Master's Guardian Armor
2307: T6_ARMOR_PLATE_SET3@3                                            : Master's Guardian Armor
2308: T7_ARMOR_PLATE_SET3                                              : Grandmaster's Guardian Armor
2309: T7_ARMOR_PLATE_SET3@1                                            : Grandmaster's Guardian Armor
2310: T7_ARMOR_PLATE_SET3@2                                            : Grandmaster's Guardian Armor
2311: T7_ARMOR_PLATE_SET3@3                                            : Grandmaster's Guardian Armor
2312: T8_ARMOR_PLATE_SET3                                              : Elder's Guardian Armor
2313: T8_ARMOR_PLATE_SET3@1                                            : Elder's Guardian Armor
2314: T8_ARMOR_PLATE_SET3@2                                            : Elder's Guardian Armor
2315: T8_ARMOR_PLATE_SET3@3                                            : Elder's Guardian Armor
2316: T4_SHOES_PLATE_SET3                                              : Adept's Guardian Boots
2317: T4_SHOES_PLATE_SET3@1                                            : Adept's Guardian Boots
2318: T4_SHOES_PLATE_SET3@2                                            : Adept's Guardian Boots
2319: T4_SHOES_PLATE_SET3@3                                            : Adept's Guardian Boots
2320: T5_SHOES_PLATE_SET3                                              : Expert's Guardian Boots
2321: T5_SHOES_PLATE_SET3@1                                            : Expert's Guardian Boots
2322: T5_SHOES_PLATE_SET3@2                                            : Expert's Guardian Boots
2323: T5_SHOES_PLATE_SET3@3                                            : Expert's Guardian Boots
2324: T6_SHOES_PLATE_SET3                                              : Master's Guardian Boots
2325: T6_SHOES_PLATE_SET3@1                                            : Master's Guardian Boots
2326: T6_SHOES_PLATE_SET3@2                                            : Master's Guardian Boots
2327: T6_SHOES_PLATE_SET3@3                                            : Master's Guardian Boots
2328: T7_SHOES_PLATE_SET3                                              : Grandmaster's Guardian Boots
2329: T7_SHOES_PLATE_SET3@1                                            : Grandmaster's Guardian Boots
2330: T7_SHOES_PLATE_SET3@2                                            : Grandmaster's Guardian Boots
2331: T7_SHOES_PLATE_SET3@3                                            : Grandmaster's Guardian Boots
2332: T8_SHOES_PLATE_SET3                                              : Elder's Guardian Boots
2333: T8_SHOES_PLATE_SET3@1                                            : Elder's Guardian Boots
2334: T8_SHOES_PLATE_SET3@2                                            : Elder's Guardian Boots
2335: T8_SHOES_PLATE_SET3@3                                            : Elder's Guardian Boots
2336: T4_HEAD_PLATE_UNDEAD                                             : Adept's Graveguard Helmet
2337: T4_HEAD_PLATE_UNDEAD@1                                           : Adept's Graveguard Helmet
2338: T4_HEAD_PLATE_UNDEAD@2                                           : Adept's Graveguard Helmet
2339: T4_HEAD_PLATE_UNDEAD@3                                           : Adept's Graveguard Helmet
2340: T5_HEAD_PLATE_UNDEAD                                             : Expert's Graveguard Helmet
2341: T5_HEAD_PLATE_UNDEAD@1                                           : Expert's Graveguard Helmet
2342: T5_HEAD_PLATE_UNDEAD@2                                           : Expert's Graveguard Helmet
2343: T5_HEAD_PLATE_UNDEAD@3                                           : Expert's Graveguard Helmet
2344: T6_HEAD_PLATE_UNDEAD                                             : Master's Graveguard Helmet
2345: T6_HEAD_PLATE_UNDEAD@1                                           : Master's Graveguard Helmet
2346: T6_HEAD_PLATE_UNDEAD@2                                           : Master's Graveguard Helmet
2347: T6_HEAD_PLATE_UNDEAD@3                                           : Master's Graveguard Helmet
2348: T7_HEAD_PLATE_UNDEAD                                             : Grandmaster's Graveguard Helmet
2349: T7_HEAD_PLATE_UNDEAD@1                                           : Grandmaster's Graveguard Helmet
2350: T7_HEAD_PLATE_UNDEAD@2                                           : Grandmaster's Graveguard Helmet
2351: T7_HEAD_PLATE_UNDEAD@3                                           : Grandmaster's Graveguard Helmet
2352: T8_HEAD_PLATE_UNDEAD                                             : Elder's Graveguard Helmet
2353: T8_HEAD_PLATE_UNDEAD@1                                           : Elder's Graveguard Helmet
2354: T8_HEAD_PLATE_UNDEAD@2                                           : Elder's Graveguard Helmet
2355: T8_HEAD_PLATE_UNDEAD@3                                           : Elder's Graveguard Helmet
2356: T4_ARMOR_PLATE_UNDEAD                                            : Adept's Graveguard Armor
2357: T4_ARMOR_PLATE_UNDEAD@1                                          : Adept's Graveguard Armor
2358: T4_ARMOR_PLATE_UNDEAD@2                                          : Adept's Graveguard Armor
2359: T4_ARMOR_PLATE_UNDEAD@3                                          : Adept's Graveguard Armor
2360: T5_ARMOR_PLATE_UNDEAD                                            : Expert's Graveguard Armor
2361: T5_ARMOR_PLATE_UNDEAD@1                                          : Expert's Graveguard Armor
2362: T5_ARMOR_PLATE_UNDEAD@2                                          : Expert's Graveguard Armor
2363: T5_ARMOR_PLATE_UNDEAD@3                                          : Expert's Graveguard Armor
2364: T6_ARMOR_PLATE_UNDEAD                                            : Master's Graveguard Armor
2365: T6_ARMOR_PLATE_UNDEAD@1                                          : Master's Graveguard Armor
2366: T6_ARMOR_PLATE_UNDEAD@2                                          : Master's Graveguard Armor
2367: T6_ARMOR_PLATE_UNDEAD@3                                          : Master's Graveguard Armor
2368: T7_ARMOR_PLATE_UNDEAD                                            : Grandmaster's Graveguard Armor
2369: T7_ARMOR_PLATE_UNDEAD@1                                          : Grandmaster's Graveguard Armor
2370: T7_ARMOR_PLATE_UNDEAD@2                                          : Grandmaster's Graveguard Armor
2371: T7_ARMOR_PLATE_UNDEAD@3                                          : Grandmaster's Graveguard Armor
2372: T8_ARMOR_PLATE_UNDEAD                                            : Elder's Graveguard Armor
2373: T8_ARMOR_PLATE_UNDEAD@1                                          : Elder's Graveguard Armor
2374: T8_ARMOR_PLATE_UNDEAD@2                                          : Elder's Graveguard Armor
2375: T8_ARMOR_PLATE_UNDEAD@3                                          : Elder's Graveguard Armor
2376: T4_SHOES_PLATE_UNDEAD                                            : Adept's Graveguard Boots
2377: T4_SHOES_PLATE_UNDEAD@1                                          : Adept's Graveguard Boots
2378: T4_SHOES_PLATE_UNDEAD@2                                          : Adept's Graveguard Boots
2379: T4_SHOES_PLATE_UNDEAD@3                                          : Adept's Graveguard Boots
2380: T5_SHOES_PLATE_UNDEAD                                            : Expert's Graveguard Boots
2381: T5_SHOES_PLATE_UNDEAD@1                                          : Expert's Graveguard Boots
2382: T5_SHOES_PLATE_UNDEAD@2                                          : Expert's Graveguard Boots
2383: T5_SHOES_PLATE_UNDEAD@3                                          : Expert's Graveguard Boots
2384: T6_SHOES_PLATE_UNDEAD                                            : Master's Graveguard Boots
2385: T6_SHOES_PLATE_UNDEAD@1                                          : Master's Graveguard Boots
2386: T6_SHOES_PLATE_UNDEAD@2                                          : Master's Graveguard Boots
2387: T6_SHOES_PLATE_UNDEAD@3                                          : Master's Graveguard Boots
2388: T7_SHOES_PLATE_UNDEAD                                            : Grandmaster's Graveguard Boots
2389: T7_SHOES_PLATE_UNDEAD@1                                          : Grandmaster's Graveguard Boots
2390: T7_SHOES_PLATE_UNDEAD@2                                          : Grandmaster's Graveguard Boots
2391: T7_SHOES_PLATE_UNDEAD@3                                          : Grandmaster's Graveguard Boots
2392: T8_SHOES_PLATE_UNDEAD                                            : Elder's Graveguard Boots
2393: T8_SHOES_PLATE_UNDEAD@1                                          : Elder's Graveguard Boots
2394: T8_SHOES_PLATE_UNDEAD@2                                          : Elder's Graveguard Boots
2395: T8_SHOES_PLATE_UNDEAD@3                                          : Elder's Graveguard Boots
2396: T4_HEAD_PLATE_HELL                                               : Adept's Demon Helmet
2397: T4_HEAD_PLATE_HELL@1                                             : Adept's Demon Helmet
2398: T4_HEAD_PLATE_HELL@2                                             : Adept's Demon Helmet
2399: T4_HEAD_PLATE_HELL@3                                             : Adept's Demon Helmet
2400: T5_HEAD_PLATE_HELL                                               : Expert's Demon Helmet
2401: T5_HEAD_PLATE_HELL@1                                             : Expert's Demon Helmet
2402: T5_HEAD_PLATE_HELL@2                                             : Expert's Demon Helmet
2403: T5_HEAD_PLATE_HELL@3                                             : Expert's Demon Helmet
2404: T6_HEAD_PLATE_HELL                                               : Master's Demon Helmet
2405: T6_HEAD_PLATE_HELL@1                                             : Master's Demon Helmet
2406: T6_HEAD_PLATE_HELL@2                                             : Master's Demon Helmet
2407: T6_HEAD_PLATE_HELL@3                                             : Master's Demon Helmet
2408: T7_HEAD_PLATE_HELL                                               : Grandmaster's Demon Helmet
2409: T7_HEAD_PLATE_HELL@1                                             : Grandmaster's Demon Helmet
2410: T7_HEAD_PLATE_HELL@2                                             : Grandmaster's Demon Helmet
2411: T7_HEAD_PLATE_HELL@3                                             : Grandmaster's Demon Helmet
2412: T8_HEAD_PLATE_HELL                                               : Elder's Demon Helmet
2413: T8_HEAD_PLATE_HELL@1                                             : Elder's Demon Helmet
2414: T8_HEAD_PLATE_HELL@2                                             : Elder's Demon Helmet
2415: T8_HEAD_PLATE_HELL@3                                             : Elder's Demon Helmet
2416: T4_ARMOR_PLATE_HELL                                              : Adept's Demon Armor
2417: T4_ARMOR_PLATE_HELL@1                                            : Adept's Demon Armor
2418: T4_ARMOR_PLATE_HELL@2                                            : Adept's Demon Armor
2419: T4_ARMOR_PLATE_HELL@3                                            : Adept's Demon Armor
2420: T5_ARMOR_PLATE_HELL                                              : Expert's Demon Armor
2421: T5_ARMOR_PLATE_HELL@1                                            : Expert's Demon Armor
2422: T5_ARMOR_PLATE_HELL@2                                            : Expert's Demon Armor
2423: T5_ARMOR_PLATE_HELL@3                                            : Expert's Demon Armor
2424: T6_ARMOR_PLATE_HELL                                              : Master's Demon Armor
2425: T6_ARMOR_PLATE_HELL@1                                            : Master's Demon Armor
2426: T6_ARMOR_PLATE_HELL@2                                            : Master's Demon Armor
2427: T6_ARMOR_PLATE_HELL@3                                            : Master's Demon Armor
2428: T7_ARMOR_PLATE_HELL                                              : Grandmaster's Demon Armor
2429: T7_ARMOR_PLATE_HELL@1                                            : Grandmaster's Demon Armor
2430: T7_ARMOR_PLATE_HELL@2                                            : Grandmaster's Demon Armor
2431: T7_ARMOR_PLATE_HELL@3                                            : Grandmaster's Demon Armor
2432: T8_ARMOR_PLATE_HELL                                              : Elder's Demon Armor
2433: T8_ARMOR_PLATE_HELL@1                                            : Elder's Demon Armor
2434: T8_ARMOR_PLATE_HELL@2                                            : Elder's Demon Armor
2435: T8_ARMOR_PLATE_HELL@3                                            : Elder's Demon Armor
2436: T4_SHOES_PLATE_HELL                                              : Adept's Demon Boots
2437: T4_SHOES_PLATE_HELL@1                                            : Adept's Demon Boots
2438: T4_SHOES_PLATE_HELL@2                                            : Adept's Demon Boots
2439: T4_SHOES_PLATE_HELL@3                                            : Adept's Demon Boots
2440: T5_SHOES_PLATE_HELL                                              : Expert's Demon Boots
2441: T5_SHOES_PLATE_HELL@1                                            : Expert's Demon Boots
2442: T5_SHOES_PLATE_HELL@2                                            : Expert's Demon Boots
2443: T5_SHOES_PLATE_HELL@3                                            : Expert's Demon Boots
2444: T6_SHOES_PLATE_HELL                                              : Master's Demon Boots
2445: T6_SHOES_PLATE_HELL@1                                            : Master's Demon Boots
2446: T6_SHOES_PLATE_HELL@2                                            : Master's Demon Boots
2447: T6_SHOES_PLATE_HELL@3                                            : Master's Demon Boots
2448: T7_SHOES_PLATE_HELL                                              : Grandmaster's Demon Boots
2449: T7_SHOES_PLATE_HELL@1                                            : Grandmaster's Demon Boots
2450: T7_SHOES_PLATE_HELL@2                                            : Grandmaster's Demon Boots
2451: T7_SHOES_PLATE_HELL@3                                            : Grandmaster's Demon Boots
2452: T8_SHOES_PLATE_HELL                                              : Elder's Demon Boots
2453: T8_SHOES_PLATE_HELL@1                                            : Elder's Demon Boots
2454: T8_SHOES_PLATE_HELL@2                                            : Elder's Demon Boots
2455: T8_SHOES_PLATE_HELL@3                                            : Elder's Demon Boots
2456: T4_HEAD_PLATE_KEEPER                                             : Adept's Judicator Helmet
2457: T4_HEAD_PLATE_KEEPER@1                                           : Adept's Judicator Helmet
2458: T4_HEAD_PLATE_KEEPER@2                                           : Adept's Judicator Helmet
2459: T4_HEAD_PLATE_KEEPER@3                                           : Adept's Judicator Helmet
2460: T5_HEAD_PLATE_KEEPER                                             : Expert's Judicator Helmet
2461: T5_HEAD_PLATE_KEEPER@1                                           : Expert's Judicator Helmet
2462: T5_HEAD_PLATE_KEEPER@2                                           : Expert's Judicator Helmet
2463: T5_HEAD_PLATE_KEEPER@3                                           : Expert's Judicator Helmet
2464: T6_HEAD_PLATE_KEEPER                                             : Master's Judicator Helmet
2465: T6_HEAD_PLATE_KEEPER@1                                           : Master's Judicator Helmet
2466: T6_HEAD_PLATE_KEEPER@2                                           : Master's Judicator Helmet
2467: T6_HEAD_PLATE_KEEPER@3                                           : Master's Judicator Helmet
2468: T7_HEAD_PLATE_KEEPER                                             : Grandmaster's Judicator Helmet
2469: T7_HEAD_PLATE_KEEPER@1                                           : Grandmaster's Judicator Helmet
2470: T7_HEAD_PLATE_KEEPER@2                                           : Grandmaster's Judicator Helmet
2471: T7_HEAD_PLATE_KEEPER@3                                           : Grandmaster's Judicator Helmet
2472: T8_HEAD_PLATE_KEEPER                                             : Elder's Judicator Helmet
2473: T8_HEAD_PLATE_KEEPER@1                                           : Elder's Judicator Helmet
2474: T8_HEAD_PLATE_KEEPER@2                                           : Elder's Judicator Helmet
2475: T8_HEAD_PLATE_KEEPER@3                                           : Elder's Judicator Helmet
2476: T4_ARMOR_PLATE_KEEPER                                            : Adept's Judicator Armor
2477: T4_ARMOR_PLATE_KEEPER@1                                          : Adept's Judicator Armor
2478: T4_ARMOR_PLATE_KEEPER@2                                          : Adept's Judicator Armor
2479: T4_ARMOR_PLATE_KEEPER@3                                          : Adept's Judicator Armor
2480: T5_ARMOR_PLATE_KEEPER                                            : Expert's Judicator Armor
2481: T5_ARMOR_PLATE_KEEPER@1                                          : Expert's Judicator Armor
2482: T5_ARMOR_PLATE_KEEPER@2                                          : Expert's Judicator Armor
2483: T5_ARMOR_PLATE_KEEPER@3                                          : Expert's Judicator Armor
2484: T6_ARMOR_PLATE_KEEPER                                            : Master's Judicator Armor
2485: T6_ARMOR_PLATE_KEEPER@1                                          : Master's Judicator Armor
2486: T6_ARMOR_PLATE_KEEPER@2                                          : Master's Judicator Armor
2487: T6_ARMOR_PLATE_KEEPER@3                                          : Master's Judicator Armor
2488: T7_ARMOR_PLATE_KEEPER                                            : Grandmaster's Judicator Armor
2489: T7_ARMOR_PLATE_KEEPER@1                                          : Grandmaster's Judicator Armor
2490: T7_ARMOR_PLATE_KEEPER@2                                          : Grandmaster's Judicator Armor
2491: T7_ARMOR_PLATE_KEEPER@3                                          : Grandmaster's Judicator Armor
2492: T8_ARMOR_PLATE_KEEPER                                            : Elder's Judicator Armor
2493: T8_ARMOR_PLATE_KEEPER@1                                          : Elder's Judicator Armor
2494: T8_ARMOR_PLATE_KEEPER@2                                          : Elder's Judicator Armor
2495: T8_ARMOR_PLATE_KEEPER@3                                          : Elder's Judicator Armor
2496: T4_SHOES_PLATE_KEEPER                                            : Adept's Judicator Boots
2497: T4_SHOES_PLATE_KEEPER@1                                          : Adept's Judicator Boots
2498: T4_SHOES_PLATE_KEEPER@2                                          : Adept's Judicator Boots
2499: T4_SHOES_PLATE_KEEPER@3                                          : Adept's Judicator Boots
2500: T5_SHOES_PLATE_KEEPER                                            : Expert's Judicator Boots
2501: T5_SHOES_PLATE_KEEPER@1                                          : Expert's Judicator Boots
2502: T5_SHOES_PLATE_KEEPER@2                                          : Expert's Judicator Boots
2503: T5_SHOES_PLATE_KEEPER@3                                          : Expert's Judicator Boots
2504: T6_SHOES_PLATE_KEEPER                                            : Master's Judicator Boots
2505: T6_SHOES_PLATE_KEEPER@1                                          : Master's Judicator Boots
2506: T6_SHOES_PLATE_KEEPER@2                                          : Master's Judicator Boots
2507: T6_SHOES_PLATE_KEEPER@3                                          : Master's Judicator Boots
2508: T7_SHOES_PLATE_KEEPER                                            : Grandmaster's Judicator Boots
2509: T7_SHOES_PLATE_KEEPER@1                                          : Grandmaster's Judicator Boots
2510: T7_SHOES_PLATE_KEEPER@2                                          : Grandmaster's Judicator Boots
2511: T7_SHOES_PLATE_KEEPER@3                                          : Grandmaster's Judicator Boots
2512: T8_SHOES_PLATE_KEEPER                                            : Elder's Judicator Boots
2513: T8_SHOES_PLATE_KEEPER@1                                          : Elder's Judicator Boots
2514: T8_SHOES_PLATE_KEEPER@2                                          : Elder's Judicator Boots
2515: T8_SHOES_PLATE_KEEPER@3                                          : Elder's Judicator Boots
2516: T4_HEAD_PLATE_AVALON                                             : Adept's Helmet of Valor
2517: T4_HEAD_PLATE_AVALON@1                                           : Adept's Helmet of Valor
2518: T4_HEAD_PLATE_AVALON@2                                           : Adept's Helmet of Valor
2519: T4_HEAD_PLATE_AVALON@3                                           : Adept's Helmet of Valor
2520: T5_HEAD_PLATE_AVALON                                             : Expert's Helmet of Valor
2521: T5_HEAD_PLATE_AVALON@1                                           : Expert's Helmet of Valor
2522: T5_HEAD_PLATE_AVALON@2                                           : Expert's Helmet of Valor
2523: T5_HEAD_PLATE_AVALON@3                                           : Expert's Helmet of Valor
2524: T6_HEAD_PLATE_AVALON                                             : Master's Helmet of Valor
2525: T6_HEAD_PLATE_AVALON@1                                           : Master's Helmet of Valor
2526: T6_HEAD_PLATE_AVALON@2                                           : Master's Helmet of Valor
2527: T6_HEAD_PLATE_AVALON@3                                           : Master's Helmet of Valor
2528: T7_HEAD_PLATE_AVALON                                             : Grandmaster's Helmet of Valor
2529: T7_HEAD_PLATE_AVALON@1                                           : Grandmaster's Helmet of Valor
2530: T7_HEAD_PLATE_AVALON@2                                           : Grandmaster's Helmet of Valor
2531: T7_HEAD_PLATE_AVALON@3                                           : Grandmaster's Helmet of Valor
2532: T8_HEAD_PLATE_AVALON                                             : Elder's Helmet of Valor
2533: T8_HEAD_PLATE_AVALON@1                                           : Elder's Helmet of Valor
2534: T8_HEAD_PLATE_AVALON@2                                           : Elder's Helmet of Valor
2535: T8_HEAD_PLATE_AVALON@3                                           : Elder's Helmet of Valor
2536: T4_ARMOR_PLATE_AVALON                                            : Adept's Armor of Valor
2537: T4_ARMOR_PLATE_AVALON@1                                          : Adept's Armor of Valor
2538: T4_ARMOR_PLATE_AVALON@2                                          : Adept's Armor of Valor
2539: T4_ARMOR_PLATE_AVALON@3                                          : Adept's Armor of Valor
2540: T5_ARMOR_PLATE_AVALON                                            : Expert's Armor of Valor
2541: T5_ARMOR_PLATE_AVALON@1                                          : Expert's Armor of Valor
2542: T5_ARMOR_PLATE_AVALON@2                                          : Expert's Armor of Valor
2543: T5_ARMOR_PLATE_AVALON@3                                          : Expert's Armor of Valor
2544: T6_ARMOR_PLATE_AVALON                                            : Master's Armor of Valor
2545: T6_ARMOR_PLATE_AVALON@1                                          : Master's Armor of Valor
2546: T6_ARMOR_PLATE_AVALON@2                                          : Master's Armor of Valor
2547: T6_ARMOR_PLATE_AVALON@3                                          : Master's Armor of Valor
2548: T7_ARMOR_PLATE_AVALON                                            : Grandmaster's Armor of Valor
2549: T7_ARMOR_PLATE_AVALON@1                                          : Grandmaster's Armor of Valor
2550: T7_ARMOR_PLATE_AVALON@2                                          : Grandmaster's Armor of Valor
2551: T7_ARMOR_PLATE_AVALON@3                                          : Grandmaster's Armor of Valor
2552: T8_ARMOR_PLATE_AVALON                                            : Elder's Armor of Valor
2553: T8_ARMOR_PLATE_AVALON@1                                          : Elder's Armor of Valor
2554: T8_ARMOR_PLATE_AVALON@2                                          : Elder's Armor of Valor
2555: T8_ARMOR_PLATE_AVALON@3                                          : Elder's Armor of Valor
2556: T4_SHOES_PLATE_AVALON                                            : Adept's Boots of Valor
2557: T4_SHOES_PLATE_AVALON@1                                          : Adept's Boots of Valor
2558: T4_SHOES_PLATE_AVALON@2                                          : Adept's Boots of Valor
2559: T4_SHOES_PLATE_AVALON@3                                          : Adept's Boots of Valor
2560: T5_SHOES_PLATE_AVALON                                            : Expert's Boots of Valor
2561: T5_SHOES_PLATE_AVALON@1                                          : Expert's Boots of Valor
2562: T5_SHOES_PLATE_AVALON@2                                          : Expert's Boots of Valor
2563: T5_SHOES_PLATE_AVALON@3                                          : Expert's Boots of Valor
2564: T6_SHOES_PLATE_AVALON                                            : Master's Boots of Valor
2565: T6_SHOES_PLATE_AVALON@1                                          : Master's Boots of Valor
2566: T6_SHOES_PLATE_AVALON@2                                          : Master's Boots of Valor
2567: T6_SHOES_PLATE_AVALON@3                                          : Master's Boots of Valor
2568: T7_SHOES_PLATE_AVALON                                            : Grandmaster's Boots of Valor
2569: T7_SHOES_PLATE_AVALON@1                                          : Grandmaster's Boots of Valor
2570: T7_SHOES_PLATE_AVALON@2                                          : Grandmaster's Boots of Valor
2571: T7_SHOES_PLATE_AVALON@3                                          : Grandmaster's Boots of Valor
2572: T8_SHOES_PLATE_AVALON                                            : Elder's Boots of Valor
2573: T8_SHOES_PLATE_AVALON@1                                          : Elder's Boots of Valor
2574: T8_SHOES_PLATE_AVALON@2                                          : Elder's Boots of Valor
2575: T8_SHOES_PLATE_AVALON@3                                          : Elder's Boots of Valor
2576: T1_HEAD_LEATHER_SET1                                             : Beginner's Mercenary Hood
2577: T2_HEAD_LEATHER_SET1                                             : Novice's Mercenary Hood
2578: T3_HEAD_LEATHER_SET1                                             : Journeyman's Mercenary Hood
2579: T4_HEAD_LEATHER_SET1                                             : Adept's Mercenary Hood
2580: T4_HEAD_LEATHER_SET1@1                                           : Adept's Mercenary Hood
2581: T4_HEAD_LEATHER_SET1@2                                           : Adept's Mercenary Hood
2582: T4_HEAD_LEATHER_SET1@3                                           : Adept's Mercenary Hood
2583: T5_HEAD_LEATHER_SET1                                             : Expert's Mercenary Hood
2584: T5_HEAD_LEATHER_SET1@1                                           : Expert's Mercenary Hood
2585: T5_HEAD_LEATHER_SET1@2                                           : Expert's Mercenary Hood
2586: T5_HEAD_LEATHER_SET1@3                                           : Expert's Mercenary Hood
2587: T6_HEAD_LEATHER_SET1                                             : Master's Mercenary Hood
2588: T6_HEAD_LEATHER_SET1@1                                           : Master's Mercenary Hood
2589: T6_HEAD_LEATHER_SET1@2                                           : Master's Mercenary Hood
2590: T6_HEAD_LEATHER_SET1@3                                           : Master's Mercenary Hood
2591: T7_HEAD_LEATHER_SET1                                             : Grandmaster's Mercenary Hood
2592: T7_HEAD_LEATHER_SET1@1                                           : Grandmaster's Mercenary Hood
2593: T7_HEAD_LEATHER_SET1@2                                           : Grandmaster's Mercenary Hood
2594: T7_HEAD_LEATHER_SET1@3                                           : Grandmaster's Mercenary Hood
2595: T8_HEAD_LEATHER_SET1                                             : Elder's Mercenary Hood
2596: T8_HEAD_LEATHER_SET1@1                                           : Elder's Mercenary Hood
2597: T8_HEAD_LEATHER_SET1@2                                           : Elder's Mercenary Hood
2598: T8_HEAD_LEATHER_SET1@3                                           : Elder's Mercenary Hood
2599: T1_ARMOR_LEATHER_SET1                                            : Beginner's Mercenary Jacket
2600: T2_ARMOR_LEATHER_SET1                                            : Novice's Mercenary Jacket
2601: T3_ARMOR_LEATHER_SET1                                            : Journeyman's Mercenary Jacket
2602: T4_ARMOR_LEATHER_SET1                                            : Adept's Mercenary Jacket
2603: T4_ARMOR_LEATHER_SET1@1                                          : Adept's Mercenary Jacket
2604: T4_ARMOR_LEATHER_SET1@2                                          : Adept's Mercenary Jacket
2605: T4_ARMOR_LEATHER_SET1@3                                          : Adept's Mercenary Jacket
2606: T5_ARMOR_LEATHER_SET1                                            : Expert's Mercenary Jacket
2607: T5_ARMOR_LEATHER_SET1@1                                          : Expert's Mercenary Jacket
2608: T5_ARMOR_LEATHER_SET1@2                                          : Expert's Mercenary Jacket
2609: T5_ARMOR_LEATHER_SET1@3                                          : Expert's Mercenary Jacket
2610: T6_ARMOR_LEATHER_SET1                                            : Master's Mercenary Jacket
2611: T6_ARMOR_LEATHER_SET1@1                                          : Master's Mercenary Jacket
2612: T6_ARMOR_LEATHER_SET1@2                                          : Master's Mercenary Jacket
2613: T6_ARMOR_LEATHER_SET1@3                                          : Master's Mercenary Jacket
2614: T7_ARMOR_LEATHER_SET1                                            : Grandmaster's Mercenary Jacket
2615: T7_ARMOR_LEATHER_SET1@1                                          : Grandmaster's Mercenary Jacket
2616: T7_ARMOR_LEATHER_SET1@2                                          : Grandmaster's Mercenary Jacket
2617: T7_ARMOR_LEATHER_SET1@3                                          : Grandmaster's Mercenary Jacket
2618: T8_ARMOR_LEATHER_SET1                                            : Elder's Mercenary Jacket
2619: T8_ARMOR_LEATHER_SET1@1                                          : Elder's Mercenary Jacket
2620: T8_ARMOR_LEATHER_SET1@2                                          : Elder's Mercenary Jacket
2621: T8_ARMOR_LEATHER_SET1@3                                          : Elder's Mercenary Jacket
2622: T1_SHOES_LEATHER_SET1                                            : Beginner's Mercenary Shoes
2623: T2_SHOES_LEATHER_SET1                                            : Novice's Mercenary Shoes
2624: T3_SHOES_LEATHER_SET1                                            : Journeyman's Mercenary Shoes
2625: T4_SHOES_LEATHER_SET1                                            : Adept's Mercenary Shoes
2626: T4_SHOES_LEATHER_SET1@1                                          : Adept's Mercenary Shoes
2627: T4_SHOES_LEATHER_SET1@2                                          : Adept's Mercenary Shoes
2628: T4_SHOES_LEATHER_SET1@3                                          : Adept's Mercenary Shoes
2629: T5_SHOES_LEATHER_SET1                                            : Expert's Mercenary Shoes
2630: T5_SHOES_LEATHER_SET1@1                                          : Expert's Mercenary Shoes
2631: T5_SHOES_LEATHER_SET1@2                                          : Expert's Mercenary Shoes
2632: T5_SHOES_LEATHER_SET1@3                                          : Expert's Mercenary Shoes
2633: T6_SHOES_LEATHER_SET1                                            : Master's Mercenary Shoes
2634: T6_SHOES_LEATHER_SET1@1                                          : Master's Mercenary Shoes
2635: T6_SHOES_LEATHER_SET1@2                                          : Master's Mercenary Shoes
2636: T6_SHOES_LEATHER_SET1@3                                          : Master's Mercenary Shoes
2637: T7_SHOES_LEATHER_SET1                                            : Grandmaster's Mercenary Shoes
2638: T7_SHOES_LEATHER_SET1@1                                          : Grandmaster's Mercenary Shoes
2639: T7_SHOES_LEATHER_SET1@2                                          : Grandmaster's Mercenary Shoes
2640: T7_SHOES_LEATHER_SET1@3                                          : Grandmaster's Mercenary Shoes
2641: T8_SHOES_LEATHER_SET1                                            : Elder's Mercenary Shoes
2642: T8_SHOES_LEATHER_SET1@1                                          : Elder's Mercenary Shoes
2643: T8_SHOES_LEATHER_SET1@2                                          : Elder's Mercenary Shoes
2644: T8_SHOES_LEATHER_SET1@3                                          : Elder's Mercenary Shoes
2645: T4_HEAD_LEATHER_SET2                                             : Adept's Hunter Hood
2646: T4_HEAD_LEATHER_SET2@1                                           : Adept's Hunter Hood
2647: T4_HEAD_LEATHER_SET2@2                                           : Adept's Hunter Hood
2648: T4_HEAD_LEATHER_SET2@3                                           : Adept's Hunter Hood
2649: T5_HEAD_LEATHER_SET2                                             : Expert's Hunter Hood
2650: T5_HEAD_LEATHER_SET2@1                                           : Expert's Hunter Hood
2651: T5_HEAD_LEATHER_SET2@2                                           : Expert's Hunter Hood
2652: T5_HEAD_LEATHER_SET2@3                                           : Expert's Hunter Hood
2653: T6_HEAD_LEATHER_SET2                                             : Master's Hunter Hood
2654: T6_HEAD_LEATHER_SET2@1                                           : Master's Hunter Hood
2655: T6_HEAD_LEATHER_SET2@2                                           : Master's Hunter Hood
2656: T6_HEAD_LEATHER_SET2@3                                           : Master's Hunter Hood
2657: T7_HEAD_LEATHER_SET2                                             : Grandmaster's Hunter Hood
2658: T7_HEAD_LEATHER_SET2@1                                           : Grandmaster's Hunter Hood
2659: T7_HEAD_LEATHER_SET2@2                                           : Grandmaster's Hunter Hood
2660: T7_HEAD_LEATHER_SET2@3                                           : Grandmaster's Hunter Hood
2661: T8_HEAD_LEATHER_SET2                                             : Elder's Hunter Hood
2662: T8_HEAD_LEATHER_SET2@1                                           : Elder's Hunter Hood
2663: T8_HEAD_LEATHER_SET2@2                                           : Elder's Hunter Hood
2664: T8_HEAD_LEATHER_SET2@3                                           : Elder's Hunter Hood
2665: T4_ARMOR_LEATHER_SET2                                            : Adept's Hunter Jacket
2666: T4_ARMOR_LEATHER_SET2@1                                          : Adept's Hunter Jacket
2667: T4_ARMOR_LEATHER_SET2@2                                          : Adept's Hunter Jacket
2668: T4_ARMOR_LEATHER_SET2@3                                          : Adept's Hunter Jacket
2669: T5_ARMOR_LEATHER_SET2                                            : Expert's Hunter Jacket
2670: T5_ARMOR_LEATHER_SET2@1                                          : Expert's Hunter Jacket
2671: T5_ARMOR_LEATHER_SET2@2                                          : Expert's Hunter Jacket
2672: T5_ARMOR_LEATHER_SET2@3                                          : Expert's Hunter Jacket
2673: T6_ARMOR_LEATHER_SET2                                            : Master's Hunter Jacket
2674: T6_ARMOR_LEATHER_SET2@1                                          : Master's Hunter Jacket
2675: T6_ARMOR_LEATHER_SET2@2                                          : Master's Hunter Jacket
2676: T6_ARMOR_LEATHER_SET2@3                                          : Master's Hunter Jacket
2677: T7_ARMOR_LEATHER_SET2                                            : Grandmaster's Hunter Jacket
2678: T7_ARMOR_LEATHER_SET2@1                                          : Grandmaster's Hunter Jacket
2679: T7_ARMOR_LEATHER_SET2@2                                          : Grandmaster's Hunter Jacket
2680: T7_ARMOR_LEATHER_SET2@3                                          : Grandmaster's Hunter Jacket
2681: T8_ARMOR_LEATHER_SET2                                            : Elder's Hunter Jacket
2682: T8_ARMOR_LEATHER_SET2@1                                          : Elder's Hunter Jacket
2683: T8_ARMOR_LEATHER_SET2@2                                          : Elder's Hunter Jacket
2684: T8_ARMOR_LEATHER_SET2@3                                          : Elder's Hunter Jacket
2685: T4_SHOES_LEATHER_SET2                                            : Adept's Hunter Shoes
2686: T4_SHOES_LEATHER_SET2@1                                          : Adept's Hunter Shoes
2687: T4_SHOES_LEATHER_SET2@2                                          : Adept's Hunter Shoes
2688: T4_SHOES_LEATHER_SET2@3                                          : Adept's Hunter Shoes
2689: T5_SHOES_LEATHER_SET2                                            : Expert's Hunter Shoes
2690: T5_SHOES_LEATHER_SET2@1                                          : Expert's Hunter Shoes
2691: T5_SHOES_LEATHER_SET2@2                                          : Expert's Hunter Shoes
2692: T5_SHOES_LEATHER_SET2@3                                          : Expert's Hunter Shoes
2693: T6_SHOES_LEATHER_SET2                                            : Master's Hunter Shoes
2694: T6_SHOES_LEATHER_SET2@1                                          : Master's Hunter Shoes
2695: T6_SHOES_LEATHER_SET2@2                                          : Master's Hunter Shoes
2696: T6_SHOES_LEATHER_SET2@3                                          : Master's Hunter Shoes
2697: T7_SHOES_LEATHER_SET2                                            : Grandmaster's Hunter Shoes
2698: T7_SHOES_LEATHER_SET2@1                                          : Grandmaster's Hunter Shoes
2699: T7_SHOES_LEATHER_SET2@2                                          : Grandmaster's Hunter Shoes
2700: T7_SHOES_LEATHER_SET2@3                                          : Grandmaster's Hunter Shoes
2701: T8_SHOES_LEATHER_SET2                                            : Elder's Hunter Shoes
2702: T8_SHOES_LEATHER_SET2@1                                          : Elder's Hunter Shoes
2703: T8_SHOES_LEATHER_SET2@2                                          : Elder's Hunter Shoes
2704: T8_SHOES_LEATHER_SET2@3                                          : Elder's Hunter Shoes
2705: T4_HEAD_LEATHER_SET3                                             : Adept's Assassin Hood
2706: T4_HEAD_LEATHER_SET3@1                                           : Adept's Assassin Hood
2707: T4_HEAD_LEATHER_SET3@2                                           : Adept's Assassin Hood
2708: T4_HEAD_LEATHER_SET3@3                                           : Adept's Assassin Hood
2709: T5_HEAD_LEATHER_SET3                                             : Expert's Assassin Hood
2710: T5_HEAD_LEATHER_SET3@1                                           : Expert's Assassin Hood
2711: T5_HEAD_LEATHER_SET3@2                                           : Expert's Assassin Hood
2712: T5_HEAD_LEATHER_SET3@3                                           : Expert's Assassin Hood
2713: T6_HEAD_LEATHER_SET3                                             : Master's Assassin Hood
2714: T6_HEAD_LEATHER_SET3@1                                           : Master's Assassin Hood
2715: T6_HEAD_LEATHER_SET3@2                                           : Master's Assassin Hood
2716: T6_HEAD_LEATHER_SET3@3                                           : Master's Assassin Hood
2717: T7_HEAD_LEATHER_SET3                                             : Grandmaster's Assassin Hood
2718: T7_HEAD_LEATHER_SET3@1                                           : Grandmaster's Assassin Hood
2719: T7_HEAD_LEATHER_SET3@2                                           : Grandmaster's Assassin Hood
2720: T7_HEAD_LEATHER_SET3@3                                           : Grandmaster's Assassin Hood
2721: T8_HEAD_LEATHER_SET3                                             : Elder's Assassin Hood
2722: T8_HEAD_LEATHER_SET3@1                                           : Elder's Assassin Hood
2723: T8_HEAD_LEATHER_SET3@2                                           : Elder's Assassin Hood
2724: T8_HEAD_LEATHER_SET3@3                                           : Elder's Assassin Hood
2725: T4_ARMOR_LEATHER_SET3                                            : Adept's Assassin Jacket
2726: T4_ARMOR_LEATHER_SET3@1                                          : Adept's Assassin Jacket
2727: T4_ARMOR_LEATHER_SET3@2                                          : Adept's Assassin Jacket
2728: T4_ARMOR_LEATHER_SET3@3                                          : Adept's Assassin Jacket
2729: T5_ARMOR_LEATHER_SET3                                            : Expert's Assassin Jacket
2730: T5_ARMOR_LEATHER_SET3@1                                          : Expert's Assassin Jacket
2731: T5_ARMOR_LEATHER_SET3@2                                          : Expert's Assassin Jacket
2732: T5_ARMOR_LEATHER_SET3@3                                          : Expert's Assassin Jacket
2733: T6_ARMOR_LEATHER_SET3                                            : Master's Assassin Jacket
2734: T6_ARMOR_LEATHER_SET3@1                                          : Master's Assassin Jacket
2735: T6_ARMOR_LEATHER_SET3@2                                          : Master's Assassin Jacket
2736: T6_ARMOR_LEATHER_SET3@3                                          : Master's Assassin Jacket
2737: T7_ARMOR_LEATHER_SET3                                            : Grandmaster's Assassin Jacket
2738: T7_ARMOR_LEATHER_SET3@1                                          : Grandmaster's Assassin Jacket
2739: T7_ARMOR_LEATHER_SET3@2                                          : Grandmaster's Assassin Jacket
2740: T7_ARMOR_LEATHER_SET3@3                                          : Grandmaster's Assassin Jacket
2741: T8_ARMOR_LEATHER_SET3                                            : Elder's Assassin Jacket
2742: T8_ARMOR_LEATHER_SET3@1                                          : Elder's Assassin Jacket
2743: T8_ARMOR_LEATHER_SET3@2                                          : Elder's Assassin Jacket
2744: T8_ARMOR_LEATHER_SET3@3                                          : Elder's Assassin Jacket
2745: T4_SHOES_LEATHER_SET3                                            : Adept's Assassin Shoes
2746: T4_SHOES_LEATHER_SET3@1                                          : Adept's Assassin Shoes
2747: T4_SHOES_LEATHER_SET3@2                                          : Adept's Assassin Shoes
2748: T4_SHOES_LEATHER_SET3@3                                          : Adept's Assassin Shoes
2749: T5_SHOES_LEATHER_SET3                                            : Expert's Assassin Shoes
2750: T5_SHOES_LEATHER_SET3@1                                          : Expert's Assassin Shoes
2751: T5_SHOES_LEATHER_SET3@2                                          : Expert's Assassin Shoes
2752: T5_SHOES_LEATHER_SET3@3                                          : Expert's Assassin Shoes
2753: T6_SHOES_LEATHER_SET3                                            : Master's Assassin Shoes
2754: T6_SHOES_LEATHER_SET3@1                                          : Master's Assassin Shoes
2755: T6_SHOES_LEATHER_SET3@2                                          : Master's Assassin Shoes
2756: T6_SHOES_LEATHER_SET3@3                                          : Master's Assassin Shoes
2757: T7_SHOES_LEATHER_SET3                                            : Grandmaster's Assassin Shoes
2758: T7_SHOES_LEATHER_SET3@1                                          : Grandmaster's Assassin Shoes
2759: T7_SHOES_LEATHER_SET3@2                                          : Grandmaster's Assassin Shoes
2760: T7_SHOES_LEATHER_SET3@3                                          : Grandmaster's Assassin Shoes
2761: T8_SHOES_LEATHER_SET3                                            : Elder's Assassin Shoes
2762: T8_SHOES_LEATHER_SET3@1                                          : Elder's Assassin Shoes
2763: T8_SHOES_LEATHER_SET3@2                                          : Elder's Assassin Shoes
2764: T8_SHOES_LEATHER_SET3@3                                          : Elder's Assassin Shoes
2765: T4_HEAD_LEATHER_MORGANA                                          : Adept's Stalker Hood
2766: T4_HEAD_LEATHER_MORGANA@1                                        : Adept's Stalker Hood
2767: T4_HEAD_LEATHER_MORGANA@2                                        : Adept's Stalker Hood
2768: T4_HEAD_LEATHER_MORGANA@3                                        : Adept's Stalker Hood
2769: T5_HEAD_LEATHER_MORGANA                                          : Expert's Stalker Hood
2770: T5_HEAD_LEATHER_MORGANA@1                                        : Expert's Stalker Hood
2771: T5_HEAD_LEATHER_MORGANA@2                                        : Expert's Stalker Hood
2772: T5_HEAD_LEATHER_MORGANA@3                                        : Expert's Stalker Hood
2773: T6_HEAD_LEATHER_MORGANA                                          : Master's Stalker Hood
2774: T6_HEAD_LEATHER_MORGANA@1                                        : Master's Stalker Hood
2775: T6_HEAD_LEATHER_MORGANA@2                                        : Master's Stalker Hood
2776: T6_HEAD_LEATHER_MORGANA@3                                        : Master's Stalker Hood
2777: T7_HEAD_LEATHER_MORGANA                                          : Grandmaster's Stalker Hood
2778: T7_HEAD_LEATHER_MORGANA@1                                        : Grandmaster's Stalker Hood
2779: T7_HEAD_LEATHER_MORGANA@2                                        : Grandmaster's Stalker Hood
2780: T7_HEAD_LEATHER_MORGANA@3                                        : Grandmaster's Stalker Hood
2781: T8_HEAD_LEATHER_MORGANA                                          : Elder's Stalker Hood
2782: T8_HEAD_LEATHER_MORGANA@1                                        : Elder's Stalker Hood
2783: T8_HEAD_LEATHER_MORGANA@2                                        : Elder's Stalker Hood
2784: T8_HEAD_LEATHER_MORGANA@3                                        : Elder's Stalker Hood
2785: T4_ARMOR_LEATHER_MORGANA                                         : Adept's Stalker Jacket
2786: T4_ARMOR_LEATHER_MORGANA@1                                       : Adept's Stalker Jacket
2787: T4_ARMOR_LEATHER_MORGANA@2                                       : Adept's Stalker Jacket
2788: T4_ARMOR_LEATHER_MORGANA@3                                       : Adept's Stalker Jacket
2789: T5_ARMOR_LEATHER_MORGANA                                         : Expert's Stalker Jacket
2790: T5_ARMOR_LEATHER_MORGANA@1                                       : Expert's Stalker Jacket
2791: T5_ARMOR_LEATHER_MORGANA@2                                       : Expert's Stalker Jacket
2792: T5_ARMOR_LEATHER_MORGANA@3                                       : Expert's Stalker Jacket
2793: T6_ARMOR_LEATHER_MORGANA                                         : Master's Stalker Jacket
2794: T6_ARMOR_LEATHER_MORGANA@1                                       : Master's Stalker Jacket
2795: T6_ARMOR_LEATHER_MORGANA@2                                       : Master's Stalker Jacket
2796: T6_ARMOR_LEATHER_MORGANA@3                                       : Master's Stalker Jacket
2797: T7_ARMOR_LEATHER_MORGANA                                         : Grandmaster's Stalker Jacket
2798: T7_ARMOR_LEATHER_MORGANA@1                                       : Grandmaster's Stalker Jacket
2799: T7_ARMOR_LEATHER_MORGANA@2                                       : Grandmaster's Stalker Jacket
2800: T7_ARMOR_LEATHER_MORGANA@3                                       : Grandmaster's Stalker Jacket
2801: T8_ARMOR_LEATHER_MORGANA                                         : Elder's Stalker Jacket
2802: T8_ARMOR_LEATHER_MORGANA@1                                       : Elder's Stalker Jacket
2803: T8_ARMOR_LEATHER_MORGANA@2                                       : Elder's Stalker Jacket
2804: T8_ARMOR_LEATHER_MORGANA@3                                       : Elder's Stalker Jacket
2805: T4_SHOES_LEATHER_MORGANA                                         : Adept's Stalker Shoes
2806: T4_SHOES_LEATHER_MORGANA@1                                       : Adept's Stalker Shoes
2807: T4_SHOES_LEATHER_MORGANA@2                                       : Adept's Stalker Shoes
2808: T4_SHOES_LEATHER_MORGANA@3                                       : Adept's Stalker Shoes
2809: T5_SHOES_LEATHER_MORGANA                                         : Expert's Stalker Shoes
2810: T5_SHOES_LEATHER_MORGANA@1                                       : Expert's Stalker Shoes
2811: T5_SHOES_LEATHER_MORGANA@2                                       : Expert's Stalker Shoes
2812: T5_SHOES_LEATHER_MORGANA@3                                       : Expert's Stalker Shoes
2813: T6_SHOES_LEATHER_MORGANA                                         : Master's Stalker Shoes
2814: T6_SHOES_LEATHER_MORGANA@1                                       : Master's Stalker Shoes
2815: T6_SHOES_LEATHER_MORGANA@2                                       : Master's Stalker Shoes
2816: T6_SHOES_LEATHER_MORGANA@3                                       : Master's Stalker Shoes
2817: T7_SHOES_LEATHER_MORGANA                                         : Grandmaster's Stalker Shoes
2818: T7_SHOES_LEATHER_MORGANA@1                                       : Grandmaster's Stalker Shoes
2819: T7_SHOES_LEATHER_MORGANA@2                                       : Grandmaster's Stalker Shoes
2820: T7_SHOES_LEATHER_MORGANA@3                                       : Grandmaster's Stalker Shoes
2821: T8_SHOES_LEATHER_MORGANA                                         : Elder's Stalker Shoes
2822: T8_SHOES_LEATHER_MORGANA@1                                       : Elder's Stalker Shoes
2823: T8_SHOES_LEATHER_MORGANA@2                                       : Elder's Stalker Shoes
2824: T8_SHOES_LEATHER_MORGANA@3                                       : Elder's Stalker Shoes
2825: T4_HEAD_LEATHER_HELL                                             : Adept's Hellion Hood
2826: T4_HEAD_LEATHER_HELL@1                                           : Adept's Hellion Hood
2827: T4_HEAD_LEATHER_HELL@2                                           : Adept's Hellion Hood
2828: T4_HEAD_LEATHER_HELL@3                                           : Adept's Hellion Hood
2829: T5_HEAD_LEATHER_HELL                                             : Expert's Hellion Hood
2830: T5_HEAD_LEATHER_HELL@1                                           : Expert's Hellion Hood
2831: T5_HEAD_LEATHER_HELL@2                                           : Expert's Hellion Hood
2832: T5_HEAD_LEATHER_HELL@3                                           : Expert's Hellion Hood
2833: T6_HEAD_LEATHER_HELL                                             : Master's Hellion Hood
2834: T6_HEAD_LEATHER_HELL@1                                           : Master's Hellion Hood
2835: T6_HEAD_LEATHER_HELL@2                                           : Master's Hellion Hood
2836: T6_HEAD_LEATHER_HELL@3                                           : Master's Hellion Hood
2837: T7_HEAD_LEATHER_HELL                                             : Grandmaster's Hellion Hood
2838: T7_HEAD_LEATHER_HELL@1                                           : Grandmaster's Hellion Hood
2839: T7_HEAD_LEATHER_HELL@2                                           : Grandmaster's Hellion Hood
2840: T7_HEAD_LEATHER_HELL@3                                           : Grandmaster's Hellion Hood
2841: T8_HEAD_LEATHER_HELL                                             : Elder's Hellion Hood
2842: T8_HEAD_LEATHER_HELL@1                                           : Elder's Hellion Hood
2843: T8_HEAD_LEATHER_HELL@2                                           : Elder's Hellion Hood
2844: T8_HEAD_LEATHER_HELL@3                                           : Elder's Hellion Hood
2845: T4_ARMOR_LEATHER_HELL                                            : Adept's Hellion Jacket
2846: T4_ARMOR_LEATHER_HELL@1                                          : Adept's Hellion Jacket
2847: T4_ARMOR_LEATHER_HELL@2                                          : Adept's Hellion Jacket
2848: T4_ARMOR_LEATHER_HELL@3                                          : Adept's Hellion Jacket
2849: T5_ARMOR_LEATHER_HELL                                            : Expert's Hellion Jacket
2850: T5_ARMOR_LEATHER_HELL@1                                          : Expert's Hellion Jacket
2851: T5_ARMOR_LEATHER_HELL@2                                          : Expert's Hellion Jacket
2852: T5_ARMOR_LEATHER_HELL@3                                          : Expert's Hellion Jacket
2853: T6_ARMOR_LEATHER_HELL                                            : Master's Hellion Jacket
2854: T6_ARMOR_LEATHER_HELL@1                                          : Master's Hellion Jacket
2855: T6_ARMOR_LEATHER_HELL@2                                          : Master's Hellion Jacket
2856: T6_ARMOR_LEATHER_HELL@3                                          : Master's Hellion Jacket
2857: T7_ARMOR_LEATHER_HELL                                            : Grandmaster's Hellion Jacket
2858: T7_ARMOR_LEATHER_HELL@1                                          : Grandmaster's Hellion Jacket
2859: T7_ARMOR_LEATHER_HELL@2                                          : Grandmaster's Hellion Jacket
2860: T7_ARMOR_LEATHER_HELL@3                                          : Grandmaster's Hellion Jacket
2861: T8_ARMOR_LEATHER_HELL                                            : Elder's Hellion Jacket
2862: T8_ARMOR_LEATHER_HELL@1                                          : Elder's Hellion Jacket
2863: T8_ARMOR_LEATHER_HELL@2                                          : Elder's Hellion Jacket
2864: T8_ARMOR_LEATHER_HELL@3                                          : Elder's Hellion Jacket
2865: T4_SHOES_LEATHER_HELL                                            : Adept's Hellion Shoes
2866: T4_SHOES_LEATHER_HELL@1                                          : Adept's Hellion Shoes
2867: T4_SHOES_LEATHER_HELL@2                                          : Adept's Hellion Shoes
2868: T4_SHOES_LEATHER_HELL@3                                          : Adept's Hellion Shoes
2869: T5_SHOES_LEATHER_HELL                                            : Expert's Hellion Shoes
2870: T5_SHOES_LEATHER_HELL@1                                          : Expert's Hellion Shoes
2871: T5_SHOES_LEATHER_HELL@2                                          : Expert's Hellion Shoes
2872: T5_SHOES_LEATHER_HELL@3                                          : Expert's Hellion Shoes
2873: T6_SHOES_LEATHER_HELL                                            : Master's Hellion Shoes
2874: T6_SHOES_LEATHER_HELL@1                                          : Master's Hellion Shoes
2875: T6_SHOES_LEATHER_HELL@2                                          : Master's Hellion Shoes
2876: T6_SHOES_LEATHER_HELL@3                                          : Master's Hellion Shoes
2877: T7_SHOES_LEATHER_HELL                                            : Grandmaster's Hellion Shoes
2878: T7_SHOES_LEATHER_HELL@1                                          : Grandmaster's Hellion Shoes
2879: T7_SHOES_LEATHER_HELL@2                                          : Grandmaster's Hellion Shoes
2880: T7_SHOES_LEATHER_HELL@3                                          : Grandmaster's Hellion Shoes
2881: T8_SHOES_LEATHER_HELL                                            : Elder's Hellion Shoes
2882: T8_SHOES_LEATHER_HELL@1                                          : Elder's Hellion Shoes
2883: T8_SHOES_LEATHER_HELL@2                                          : Elder's Hellion Shoes
2884: T8_SHOES_LEATHER_HELL@3                                          : Elder's Hellion Shoes
2885: T4_HEAD_LEATHER_UNDEAD                                           : Adept's Specter Hood
2886: T4_HEAD_LEATHER_UNDEAD@1                                         : Adept's Specter Hood
2887: T4_HEAD_LEATHER_UNDEAD@2                                         : Adept's Specter Hood
2888: T4_HEAD_LEATHER_UNDEAD@3                                         : Adept's Specter Hood
2889: T5_HEAD_LEATHER_UNDEAD                                           : Expert's Specter Hood
2890: T5_HEAD_LEATHER_UNDEAD@1                                         : Expert's Specter Hood
2891: T5_HEAD_LEATHER_UNDEAD@2                                         : Expert's Specter Hood
2892: T5_HEAD_LEATHER_UNDEAD@3                                         : Expert's Specter Hood
2893: T6_HEAD_LEATHER_UNDEAD                                           : Master's Specter Hood
2894: T6_HEAD_LEATHER_UNDEAD@1                                         : Master's Specter Hood
2895: T6_HEAD_LEATHER_UNDEAD@2                                         : Master's Specter Hood
2896: T6_HEAD_LEATHER_UNDEAD@3                                         : Master's Specter Hood
2897: T7_HEAD_LEATHER_UNDEAD                                           : Grandmaster's Specter Hood
2898: T7_HEAD_LEATHER_UNDEAD@1                                         : Grandmaster's Specter Hood
2899: T7_HEAD_LEATHER_UNDEAD@2                                         : Grandmaster's Specter Hood
2900: T7_HEAD_LEATHER_UNDEAD@3                                         : Grandmaster's Specter Hood
2901: T8_HEAD_LEATHER_UNDEAD                                           : Elder's Specter Hood
2902: T8_HEAD_LEATHER_UNDEAD@1                                         : Elder's Specter Hood
2903: T8_HEAD_LEATHER_UNDEAD@2                                         : Elder's Specter Hood
2904: T8_HEAD_LEATHER_UNDEAD@3                                         : Elder's Specter Hood
2905: T4_ARMOR_LEATHER_UNDEAD                                          : Adept's Specter Jacket
2906: T4_ARMOR_LEATHER_UNDEAD@1                                        : Adept's Specter Jacket
2907: T4_ARMOR_LEATHER_UNDEAD@2                                        : Adept's Specter Jacket
2908: T4_ARMOR_LEATHER_UNDEAD@3                                        : Adept's Specter Jacket
2909: T5_ARMOR_LEATHER_UNDEAD                                          : Expert's Specter Jacket
2910: T5_ARMOR_LEATHER_UNDEAD@1                                        : Expert's Specter Jacket
2911: T5_ARMOR_LEATHER_UNDEAD@2                                        : Expert's Specter Jacket
2912: T5_ARMOR_LEATHER_UNDEAD@3                                        : Expert's Specter Jacket
2913: T6_ARMOR_LEATHER_UNDEAD                                          : Master's Specter Jacket
2914: T6_ARMOR_LEATHER_UNDEAD@1                                        : Master's Specter Jacket
2915: T6_ARMOR_LEATHER_UNDEAD@2                                        : Master's Specter Jacket
2916: T6_ARMOR_LEATHER_UNDEAD@3                                        : Master's Specter Jacket
2917: T7_ARMOR_LEATHER_UNDEAD                                          : Grandmaster's Specter Jacket
2918: T7_ARMOR_LEATHER_UNDEAD@1                                        : Grandmaster's Specter Jacket
2919: T7_ARMOR_LEATHER_UNDEAD@2                                        : Grandmaster's Specter Jacket
2920: T7_ARMOR_LEATHER_UNDEAD@3                                        : Grandmaster's Specter Jacket
2921: T8_ARMOR_LEATHER_UNDEAD                                          : Elder's Specter Jacket
2922: T8_ARMOR_LEATHER_UNDEAD@1                                        : Elder's Specter Jacket
2923: T8_ARMOR_LEATHER_UNDEAD@2                                        : Elder's Specter Jacket
2924: T8_ARMOR_LEATHER_UNDEAD@3                                        : Elder's Specter Jacket
2925: T4_SHOES_LEATHER_UNDEAD                                          : Adept's Specter Shoes
2926: T4_SHOES_LEATHER_UNDEAD@1                                        : Adept's Specter Shoes
2927: T4_SHOES_LEATHER_UNDEAD@2                                        : Adept's Specter Shoes
2928: T4_SHOES_LEATHER_UNDEAD@3                                        : Adept's Specter Shoes
2929: T5_SHOES_LEATHER_UNDEAD                                          : Expert's Specter Shoes
2930: T5_SHOES_LEATHER_UNDEAD@1                                        : Expert's Specter Shoes
2931: T5_SHOES_LEATHER_UNDEAD@2                                        : Expert's Specter Shoes
2932: T5_SHOES_LEATHER_UNDEAD@3                                        : Expert's Specter Shoes
2933: T6_SHOES_LEATHER_UNDEAD                                          : Master's Specter Shoes
2934: T6_SHOES_LEATHER_UNDEAD@1                                        : Master's Specter Shoes
2935: T6_SHOES_LEATHER_UNDEAD@2                                        : Master's Specter Shoes
2936: T6_SHOES_LEATHER_UNDEAD@3                                        : Master's Specter Shoes
2937: T7_SHOES_LEATHER_UNDEAD                                          : Grandmaster's Specter Shoes
2938: T7_SHOES_LEATHER_UNDEAD@1                                        : Grandmaster's Specter Shoes
2939: T7_SHOES_LEATHER_UNDEAD@2                                        : Grandmaster's Specter Shoes
2940: T7_SHOES_LEATHER_UNDEAD@3                                        : Grandmaster's Specter Shoes
2941: T8_SHOES_LEATHER_UNDEAD                                          : Elder's Specter Shoes
2942: T8_SHOES_LEATHER_UNDEAD@1                                        : Elder's Specter Shoes
2943: T8_SHOES_LEATHER_UNDEAD@2                                        : Elder's Specter Shoes
2944: T8_SHOES_LEATHER_UNDEAD@3                                        : Elder's Specter Shoes
2945: T4_HEAD_LEATHER_AVALON                                           : Adept's Hood of Tenacity
2946: T4_HEAD_LEATHER_AVALON@1                                         : Adept's Hood of Tenacity
2947: T4_HEAD_LEATHER_AVALON@2                                         : Adept's Hood of Tenacity
2948: T4_HEAD_LEATHER_AVALON@3                                         : Adept's Hood of Tenacity
2949: T5_HEAD_LEATHER_AVALON                                           : Expert's Hood of Tenacity
2950: T5_HEAD_LEATHER_AVALON@1                                         : Expert's Hood of Tenacity
2951: T5_HEAD_LEATHER_AVALON@2                                         : Expert's Hood of Tenacity
2952: T5_HEAD_LEATHER_AVALON@3                                         : Expert's Hood of Tenacity
2953: T6_HEAD_LEATHER_AVALON                                           : Master's Hood of Tenacity
2954: T6_HEAD_LEATHER_AVALON@1                                         : Master's Hood of Tenacity
2955: T6_HEAD_LEATHER_AVALON@2                                         : Master's Hood of Tenacity
2956: T6_HEAD_LEATHER_AVALON@3                                         : Master's Hood of Tenacity
2957: T7_HEAD_LEATHER_AVALON                                           : Grandmaster's Hood of Tenacity
2958: T7_HEAD_LEATHER_AVALON@1                                         : Grandmaster's Hood of Tenacity
2959: T7_HEAD_LEATHER_AVALON@2                                         : Grandmaster's Hood of Tenacity
2960: T7_HEAD_LEATHER_AVALON@3                                         : Grandmaster's Hood of Tenacity
2961: T8_HEAD_LEATHER_AVALON                                           : Elder's Hood of Tenacity
2962: T8_HEAD_LEATHER_AVALON@1                                         : Elder's Hood of Tenacity
2963: T8_HEAD_LEATHER_AVALON@2                                         : Elder's Hood of Tenacity
2964: T8_HEAD_LEATHER_AVALON@3                                         : Elder's Hood of Tenacity
2965: T4_ARMOR_LEATHER_AVALON                                          : Adept's Jacket of Tenacity
2966: T4_ARMOR_LEATHER_AVALON@1                                        : Adept's Jacket of Tenacity
2967: T4_ARMOR_LEATHER_AVALON@2                                        : Adept's Jacket of Tenacity
2968: T4_ARMOR_LEATHER_AVALON@3                                        : Adept's Jacket of Tenacity
2969: T5_ARMOR_LEATHER_AVALON                                          : Expert's Jacket of Tenacity
2970: T5_ARMOR_LEATHER_AVALON@1                                        : Expert's Jacket of Tenacity
2971: T5_ARMOR_LEATHER_AVALON@2                                        : Expert's Jacket of Tenacity
2972: T5_ARMOR_LEATHER_AVALON@3                                        : Expert's Jacket of Tenacity
2973: T6_ARMOR_LEATHER_AVALON                                          : Master's Jacket of Tenacity
2974: T6_ARMOR_LEATHER_AVALON@1                                        : Master's Jacket of Tenacity
2975: T6_ARMOR_LEATHER_AVALON@2                                        : Master's Jacket of Tenacity
2976: T6_ARMOR_LEATHER_AVALON@3                                        : Master's Jacket of Tenacity
2977: T7_ARMOR_LEATHER_AVALON                                          : Grandmaster's Jacket of Tenacity
2978: T7_ARMOR_LEATHER_AVALON@1                                        : Grandmaster's Jacket of Tenacity
2979: T7_ARMOR_LEATHER_AVALON@2                                        : Grandmaster's Jacket of Tenacity
2980: T7_ARMOR_LEATHER_AVALON@3                                        : Grandmaster's Jacket of Tenacity
2981: T8_ARMOR_LEATHER_AVALON                                          : Elder's Jacket of Tenacity
2982: T8_ARMOR_LEATHER_AVALON@1                                        : Elder's Jacket of Tenacity
2983: T8_ARMOR_LEATHER_AVALON@2                                        : Elder's Jacket of Tenacity
2984: T8_ARMOR_LEATHER_AVALON@3                                        : Elder's Jacket of Tenacity
2985: T4_SHOES_LEATHER_AVALON                                          : Adept's Shoes of Tenacity
2986: T4_SHOES_LEATHER_AVALON@1                                        : Adept's Shoes of Tenacity
2987: T4_SHOES_LEATHER_AVALON@2                                        : Adept's Shoes of Tenacity
2988: T4_SHOES_LEATHER_AVALON@3                                        : Adept's Shoes of Tenacity
2989: T5_SHOES_LEATHER_AVALON                                          : Expert's Shoes of Tenacity
2990: T5_SHOES_LEATHER_AVALON@1                                        : Expert's Shoes of Tenacity
2991: T5_SHOES_LEATHER_AVALON@2                                        : Expert's Shoes of Tenacity
2992: T5_SHOES_LEATHER_AVALON@3                                        : Expert's Shoes of Tenacity
2993: T6_SHOES_LEATHER_AVALON                                          : Master's Shoes of Tenacity
2994: T6_SHOES_LEATHER_AVALON@1                                        : Master's Shoes of Tenacity
2995: T6_SHOES_LEATHER_AVALON@2                                        : Master's Shoes of Tenacity
2996: T6_SHOES_LEATHER_AVALON@3                                        : Master's Shoes of Tenacity
2997: T7_SHOES_LEATHER_AVALON                                          : Grandmaster's Shoes of Tenacity
2998: T7_SHOES_LEATHER_AVALON@1                                        : Grandmaster's Shoes of Tenacity
2999: T7_SHOES_LEATHER_AVALON@2                                        : Grandmaster's Shoes of Tenacity
3000: T7_SHOES_LEATHER_AVALON@3                                        : Grandmaster's Shoes of Tenacity
3001: T8_SHOES_LEATHER_AVALON                                          : Elder's Shoes of Tenacity
3002: T8_SHOES_LEATHER_AVALON@1                                        : Elder's Shoes of Tenacity
3003: T8_SHOES_LEATHER_AVALON@2                                        : Elder's Shoes of Tenacity
3004: T8_SHOES_LEATHER_AVALON@3                                        : Elder's Shoes of Tenacity
3005: T2_HEAD_CLOTH_SET1                                               : Novice's Scholar Cowl
3006: T3_HEAD_CLOTH_SET1                                               : Journeyman's Scholar Cowl
3007: T4_HEAD_CLOTH_SET1                                               : Adept's Scholar Cowl
3008: T4_HEAD_CLOTH_SET1@1                                             : Adept's Scholar Cowl
3009: T4_HEAD_CLOTH_SET1@2                                             : Adept's Scholar Cowl
3010: T4_HEAD_CLOTH_SET1@3                                             : Adept's Scholar Cowl
3011: T5_HEAD_CLOTH_SET1                                               : Expert's Scholar Cowl
3012: T5_HEAD_CLOTH_SET1@1                                             : Expert's Scholar Cowl
3013: T5_HEAD_CLOTH_SET1@2                                             : Expert's Scholar Cowl
3014: T5_HEAD_CLOTH_SET1@3                                             : Expert's Scholar Cowl
3015: T6_HEAD_CLOTH_SET1                                               : Master's Scholar Cowl
3016: T6_HEAD_CLOTH_SET1@1                                             : Master's Scholar Cowl
3017: T6_HEAD_CLOTH_SET1@2                                             : Master's Scholar Cowl
3018: T6_HEAD_CLOTH_SET1@3                                             : Master's Scholar Cowl
3019: T7_HEAD_CLOTH_SET1                                               : Grandmaster's Scholar Cowl
3020: T7_HEAD_CLOTH_SET1@1                                             : Grandmaster's Scholar Cowl
3021: T7_HEAD_CLOTH_SET1@2                                             : Grandmaster's Scholar Cowl
3022: T7_HEAD_CLOTH_SET1@3                                             : Grandmaster's Scholar Cowl
3023: T8_HEAD_CLOTH_SET1                                               : Elder's Scholar Cowl
3024: T8_HEAD_CLOTH_SET1@1                                             : Elder's Scholar Cowl
3025: T8_HEAD_CLOTH_SET1@2                                             : Elder's Scholar Cowl
3026: T8_HEAD_CLOTH_SET1@3                                             : Elder's Scholar Cowl
3027: T2_ARMOR_CLOTH_SET1                                              : Novice's Scholar Robe
3028: T3_ARMOR_CLOTH_SET1                                              : Journeyman's Scholar Robe
3029: T4_ARMOR_CLOTH_SET1                                              : Adept's Scholar Robe
3030: T4_ARMOR_CLOTH_SET1@1                                            : Adept's Scholar Robe
3031: T4_ARMOR_CLOTH_SET1@2                                            : Adept's Scholar Robe
3032: T4_ARMOR_CLOTH_SET1@3                                            : Adept's Scholar Robe
3033: T5_ARMOR_CLOTH_SET1                                              : Expert's Scholar Robe
3034: T5_ARMOR_CLOTH_SET1@1                                            : Expert's Scholar Robe
3035: T5_ARMOR_CLOTH_SET1@2                                            : Expert's Scholar Robe
3036: T5_ARMOR_CLOTH_SET1@3                                            : Expert's Scholar Robe
3037: T6_ARMOR_CLOTH_SET1                                              : Master's Scholar Robe
3038: T6_ARMOR_CLOTH_SET1@1                                            : Master's Scholar Robe
3039: T6_ARMOR_CLOTH_SET1@2                                            : Master's Scholar Robe
3040: T6_ARMOR_CLOTH_SET1@3                                            : Master's Scholar Robe
3041: T7_ARMOR_CLOTH_SET1                                              : Grandmaster's Scholar Robe
3042: T7_ARMOR_CLOTH_SET1@1                                            : Grandmaster's Scholar Robe
3043: T7_ARMOR_CLOTH_SET1@2                                            : Grandmaster's Scholar Robe
3044: T7_ARMOR_CLOTH_SET1@3                                            : Grandmaster's Scholar Robe
3045: T8_ARMOR_CLOTH_SET1                                              : Elder's Scholar Robe
3046: T8_ARMOR_CLOTH_SET1@1                                            : Elder's Scholar Robe
3047: T8_ARMOR_CLOTH_SET1@2                                            : Elder's Scholar Robe
3048: T8_ARMOR_CLOTH_SET1@3                                            : Elder's Scholar Robe
3049: T2_SHOES_CLOTH_SET1                                              : Novice's Scholar Sandals
3050: T3_SHOES_CLOTH_SET1                                              : Journeyman's Scholar Sandals
3051: T4_SHOES_CLOTH_SET1                                              : Adept's Scholar Sandals
3052: T4_SHOES_CLOTH_SET1@1                                            : Adept's Scholar Sandals
3053: T4_SHOES_CLOTH_SET1@2                                            : Adept's Scholar Sandals
3054: T4_SHOES_CLOTH_SET1@3                                            : Adept's Scholar Sandals
3055: T5_SHOES_CLOTH_SET1                                              : Expert's Scholar Sandals
3056: T5_SHOES_CLOTH_SET1@1                                            : Expert's Scholar Sandals
3057: T5_SHOES_CLOTH_SET1@2                                            : Expert's Scholar Sandals
3058: T5_SHOES_CLOTH_SET1@3                                            : Expert's Scholar Sandals
3059: T6_SHOES_CLOTH_SET1                                              : Master's Scholar Sandals
3060: T6_SHOES_CLOTH_SET1@1                                            : Master's Scholar Sandals
3061: T6_SHOES_CLOTH_SET1@2                                            : Master's Scholar Sandals
3062: T6_SHOES_CLOTH_SET1@3                                            : Master's Scholar Sandals
3063: T7_SHOES_CLOTH_SET1                                              : Grandmaster's Scholar Sandals
3064: T7_SHOES_CLOTH_SET1@1                                            : Grandmaster's Scholar Sandals
3065: T7_SHOES_CLOTH_SET1@2                                            : Grandmaster's Scholar Sandals
3066: T7_SHOES_CLOTH_SET1@3                                            : Grandmaster's Scholar Sandals
3067: T8_SHOES_CLOTH_SET1                                              : Elder's Scholar Sandals
3068: T8_SHOES_CLOTH_SET1@1                                            : Elder's Scholar Sandals
3069: T8_SHOES_CLOTH_SET1@2                                            : Elder's Scholar Sandals
3070: T8_SHOES_CLOTH_SET1@3                                            : Elder's Scholar Sandals
3071: T4_HEAD_CLOTH_SET2                                               : Adept's Cleric Cowl
3072: T4_HEAD_CLOTH_SET2@1                                             : Adept's Cleric Cowl
3073: T4_HEAD_CLOTH_SET2@2                                             : Adept's Cleric Cowl
3074: T4_HEAD_CLOTH_SET2@3                                             : Adept's Cleric Cowl
3075: T5_HEAD_CLOTH_SET2                                               : Expert's Cleric Cowl
3076: T5_HEAD_CLOTH_SET2@1                                             : Expert's Cleric Cowl
3077: T5_HEAD_CLOTH_SET2@2                                             : Expert's Cleric Cowl
3078: T5_HEAD_CLOTH_SET2@3                                             : Expert's Cleric Cowl
3079: T6_HEAD_CLOTH_SET2                                               : Master's Cleric Cowl
3080: T6_HEAD_CLOTH_SET2@1                                             : Master's Cleric Cowl
3081: T6_HEAD_CLOTH_SET2@2                                             : Master's Cleric Cowl
3082: T6_HEAD_CLOTH_SET2@3                                             : Master's Cleric Cowl
3083: T7_HEAD_CLOTH_SET2                                               : Grandmaster's Cleric Cowl
3084: T7_HEAD_CLOTH_SET2@1                                             : Grandmaster's Cleric Cowl
3085: T7_HEAD_CLOTH_SET2@2                                             : Grandmaster's Cleric Cowl
3086: T7_HEAD_CLOTH_SET2@3                                             : Grandmaster's Cleric Cowl
3087: T8_HEAD_CLOTH_SET2                                               : Elder's Cleric Cowl
3088: T8_HEAD_CLOTH_SET2@1                                             : Elder's Cleric Cowl
3089: T8_HEAD_CLOTH_SET2@2                                             : Elder's Cleric Cowl
3090: T8_HEAD_CLOTH_SET2@3                                             : Elder's Cleric Cowl
3091: T4_ARMOR_CLOTH_SET2                                              : Adept's Cleric Robe
3092: T4_ARMOR_CLOTH_SET2@1                                            : Adept's Cleric Robe
3093: T4_ARMOR_CLOTH_SET2@2                                            : Adept's Cleric Robe
3094: T4_ARMOR_CLOTH_SET2@3                                            : Adept's Cleric Robe
3095: T5_ARMOR_CLOTH_SET2                                              : Expert's Cleric Robe
3096: T5_ARMOR_CLOTH_SET2@1                                            : Expert's Cleric Robe
3097: T5_ARMOR_CLOTH_SET2@2                                            : Expert's Cleric Robe
3098: T5_ARMOR_CLOTH_SET2@3                                            : Expert's Cleric Robe
3099: T6_ARMOR_CLOTH_SET2                                              : Master's Cleric Robe
3100: T6_ARMOR_CLOTH_SET2@1                                            : Master's Cleric Robe
3101: T6_ARMOR_CLOTH_SET2@2                                            : Master's Cleric Robe
3102: T6_ARMOR_CLOTH_SET2@3                                            : Master's Cleric Robe
3103: T7_ARMOR_CLOTH_SET2                                              : Grandmaster's Cleric Robe
3104: T7_ARMOR_CLOTH_SET2@1                                            : Grandmaster's Cleric Robe
3105: T7_ARMOR_CLOTH_SET2@2                                            : Grandmaster's Cleric Robe
3106: T7_ARMOR_CLOTH_SET2@3                                            : Grandmaster's Cleric Robe
3107: T8_ARMOR_CLOTH_SET2                                              : Elder's Cleric Robe
3108: T8_ARMOR_CLOTH_SET2@1                                            : Elder's Cleric Robe
3109: T8_ARMOR_CLOTH_SET2@2                                            : Elder's Cleric Robe
3110: T8_ARMOR_CLOTH_SET2@3                                            : Elder's Cleric Robe
3111: T4_SHOES_CLOTH_SET2                                              : Adept's Cleric Sandals
3112: T4_SHOES_CLOTH_SET2@1                                            : Adept's Cleric Sandals
3113: T4_SHOES_CLOTH_SET2@2                                            : Adept's Cleric Sandals
3114: T4_SHOES_CLOTH_SET2@3                                            : Adept's Cleric Sandals
3115: T5_SHOES_CLOTH_SET2                                              : Expert's Cleric Sandals
3116: T5_SHOES_CLOTH_SET2@1                                            : Expert's Cleric Sandals
3117: T5_SHOES_CLOTH_SET2@2                                            : Expert's Cleric Sandals
3118: T5_SHOES_CLOTH_SET2@3                                            : Expert's Cleric Sandals
3119: T6_SHOES_CLOTH_SET2                                              : Master's Cleric Sandals
3120: T6_SHOES_CLOTH_SET2@1                                            : Master's Cleric Sandals
3121: T6_SHOES_CLOTH_SET2@2                                            : Master's Cleric Sandals
3122: T6_SHOES_CLOTH_SET2@3                                            : Master's Cleric Sandals
3123: T7_SHOES_CLOTH_SET2                                              : Grandmaster's Cleric Sandals
3124: T7_SHOES_CLOTH_SET2@1                                            : Grandmaster's Cleric Sandals
3125: T7_SHOES_CLOTH_SET2@2                                            : Grandmaster's Cleric Sandals
3126: T7_SHOES_CLOTH_SET2@3                                            : Grandmaster's Cleric Sandals
3127: T8_SHOES_CLOTH_SET2                                              : Elder's Cleric Sandals
3128: T8_SHOES_CLOTH_SET2@1                                            : Elder's Cleric Sandals
3129: T8_SHOES_CLOTH_SET2@2                                            : Elder's Cleric Sandals
3130: T8_SHOES_CLOTH_SET2@3                                            : Elder's Cleric Sandals
3131: T4_HEAD_CLOTH_SET3                                               : Adept's Mage Cowl
3132: T4_HEAD_CLOTH_SET3@1                                             : Adept's Mage Cowl
3133: T4_HEAD_CLOTH_SET3@2                                             : Adept's Mage Cowl
3134: T4_HEAD_CLOTH_SET3@3                                             : Adept's Mage Cowl
3135: T5_HEAD_CLOTH_SET3                                               : Expert's Mage Cowl
3136: T5_HEAD_CLOTH_SET3@1                                             : Expert's Mage Cowl
3137: T5_HEAD_CLOTH_SET3@2                                             : Expert's Mage Cowl
3138: T5_HEAD_CLOTH_SET3@3                                             : Expert's Mage Cowl
3139: T6_HEAD_CLOTH_SET3                                               : Master's Mage Cowl
3140: T6_HEAD_CLOTH_SET3@1                                             : Master's Mage Cowl
3141: T6_HEAD_CLOTH_SET3@2                                             : Master's Mage Cowl
3142: T6_HEAD_CLOTH_SET3@3                                             : Master's Mage Cowl
3143: T7_HEAD_CLOTH_SET3                                               : Grandmaster's Mage Cowl
3144: T7_HEAD_CLOTH_SET3@1                                             : Grandmaster's Mage Cowl
3145: T7_HEAD_CLOTH_SET3@2                                             : Grandmaster's Mage Cowl
3146: T7_HEAD_CLOTH_SET3@3                                             : Grandmaster's Mage Cowl
3147: T8_HEAD_CLOTH_SET3                                               : Elder's Mage Cowl
3148: T8_HEAD_CLOTH_SET3@1                                             : Elder's Mage Cowl
3149: T8_HEAD_CLOTH_SET3@2                                             : Elder's Mage Cowl
3150: T8_HEAD_CLOTH_SET3@3                                             : Elder's Mage Cowl
3151: T4_ARMOR_CLOTH_SET3                                              : Adept's Mage Robe
3152: T4_ARMOR_CLOTH_SET3@1                                            : Adept's Mage Robe
3153: T4_ARMOR_CLOTH_SET3@2                                            : Adept's Mage Robe
3154: T4_ARMOR_CLOTH_SET3@3                                            : Adept's Mage Robe
3155: T5_ARMOR_CLOTH_SET3                                              : Expert's Mage Robe
3156: T5_ARMOR_CLOTH_SET3@1                                            : Expert's Mage Robe
3157: T5_ARMOR_CLOTH_SET3@2                                            : Expert's Mage Robe
3158: T5_ARMOR_CLOTH_SET3@3                                            : Expert's Mage Robe
3159: T6_ARMOR_CLOTH_SET3                                              : Master's Mage Robe
3160: T6_ARMOR_CLOTH_SET3@1                                            : Master's Mage Robe
3161: T6_ARMOR_CLOTH_SET3@2                                            : Master's Mage Robe
3162: T6_ARMOR_CLOTH_SET3@3                                            : Master's Mage Robe
3163: T7_ARMOR_CLOTH_SET3                                              : Grandmaster's Mage Robe
3164: T7_ARMOR_CLOTH_SET3@1                                            : Grandmaster's Mage Robe
3165: T7_ARMOR_CLOTH_SET3@2                                            : Grandmaster's Mage Robe
3166: T7_ARMOR_CLOTH_SET3@3                                            : Grandmaster's Mage Robe
3167: T8_ARMOR_CLOTH_SET3                                              : Elder's Mage Robe
3168: T8_ARMOR_CLOTH_SET3@1                                            : Elder's Mage Robe
3169: T8_ARMOR_CLOTH_SET3@2                                            : Elder's Mage Robe
3170: T8_ARMOR_CLOTH_SET3@3                                            : Elder's Mage Robe
3171: T4_SHOES_CLOTH_SET3                                              : Adept's Mage Sandals
3172: T4_SHOES_CLOTH_SET3@1                                            : Adept's Mage Sandals
3173: T4_SHOES_CLOTH_SET3@2                                            : Adept's Mage Sandals
3174: T4_SHOES_CLOTH_SET3@3                                            : Adept's Mage Sandals
3175: T5_SHOES_CLOTH_SET3                                              : Expert's Mage Sandals
3176: T5_SHOES_CLOTH_SET3@1                                            : Expert's Mage Sandals
3177: T5_SHOES_CLOTH_SET3@2                                            : Expert's Mage Sandals
3178: T5_SHOES_CLOTH_SET3@3                                            : Expert's Mage Sandals
3179: T6_SHOES_CLOTH_SET3                                              : Master's Mage Sandals
3180: T6_SHOES_CLOTH_SET3@1                                            : Master's Mage Sandals
3181: T6_SHOES_CLOTH_SET3@2                                            : Master's Mage Sandals
3182: T6_SHOES_CLOTH_SET3@3                                            : Master's Mage Sandals
3183: T7_SHOES_CLOTH_SET3                                              : Grandmaster's Mage Sandals
3184: T7_SHOES_CLOTH_SET3@1                                            : Grandmaster's Mage Sandals
3185: T7_SHOES_CLOTH_SET3@2                                            : Grandmaster's Mage Sandals
3186: T7_SHOES_CLOTH_SET3@3                                            : Grandmaster's Mage Sandals
3187: T8_SHOES_CLOTH_SET3                                              : Elder's Mage Sandals
3188: T8_SHOES_CLOTH_SET3@1                                            : Elder's Mage Sandals
3189: T8_SHOES_CLOTH_SET3@2                                            : Elder's Mage Sandals
3190: T8_SHOES_CLOTH_SET3@3                                            : Elder's Mage Sandals
3191: T4_HEAD_CLOTH_KEEPER                                             : Adept's Druid Cowl
3192: T4_HEAD_CLOTH_KEEPER@1                                           : Adept's Druid Cowl
3193: T4_HEAD_CLOTH_KEEPER@2                                           : Adept's Druid Cowl
3194: T4_HEAD_CLOTH_KEEPER@3                                           : Adept's Druid Cowl
3195: T5_HEAD_CLOTH_KEEPER                                             : Expert's Druid Cowl
3196: T5_HEAD_CLOTH_KEEPER@1                                           : Expert's Druid Cowl
3197: T5_HEAD_CLOTH_KEEPER@2                                           : Expert's Druid Cowl
3198: T5_HEAD_CLOTH_KEEPER@3                                           : Expert's Druid Cowl
3199: T6_HEAD_CLOTH_KEEPER                                             : Master's Druid Cowl
3200: T6_HEAD_CLOTH_KEEPER@1                                           : Master's Druid Cowl
3201: T6_HEAD_CLOTH_KEEPER@2                                           : Master's Druid Cowl
3202: T6_HEAD_CLOTH_KEEPER@3                                           : Master's Druid Cowl
3203: T7_HEAD_CLOTH_KEEPER                                             : Grandmaster's Druid Cowl
3204: T7_HEAD_CLOTH_KEEPER@1                                           : Grandmaster's Druid Cowl
3205: T7_HEAD_CLOTH_KEEPER@2                                           : Grandmaster's Druid Cowl
3206: T7_HEAD_CLOTH_KEEPER@3                                           : Grandmaster's Druid Cowl
3207: T8_HEAD_CLOTH_KEEPER                                             : Elder's Druid Cowl
3208: T8_HEAD_CLOTH_KEEPER@1                                           : Elder's Druid Cowl
3209: T8_HEAD_CLOTH_KEEPER@2                                           : Elder's Druid Cowl
3210: T8_HEAD_CLOTH_KEEPER@3                                           : Elder's Druid Cowl
3211: T4_ARMOR_CLOTH_KEEPER                                            : Adept's Druid Robe
3212: T4_ARMOR_CLOTH_KEEPER@1                                          : Adept's Druid Robe
3213: T4_ARMOR_CLOTH_KEEPER@2                                          : Adept's Druid Robe
3214: T4_ARMOR_CLOTH_KEEPER@3                                          : Adept's Druid Robe
3215: T5_ARMOR_CLOTH_KEEPER                                            : Expert's Druid Robe
3216: T5_ARMOR_CLOTH_KEEPER@1                                          : Expert's Druid Robe
3217: T5_ARMOR_CLOTH_KEEPER@2                                          : Expert's Druid Robe
3218: T5_ARMOR_CLOTH_KEEPER@3                                          : Expert's Druid Robe
3219: T6_ARMOR_CLOTH_KEEPER                                            : Master's Druid Robe
3220: T6_ARMOR_CLOTH_KEEPER@1                                          : Master's Druid Robe
3221: T6_ARMOR_CLOTH_KEEPER@2                                          : Master's Druid Robe
3222: T6_ARMOR_CLOTH_KEEPER@3                                          : Master's Druid Robe
3223: T7_ARMOR_CLOTH_KEEPER                                            : Grandmaster's Druid Robe
3224: T7_ARMOR_CLOTH_KEEPER@1                                          : Grandmaster's Druid Robe
3225: T7_ARMOR_CLOTH_KEEPER@2                                          : Grandmaster's Druid Robe
3226: T7_ARMOR_CLOTH_KEEPER@3                                          : Grandmaster's Druid Robe
3227: T8_ARMOR_CLOTH_KEEPER                                            : Elder's Druid Robe
3228: T8_ARMOR_CLOTH_KEEPER@1                                          : Elder's Druid Robe
3229: T8_ARMOR_CLOTH_KEEPER@2                                          : Elder's Druid Robe
3230: T8_ARMOR_CLOTH_KEEPER@3                                          : Elder's Druid Robe
3231: T4_SHOES_CLOTH_KEEPER                                            : Adept's Druid Sandals
3232: T4_SHOES_CLOTH_KEEPER@1                                          : Adept's Druid Sandals
3233: T4_SHOES_CLOTH_KEEPER@2                                          : Adept's Druid Sandals
3234: T4_SHOES_CLOTH_KEEPER@3                                          : Adept's Druid Sandals
3235: T5_SHOES_CLOTH_KEEPER                                            : Expert's Druid Sandals
3236: T5_SHOES_CLOTH_KEEPER@1                                          : Expert's Druid Sandals
3237: T5_SHOES_CLOTH_KEEPER@2                                          : Expert's Druid Sandals
3238: T5_SHOES_CLOTH_KEEPER@3                                          : Expert's Druid Sandals
3239: T6_SHOES_CLOTH_KEEPER                                            : Master's Druid Sandals
3240: T6_SHOES_CLOTH_KEEPER@1                                          : Master's Druid Sandals
3241: T6_SHOES_CLOTH_KEEPER@2                                          : Master's Druid Sandals
3242: T6_SHOES_CLOTH_KEEPER@3                                          : Master's Druid Sandals
3243: T7_SHOES_CLOTH_KEEPER                                            : Grandmaster's Druid Sandals
3244: T7_SHOES_CLOTH_KEEPER@1                                          : Grandmaster's Druid Sandals
3245: T7_SHOES_CLOTH_KEEPER@2                                          : Grandmaster's Druid Sandals
3246: T7_SHOES_CLOTH_KEEPER@3                                          : Grandmaster's Druid Sandals
3247: T8_SHOES_CLOTH_KEEPER                                            : Elder's Druid Sandals
3248: T8_SHOES_CLOTH_KEEPER@1                                          : Elder's Druid Sandals
3249: T8_SHOES_CLOTH_KEEPER@2                                          : Elder's Druid Sandals
3250: T8_SHOES_CLOTH_KEEPER@3                                          : Elder's Druid Sandals
3251: T4_HEAD_CLOTH_HELL                                               : Adept's Fiend Cowl
3252: T4_HEAD_CLOTH_HELL@1                                             : Adept's Fiend Cowl
3253: T4_HEAD_CLOTH_HELL@2                                             : Adept's Fiend Cowl
3254: T4_HEAD_CLOTH_HELL@3                                             : Adept's Fiend Cowl
3255: T5_HEAD_CLOTH_HELL                                               : Expert's Fiend Cowl
3256: T5_HEAD_CLOTH_HELL@1                                             : Expert's Fiend Cowl
3257: T5_HEAD_CLOTH_HELL@2                                             : Expert's Fiend Cowl
3258: T5_HEAD_CLOTH_HELL@3                                             : Expert's Fiend Cowl
3259: T6_HEAD_CLOTH_HELL                                               : Master's Fiend Cowl
3260: T6_HEAD_CLOTH_HELL@1                                             : Master's Fiend Cowl
3261: T6_HEAD_CLOTH_HELL@2                                             : Master's Fiend Cowl
3262: T6_HEAD_CLOTH_HELL@3                                             : Master's Fiend Cowl
3263: T7_HEAD_CLOTH_HELL                                               : Grandmaster's Fiend Cowl
3264: T7_HEAD_CLOTH_HELL@1                                             : Grandmaster's Fiend Cowl
3265: T7_HEAD_CLOTH_HELL@2                                             : Grandmaster's Fiend Cowl
3266: T7_HEAD_CLOTH_HELL@3                                             : Grandmaster's Fiend Cowl
3267: T8_HEAD_CLOTH_HELL                                               : Elder's Fiend Cowl
3268: T8_HEAD_CLOTH_HELL@1                                             : Elder's Fiend Cowl
3269: T8_HEAD_CLOTH_HELL@2                                             : Elder's Fiend Cowl
3270: T8_HEAD_CLOTH_HELL@3                                             : Elder's Fiend Cowl
3271: T4_ARMOR_CLOTH_HELL                                              : Adept's Fiend Robe
3272: T4_ARMOR_CLOTH_HELL@1                                            : Adept's Fiend Robe
3273: T4_ARMOR_CLOTH_HELL@2                                            : Adept's Fiend Robe
3274: T4_ARMOR_CLOTH_HELL@3                                            : Adept's Fiend Robe
3275: T5_ARMOR_CLOTH_HELL                                              : Expert's Fiend Robe
3276: T5_ARMOR_CLOTH_HELL@1                                            : Expert's Fiend Robe
3277: T5_ARMOR_CLOTH_HELL@2                                            : Expert's Fiend Robe
3278: T5_ARMOR_CLOTH_HELL@3                                            : Expert's Fiend Robe
3279: T6_ARMOR_CLOTH_HELL                                              : Master's Fiend Robe
3280: T6_ARMOR_CLOTH_HELL@1                                            : Master's Fiend Robe
3281: T6_ARMOR_CLOTH_HELL@2                                            : Master's Fiend Robe
3282: T6_ARMOR_CLOTH_HELL@3                                            : Master's Fiend Robe
3283: T7_ARMOR_CLOTH_HELL                                              : Grandmaster's Fiend Robe
3284: T7_ARMOR_CLOTH_HELL@1                                            : Grandmaster's Fiend Robe
3285: T7_ARMOR_CLOTH_HELL@2                                            : Grandmaster's Fiend Robe
3286: T7_ARMOR_CLOTH_HELL@3                                            : Grandmaster's Fiend Robe
3287: T8_ARMOR_CLOTH_HELL                                              : Elder's Fiend Robe
3288: T8_ARMOR_CLOTH_HELL@1                                            : Elder's Fiend Robe
3289: T8_ARMOR_CLOTH_HELL@2                                            : Elder's Fiend Robe
3290: T8_ARMOR_CLOTH_HELL@3                                            : Elder's Fiend Robe
3291: T4_SHOES_CLOTH_HELL                                              : Adept's Fiend Sandals
3292: T4_SHOES_CLOTH_HELL@1                                            : Adept's Fiend Sandals
3293: T4_SHOES_CLOTH_HELL@2                                            : Adept's Fiend Sandals
3294: T4_SHOES_CLOTH_HELL@3                                            : Adept's Fiend Sandals
3295: T5_SHOES_CLOTH_HELL                                              : Expert's Fiend Sandals
3296: T5_SHOES_CLOTH_HELL@1                                            : Expert's Fiend Sandals
3297: T5_SHOES_CLOTH_HELL@2                                            : Expert's Fiend Sandals
3298: T5_SHOES_CLOTH_HELL@3                                            : Expert's Fiend Sandals
3299: T6_SHOES_CLOTH_HELL                                              : Master's Fiend Sandals
3300: T6_SHOES_CLOTH_HELL@1                                            : Master's Fiend Sandals
3301: T6_SHOES_CLOTH_HELL@2                                            : Master's Fiend Sandals
3302: T6_SHOES_CLOTH_HELL@3                                            : Master's Fiend Sandals
3303: T7_SHOES_CLOTH_HELL                                              : Grandmaster's Fiend Sandals
3304: T7_SHOES_CLOTH_HELL@1                                            : Grandmaster's Fiend Sandals
3305: T7_SHOES_CLOTH_HELL@2                                            : Grandmaster's Fiend Sandals
3306: T7_SHOES_CLOTH_HELL@3                                            : Grandmaster's Fiend Sandals
3307: T8_SHOES_CLOTH_HELL                                              : Elder's Fiend Sandals
3308: T8_SHOES_CLOTH_HELL@1                                            : Elder's Fiend Sandals
3309: T8_SHOES_CLOTH_HELL@2                                            : Elder's Fiend Sandals
3310: T8_SHOES_CLOTH_HELL@3                                            : Elder's Fiend Sandals
3311: T4_HEAD_CLOTH_MORGANA                                            : Adept's Cultist Cowl
3312: T4_HEAD_CLOTH_MORGANA@1                                          : Adept's Cultist Cowl
3313: T4_HEAD_CLOTH_MORGANA@2                                          : Adept's Cultist Cowl
3314: T4_HEAD_CLOTH_MORGANA@3                                          : Adept's Cultist Cowl
3315: T5_HEAD_CLOTH_MORGANA                                            : Expert's Cultist Cowl
3316: T5_HEAD_CLOTH_MORGANA@1                                          : Expert's Cultist Cowl
3317: T5_HEAD_CLOTH_MORGANA@2                                          : Expert's Cultist Cowl
3318: T5_HEAD_CLOTH_MORGANA@3                                          : Expert's Cultist Cowl
3319: T6_HEAD_CLOTH_MORGANA                                            : Master's Cultist Cowl
3320: T6_HEAD_CLOTH_MORGANA@1                                          : Master's Cultist Cowl
3321: T6_HEAD_CLOTH_MORGANA@2                                          : Master's Cultist Cowl
3322: T6_HEAD_CLOTH_MORGANA@3                                          : Master's Cultist Cowl
3323: T7_HEAD_CLOTH_MORGANA                                            : Grandmaster's Cultist Cowl
3324: T7_HEAD_CLOTH_MORGANA@1                                          : Grandmaster's Cultist Cowl
3325: T7_HEAD_CLOTH_MORGANA@2                                          : Grandmaster's Cultist Cowl
3326: T7_HEAD_CLOTH_MORGANA@3                                          : Grandmaster's Cultist Cowl
3327: T8_HEAD_CLOTH_MORGANA                                            : Elder's Cultist Cowl
3328: T8_HEAD_CLOTH_MORGANA@1                                          : Elder's Cultist Cowl
3329: T8_HEAD_CLOTH_MORGANA@2                                          : Elder's Cultist Cowl
3330: T8_HEAD_CLOTH_MORGANA@3                                          : Elder's Cultist Cowl
3331: T4_ARMOR_CLOTH_MORGANA                                           : Adept's Cultist Robe
3332: T4_ARMOR_CLOTH_MORGANA@1                                         : Adept's Cultist Robe
3333: T4_ARMOR_CLOTH_MORGANA@2                                         : Adept's Cultist Robe
3334: T4_ARMOR_CLOTH_MORGANA@3                                         : Adept's Cultist Robe
3335: T5_ARMOR_CLOTH_MORGANA                                           : Expert's Cultist Robe
3336: T5_ARMOR_CLOTH_MORGANA@1                                         : Expert's Cultist Robe
3337: T5_ARMOR_CLOTH_MORGANA@2                                         : Expert's Cultist Robe
3338: T5_ARMOR_CLOTH_MORGANA@3                                         : Expert's Cultist Robe
3339: T6_ARMOR_CLOTH_MORGANA                                           : Master's Cultist Robe
3340: T6_ARMOR_CLOTH_MORGANA@1                                         : Master's Cultist Robe
3341: T6_ARMOR_CLOTH_MORGANA@2                                         : Master's Cultist Robe
3342: T6_ARMOR_CLOTH_MORGANA@3                                         : Master's Cultist Robe
3343: T7_ARMOR_CLOTH_MORGANA                                           : Grandmaster's Cultist Robe
3344: T7_ARMOR_CLOTH_MORGANA@1                                         : Grandmaster's Cultist Robe
3345: T7_ARMOR_CLOTH_MORGANA@2                                         : Grandmaster's Cultist Robe
3346: T7_ARMOR_CLOTH_MORGANA@3                                         : Grandmaster's Cultist Robe
3347: T8_ARMOR_CLOTH_MORGANA                                           : Elder's Cultist Robe
3348: T8_ARMOR_CLOTH_MORGANA@1                                         : Elder's Cultist Robe
3349: T8_ARMOR_CLOTH_MORGANA@2                                         : Elder's Cultist Robe
3350: T8_ARMOR_CLOTH_MORGANA@3                                         : Elder's Cultist Robe
3351: T4_SHOES_CLOTH_MORGANA                                           : Adept's Cultist Sandals
3352: T4_SHOES_CLOTH_MORGANA@1                                         : Adept's Cultist Sandals
3353: T4_SHOES_CLOTH_MORGANA@2                                         : Adept's Cultist Sandals
3354: T4_SHOES_CLOTH_MORGANA@3                                         : Adept's Cultist Sandals
3355: T5_SHOES_CLOTH_MORGANA                                           : Expert's Cultist Sandals
3356: T5_SHOES_CLOTH_MORGANA@1                                         : Expert's Cultist Sandals
3357: T5_SHOES_CLOTH_MORGANA@2                                         : Expert's Cultist Sandals
3358: T5_SHOES_CLOTH_MORGANA@3                                         : Expert's Cultist Sandals
3359: T6_SHOES_CLOTH_MORGANA                                           : Master's Cultist Sandals
3360: T6_SHOES_CLOTH_MORGANA@1                                         : Master's Cultist Sandals
3361: T6_SHOES_CLOTH_MORGANA@2                                         : Master's Cultist Sandals
3362: T6_SHOES_CLOTH_MORGANA@3                                         : Master's Cultist Sandals
3363: T7_SHOES_CLOTH_MORGANA                                           : Grandmaster's Cultist Sandals
3364: T7_SHOES_CLOTH_MORGANA@1                                         : Grandmaster's Cultist Sandals
3365: T7_SHOES_CLOTH_MORGANA@2                                         : Grandmaster's Cultist Sandals
3366: T7_SHOES_CLOTH_MORGANA@3                                         : Grandmaster's Cultist Sandals
3367: T8_SHOES_CLOTH_MORGANA                                           : Elder's Cultist Sandals
3368: T8_SHOES_CLOTH_MORGANA@1                                         : Elder's Cultist Sandals
3369: T8_SHOES_CLOTH_MORGANA@2                                         : Elder's Cultist Sandals
3370: T8_SHOES_CLOTH_MORGANA@3                                         : Elder's Cultist Sandals
3371: T4_HEAD_CLOTH_AVALON                                             : Adept's Cowl of Purity
3372: T4_HEAD_CLOTH_AVALON@1                                           : Adept's Cowl of Purity
3373: T4_HEAD_CLOTH_AVALON@2                                           : Adept's Cowl of Purity
3374: T4_HEAD_CLOTH_AVALON@3                                           : Adept's Cowl of Purity
3375: T5_HEAD_CLOTH_AVALON                                             : Expert's Cowl of Purity
3376: T5_HEAD_CLOTH_AVALON@1                                           : Expert's Cowl of Purity
3377: T5_HEAD_CLOTH_AVALON@2                                           : Expert's Cowl of Purity
3378: T5_HEAD_CLOTH_AVALON@3                                           : Expert's Cowl of Purity
3379: T6_HEAD_CLOTH_AVALON                                             : Master's Cowl of Purity
3380: T6_HEAD_CLOTH_AVALON@1                                           : Master's Cowl of Purity
3381: T6_HEAD_CLOTH_AVALON@2                                           : Master's Cowl of Purity
3382: T6_HEAD_CLOTH_AVALON@3                                           : Master's Cowl of Purity
3383: T7_HEAD_CLOTH_AVALON                                             : Grandmaster's Cowl of Purity
3384: T7_HEAD_CLOTH_AVALON@1                                           : Grandmaster's Cowl of Purity
3385: T7_HEAD_CLOTH_AVALON@2                                           : Grandmaster's Cowl of Purity
3386: T7_HEAD_CLOTH_AVALON@3                                           : Grandmaster's Cowl of Purity
3387: T8_HEAD_CLOTH_AVALON                                             : Elder's Cowl of Purity
3388: T8_HEAD_CLOTH_AVALON@1                                           : Elder's Cowl of Purity
3389: T8_HEAD_CLOTH_AVALON@2                                           : Elder's Cowl of Purity
3390: T8_HEAD_CLOTH_AVALON@3                                           : Elder's Cowl of Purity
3391: T4_ARMOR_CLOTH_AVALON                                            : Adept's Robe of Purity
3392: T4_ARMOR_CLOTH_AVALON@1                                          : Adept's Robe of Purity
3393: T4_ARMOR_CLOTH_AVALON@2                                          : Adept's Robe of Purity
3394: T4_ARMOR_CLOTH_AVALON@3                                          : Adept's Robe of Purity
3395: T5_ARMOR_CLOTH_AVALON                                            : Expert's Robe of Purity
3396: T5_ARMOR_CLOTH_AVALON@1                                          : Expert's Robe of Purity
3397: T5_ARMOR_CLOTH_AVALON@2                                          : Expert's Robe of Purity
3398: T5_ARMOR_CLOTH_AVALON@3                                          : Expert's Robe of Purity
3399: T6_ARMOR_CLOTH_AVALON                                            : Master's Robe of Purity
3400: T6_ARMOR_CLOTH_AVALON@1                                          : Master's Robe of Purity
3401: T6_ARMOR_CLOTH_AVALON@2                                          : Master's Robe of Purity
3402: T6_ARMOR_CLOTH_AVALON@3                                          : Master's Robe of Purity
3403: T7_ARMOR_CLOTH_AVALON                                            : Grandmaster's Robe of Purity
3404: T7_ARMOR_CLOTH_AVALON@1                                          : Grandmaster's Robe of Purity
3405: T7_ARMOR_CLOTH_AVALON@2                                          : Grandmaster's Robe of Purity
3406: T7_ARMOR_CLOTH_AVALON@3                                          : Grandmaster's Robe of Purity
3407: T8_ARMOR_CLOTH_AVALON                                            : Elder's Robe of Purity
3408: T8_ARMOR_CLOTH_AVALON@1                                          : Elder's Robe of Purity
3409: T8_ARMOR_CLOTH_AVALON@2                                          : Elder's Robe of Purity
3410: T8_ARMOR_CLOTH_AVALON@3                                          : Elder's Robe of Purity
3411: T4_SHOES_CLOTH_AVALON                                            : Adept's Sandals of Purity
3412: T4_SHOES_CLOTH_AVALON@1                                          : Adept's Sandals of Purity
3413: T4_SHOES_CLOTH_AVALON@2                                          : Adept's Sandals of Purity
3414: T4_SHOES_CLOTH_AVALON@3                                          : Adept's Sandals of Purity
3415: T5_SHOES_CLOTH_AVALON                                            : Expert's Sandals of Purity
3416: T5_SHOES_CLOTH_AVALON@1                                          : Expert's Sandals of Purity
3417: T5_SHOES_CLOTH_AVALON@2                                          : Expert's Sandals of Purity
3418: T5_SHOES_CLOTH_AVALON@3                                          : Expert's Sandals of Purity
3419: T6_SHOES_CLOTH_AVALON                                            : Master's Sandals of Purity
3420: T6_SHOES_CLOTH_AVALON@1                                          : Master's Sandals of Purity
3421: T6_SHOES_CLOTH_AVALON@2                                          : Master's Sandals of Purity
3422: T6_SHOES_CLOTH_AVALON@3                                          : Master's Sandals of Purity
3423: T7_SHOES_CLOTH_AVALON                                            : Grandmaster's Sandals of Purity
3424: T7_SHOES_CLOTH_AVALON@1                                          : Grandmaster's Sandals of Purity
3425: T7_SHOES_CLOTH_AVALON@2                                          : Grandmaster's Sandals of Purity
3426: T7_SHOES_CLOTH_AVALON@3                                          : Grandmaster's Sandals of Purity
3427: T8_SHOES_CLOTH_AVALON                                            : Elder's Sandals of Purity
3428: T8_SHOES_CLOTH_AVALON@1                                          : Elder's Sandals of Purity
3429: T8_SHOES_CLOTH_AVALON@2                                          : Elder's Sandals of Purity
3430: T8_SHOES_CLOTH_AVALON@3                                          : Elder's Sandals of Purity
3431: T4_HEAD_CLOTH_ROYAL                                              : Adept's Royal Cowl
3432: T4_HEAD_CLOTH_ROYAL@1                                            : Adept's Royal Cowl
3433: T4_HEAD_CLOTH_ROYAL@2                                            : Adept's Royal Cowl
3434: T4_HEAD_CLOTH_ROYAL@3                                            : Adept's Royal Cowl
3435: T5_HEAD_CLOTH_ROYAL                                              : Expert's Royal Cowl
3436: T5_HEAD_CLOTH_ROYAL@1                                            : Expert's Royal Cowl
3437: T5_HEAD_CLOTH_ROYAL@2                                            : Expert's Royal Cowl
3438: T5_HEAD_CLOTH_ROYAL@3                                            : Expert's Royal Cowl
3439: T6_HEAD_CLOTH_ROYAL                                              : Master's Royal Cowl
3440: T6_HEAD_CLOTH_ROYAL@1                                            : Master's Royal Cowl
3441: T6_HEAD_CLOTH_ROYAL@2                                            : Master's Royal Cowl
3442: T6_HEAD_CLOTH_ROYAL@3                                            : Master's Royal Cowl
3443: T7_HEAD_CLOTH_ROYAL                                              : Grandmaster's Royal Cowl
3444: T7_HEAD_CLOTH_ROYAL@1                                            : Grandmaster's Royal Cowl
3445: T7_HEAD_CLOTH_ROYAL@2                                            : Grandmaster's Royal Cowl
3446: T7_HEAD_CLOTH_ROYAL@3                                            : Grandmaster's Royal Cowl
3447: T8_HEAD_CLOTH_ROYAL                                              : Elder's Royal Cowl
3448: T8_HEAD_CLOTH_ROYAL@1                                            : Elder's Royal Cowl
3449: T8_HEAD_CLOTH_ROYAL@2                                            : Elder's Royal Cowl
3450: T8_HEAD_CLOTH_ROYAL@3                                            : Elder's Royal Cowl
3451: T4_ARMOR_CLOTH_ROYAL                                             : Adept's Royal Robe
3452: T4_ARMOR_CLOTH_ROYAL@1                                           : Adept's Royal Robe
3453: T4_ARMOR_CLOTH_ROYAL@2                                           : Adept's Royal Robe
3454: T4_ARMOR_CLOTH_ROYAL@3                                           : Adept's Royal Robe
3455: T5_ARMOR_CLOTH_ROYAL                                             : Expert's Royal Robe
3456: T5_ARMOR_CLOTH_ROYAL@1                                           : Expert's Royal Robe
3457: T5_ARMOR_CLOTH_ROYAL@2                                           : Expert's Royal Robe
3458: T5_ARMOR_CLOTH_ROYAL@3                                           : Expert's Royal Robe
3459: T6_ARMOR_CLOTH_ROYAL                                             : Master's Royal Robe
3460: T6_ARMOR_CLOTH_ROYAL@1                                           : Master's Royal Robe
3461: T6_ARMOR_CLOTH_ROYAL@2                                           : Master's Royal Robe
3462: T6_ARMOR_CLOTH_ROYAL@3                                           : Master's Royal Robe
3463: T7_ARMOR_CLOTH_ROYAL                                             : Grandmaster's Royal Robe
3464: T7_ARMOR_CLOTH_ROYAL@1                                           : Grandmaster's Royal Robe
3465: T7_ARMOR_CLOTH_ROYAL@2                                           : Grandmaster's Royal Robe
3466: T7_ARMOR_CLOTH_ROYAL@3                                           : Grandmaster's Royal Robe
3467: T8_ARMOR_CLOTH_ROYAL                                             : Elder's Royal Robe
3468: T8_ARMOR_CLOTH_ROYAL@1                                           : Elder's Royal Robe
3469: T8_ARMOR_CLOTH_ROYAL@2                                           : Elder's Royal Robe
3470: T8_ARMOR_CLOTH_ROYAL@3                                           : Elder's Royal Robe
3471: T4_SHOES_CLOTH_ROYAL                                             : Adept's Royal Sandals
3472: T4_SHOES_CLOTH_ROYAL@1                                           : Adept's Royal Sandals
3473: T4_SHOES_CLOTH_ROYAL@2                                           : Adept's Royal Sandals
3474: T4_SHOES_CLOTH_ROYAL@3                                           : Adept's Royal Sandals
3475: T5_SHOES_CLOTH_ROYAL                                             : Expert's Royal Sandals
3476: T5_SHOES_CLOTH_ROYAL@1                                           : Expert's Royal Sandals
3477: T5_SHOES_CLOTH_ROYAL@2                                           : Expert's Royal Sandals
3478: T5_SHOES_CLOTH_ROYAL@3                                           : Expert's Royal Sandals
3479: T6_SHOES_CLOTH_ROYAL                                             : Master's Royal Sandals
3480: T6_SHOES_CLOTH_ROYAL@1                                           : Master's Royal Sandals
3481: T6_SHOES_CLOTH_ROYAL@2                                           : Master's Royal Sandals
3482: T6_SHOES_CLOTH_ROYAL@3                                           : Master's Royal Sandals
3483: T7_SHOES_CLOTH_ROYAL                                             : Grandmaster's Royal Sandals
3484: T7_SHOES_CLOTH_ROYAL@1                                           : Grandmaster's Royal Sandals
3485: T7_SHOES_CLOTH_ROYAL@2                                           : Grandmaster's Royal Sandals
3486: T7_SHOES_CLOTH_ROYAL@3                                           : Grandmaster's Royal Sandals
3487: T8_SHOES_CLOTH_ROYAL                                             : Elder's Royal Sandals
3488: T8_SHOES_CLOTH_ROYAL@1                                           : Elder's Royal Sandals
3489: T8_SHOES_CLOTH_ROYAL@2                                           : Elder's Royal Sandals
3490: T8_SHOES_CLOTH_ROYAL@3                                           : Elder's Royal Sandals
3491: T4_HEAD_LEATHER_ROYAL                                            : Adept's Royal Hood
3492: T4_HEAD_LEATHER_ROYAL@1                                          : Adept's Royal Hood
3493: T4_HEAD_LEATHER_ROYAL@2                                          : Adept's Royal Hood
3494: T4_HEAD_LEATHER_ROYAL@3                                          : Adept's Royal Hood
3495: T5_HEAD_LEATHER_ROYAL                                            : Expert's Royal Hood
3496: T5_HEAD_LEATHER_ROYAL@1                                          : Expert's Royal Hood
3497: T5_HEAD_LEATHER_ROYAL@2                                          : Expert's Royal Hood
3498: T5_HEAD_LEATHER_ROYAL@3                                          : Expert's Royal Hood
3499: T6_HEAD_LEATHER_ROYAL                                            : Master's Royal Hood
3500: T6_HEAD_LEATHER_ROYAL@1                                          : Master's Royal Hood
3501: T6_HEAD_LEATHER_ROYAL@2                                          : Master's Royal Hood
3502: T6_HEAD_LEATHER_ROYAL@3                                          : Master's Royal Hood
3503: T7_HEAD_LEATHER_ROYAL                                            : Grandmaster's Royal Hood
3504: T7_HEAD_LEATHER_ROYAL@1                                          : Grandmaster's Royal Hood
3505: T7_HEAD_LEATHER_ROYAL@2                                          : Grandmaster's Royal Hood
3506: T7_HEAD_LEATHER_ROYAL@3                                          : Grandmaster's Royal Hood
3507: T8_HEAD_LEATHER_ROYAL                                            : Elder's Royal Hood
3508: T8_HEAD_LEATHER_ROYAL@1                                          : Elder's Royal Hood
3509: T8_HEAD_LEATHER_ROYAL@2                                          : Elder's Royal Hood
3510: T8_HEAD_LEATHER_ROYAL@3                                          : Elder's Royal Hood
3511: T4_ARMOR_LEATHER_ROYAL                                           : Adept's Royal Jacket
3512: T4_ARMOR_LEATHER_ROYAL@1                                         : Adept's Royal Jacket
3513: T4_ARMOR_LEATHER_ROYAL@2                                         : Adept's Royal Jacket
3514: T4_ARMOR_LEATHER_ROYAL@3                                         : Adept's Royal Jacket
3515: T5_ARMOR_LEATHER_ROYAL                                           : Expert's Royal Jacket
3516: T5_ARMOR_LEATHER_ROYAL@1                                         : Expert's Royal Jacket
3517: T5_ARMOR_LEATHER_ROYAL@2                                         : Expert's Royal Jacket
3518: T5_ARMOR_LEATHER_ROYAL@3                                         : Expert's Royal Jacket
3519: T6_ARMOR_LEATHER_ROYAL                                           : Master's Royal Jacket
3520: T6_ARMOR_LEATHER_ROYAL@1                                         : Master's Royal Jacket
3521: T6_ARMOR_LEATHER_ROYAL@2                                         : Master's Royal Jacket
3522: T6_ARMOR_LEATHER_ROYAL@3                                         : Master's Royal Jacket
3523: T7_ARMOR_LEATHER_ROYAL                                           : Grandmaster's Royal Jacket
3524: T7_ARMOR_LEATHER_ROYAL@1                                         : Grandmaster's Royal Jacket
3525: T7_ARMOR_LEATHER_ROYAL@2                                         : Grandmaster's Royal Jacket
3526: T7_ARMOR_LEATHER_ROYAL@3                                         : Grandmaster's Royal Jacket
3527: T8_ARMOR_LEATHER_ROYAL                                           : Elder's Royal Jacket
3528: T8_ARMOR_LEATHER_ROYAL@1                                         : Elder's Royal Jacket
3529: T8_ARMOR_LEATHER_ROYAL@2                                         : Elder's Royal Jacket
3530: T8_ARMOR_LEATHER_ROYAL@3                                         : Elder's Royal Jacket
3531: T4_SHOES_LEATHER_ROYAL                                           : Adept's Royal Shoes
3532: T4_SHOES_LEATHER_ROYAL@1                                         : Adept's Royal Shoes
3533: T4_SHOES_LEATHER_ROYAL@2                                         : Adept's Royal Shoes
3534: T4_SHOES_LEATHER_ROYAL@3                                         : Adept's Royal Shoes
3535: T5_SHOES_LEATHER_ROYAL                                           : Expert's Royal Shoes
3536: T5_SHOES_LEATHER_ROYAL@1                                         : Expert's Royal Shoes
3537: T5_SHOES_LEATHER_ROYAL@2                                         : Expert's Royal Shoes
3538: T5_SHOES_LEATHER_ROYAL@3                                         : Expert's Royal Shoes
3539: T6_SHOES_LEATHER_ROYAL                                           : Master's Royal Shoes
3540: T6_SHOES_LEATHER_ROYAL@1                                         : Master's Royal Shoes
3541: T6_SHOES_LEATHER_ROYAL@2                                         : Master's Royal Shoes
3542: T6_SHOES_LEATHER_ROYAL@3                                         : Master's Royal Shoes
3543: T7_SHOES_LEATHER_ROYAL                                           : Grandmaster's Royal Shoes
3544: T7_SHOES_LEATHER_ROYAL@1                                         : Grandmaster's Royal Shoes
3545: T7_SHOES_LEATHER_ROYAL@2                                         : Grandmaster's Royal Shoes
3546: T7_SHOES_LEATHER_ROYAL@3                                         : Grandmaster's Royal Shoes
3547: T8_SHOES_LEATHER_ROYAL                                           : Elder's Royal Shoes
3548: T8_SHOES_LEATHER_ROYAL@1                                         : Elder's Royal Shoes
3549: T8_SHOES_LEATHER_ROYAL@2                                         : Elder's Royal Shoes
3550: T8_SHOES_LEATHER_ROYAL@3                                         : Elder's Royal Shoes
3551: T4_HEAD_PLATE_ROYAL                                              : Adept's Royal Helmet
3552: T4_HEAD_PLATE_ROYAL@1                                            : Adept's Royal Helmet
3553: T4_HEAD_PLATE_ROYAL@2                                            : Adept's Royal Helmet
3554: T4_HEAD_PLATE_ROYAL@3                                            : Adept's Royal Helmet
3555: T5_HEAD_PLATE_ROYAL                                              : Expert's Royal Helmet
3556: T5_HEAD_PLATE_ROYAL@1                                            : Expert's Royal Helmet
3557: T5_HEAD_PLATE_ROYAL@2                                            : Expert's Royal Helmet
3558: T5_HEAD_PLATE_ROYAL@3                                            : Expert's Royal Helmet
3559: T6_HEAD_PLATE_ROYAL                                              : Master's Royal Helmet
3560: T6_HEAD_PLATE_ROYAL@1                                            : Master's Royal Helmet
3561: T6_HEAD_PLATE_ROYAL@2                                            : Master's Royal Helmet
3562: T6_HEAD_PLATE_ROYAL@3                                            : Master's Royal Helmet
3563: T7_HEAD_PLATE_ROYAL                                              : Grandmaster's Royal Helmet
3564: T7_HEAD_PLATE_ROYAL@1                                            : Grandmaster's Royal Helmet
3565: T7_HEAD_PLATE_ROYAL@2                                            : Grandmaster's Royal Helmet
3566: T7_HEAD_PLATE_ROYAL@3                                            : Grandmaster's Royal Helmet
3567: T8_HEAD_PLATE_ROYAL                                              : Elder's Royal Helmet
3568: T8_HEAD_PLATE_ROYAL@1                                            : Elder's Royal Helmet
3569: T8_HEAD_PLATE_ROYAL@2                                            : Elder's Royal Helmet
3570: T8_HEAD_PLATE_ROYAL@3                                            : Elder's Royal Helmet
3571: T4_ARMOR_PLATE_ROYAL                                             : Adept's Royal Armor
3572: T4_ARMOR_PLATE_ROYAL@1                                           : Adept's Royal Armor
3573: T4_ARMOR_PLATE_ROYAL@2                                           : Adept's Royal Armor
3574: T4_ARMOR_PLATE_ROYAL@3                                           : Adept's Royal Armor
3575: T5_ARMOR_PLATE_ROYAL                                             : Expert's Royal Armor
3576: T5_ARMOR_PLATE_ROYAL@1                                           : Expert's Royal Armor
3577: T5_ARMOR_PLATE_ROYAL@2                                           : Expert's Royal Armor
3578: T5_ARMOR_PLATE_ROYAL@3                                           : Expert's Royal Armor
3579: T6_ARMOR_PLATE_ROYAL                                             : Master's Royal Armor
3580: T6_ARMOR_PLATE_ROYAL@1                                           : Master's Royal Armor
3581: T6_ARMOR_PLATE_ROYAL@2                                           : Master's Royal Armor
3582: T6_ARMOR_PLATE_ROYAL@3                                           : Master's Royal Armor
3583: T7_ARMOR_PLATE_ROYAL                                             : Grandmaster's Royal Armor
3584: T7_ARMOR_PLATE_ROYAL@1                                           : Grandmaster's Royal Armor
3585: T7_ARMOR_PLATE_ROYAL@2                                           : Grandmaster's Royal Armor
3586: T7_ARMOR_PLATE_ROYAL@3                                           : Grandmaster's Royal Armor
3587: T8_ARMOR_PLATE_ROYAL                                             : Elder's Royal Armor
3588: T8_ARMOR_PLATE_ROYAL@1                                           : Elder's Royal Armor
3589: T8_ARMOR_PLATE_ROYAL@2                                           : Elder's Royal Armor
3590: T8_ARMOR_PLATE_ROYAL@3                                           : Elder's Royal Armor
3591: T4_SHOES_PLATE_ROYAL                                             : Adept's Royal Boots
3592: T4_SHOES_PLATE_ROYAL@1                                           : Adept's Royal Boots
3593: T4_SHOES_PLATE_ROYAL@2                                           : Adept's Royal Boots
3594: T4_SHOES_PLATE_ROYAL@3                                           : Adept's Royal Boots
3595: T5_SHOES_PLATE_ROYAL                                             : Expert's Royal Boots
3596: T5_SHOES_PLATE_ROYAL@1                                           : Expert's Royal Boots
3597: T5_SHOES_PLATE_ROYAL@2                                           : Expert's Royal Boots
3598: T5_SHOES_PLATE_ROYAL@3                                           : Expert's Royal Boots
3599: T6_SHOES_PLATE_ROYAL                                             : Master's Royal Boots
3600: T6_SHOES_PLATE_ROYAL@1                                           : Master's Royal Boots
3601: T6_SHOES_PLATE_ROYAL@2                                           : Master's Royal Boots
3602: T6_SHOES_PLATE_ROYAL@3                                           : Master's Royal Boots
3603: T7_SHOES_PLATE_ROYAL                                             : Grandmaster's Royal Boots
3604: T7_SHOES_PLATE_ROYAL@1                                           : Grandmaster's Royal Boots
3605: T7_SHOES_PLATE_ROYAL@2                                           : Grandmaster's Royal Boots
3606: T7_SHOES_PLATE_ROYAL@3                                           : Grandmaster's Royal Boots
3607: T8_SHOES_PLATE_ROYAL                                             : Elder's Royal Boots
3608: T8_SHOES_PLATE_ROYAL@1                                           : Elder's Royal Boots
3609: T8_SHOES_PLATE_ROYAL@2                                           : Elder's Royal Boots
3610: T8_SHOES_PLATE_ROYAL@3                                           : Elder's Royal Boots
3611: T4_HEAD_GATHERER_FIBER                                           : Adept's Harvester Cap
3612: T4_HEAD_GATHERER_FIBER@1                                         : Adept's Harvester Cap
3613: T4_HEAD_GATHERER_FIBER@2                                         : Adept's Harvester Cap
3614: T4_HEAD_GATHERER_FIBER@3                                         : Adept's Harvester Cap
3615: T5_HEAD_GATHERER_FIBER                                           : Expert's Harvester Cap
3616: T5_HEAD_GATHERER_FIBER@1                                         : Expert's Harvester Cap
3617: T5_HEAD_GATHERER_FIBER@2                                         : Expert's Harvester Cap
3618: T5_HEAD_GATHERER_FIBER@3                                         : Expert's Harvester Cap
3619: T6_HEAD_GATHERER_FIBER                                           : Master's Harvester Cap
3620: T6_HEAD_GATHERER_FIBER@1                                         : Master's Harvester Cap
3621: T6_HEAD_GATHERER_FIBER@2                                         : Master's Harvester Cap
3622: T6_HEAD_GATHERER_FIBER@3                                         : Master's Harvester Cap
3623: T7_HEAD_GATHERER_FIBER                                           : Grandmaster's Harvester Cap
3624: T7_HEAD_GATHERER_FIBER@1                                         : Grandmaster's Harvester Cap
3625: T7_HEAD_GATHERER_FIBER@2                                         : Grandmaster's Harvester Cap
3626: T7_HEAD_GATHERER_FIBER@3                                         : Grandmaster's Harvester Cap
3627: T8_HEAD_GATHERER_FIBER                                           : Elder's Harvester Cap
3628: T8_HEAD_GATHERER_FIBER@1                                         : Elder's Harvester Cap
3629: T8_HEAD_GATHERER_FIBER@2                                         : Elder's Harvester Cap
3630: T8_HEAD_GATHERER_FIBER@3                                         : Elder's Harvester Cap
3631: T4_ARMOR_GATHERER_FIBER                                          : Adept's Harvester Garb
3632: T4_ARMOR_GATHERER_FIBER@1                                        : Adept's Harvester Garb
3633: T4_ARMOR_GATHERER_FIBER@2                                        : Adept's Harvester Garb
3634: T4_ARMOR_GATHERER_FIBER@3                                        : Adept's Harvester Garb
3635: T5_ARMOR_GATHERER_FIBER                                          : Expert's Harvester Garb
3636: T5_ARMOR_GATHERER_FIBER@1                                        : Expert's Harvester Garb
3637: T5_ARMOR_GATHERER_FIBER@2                                        : Expert's Harvester Garb
3638: T5_ARMOR_GATHERER_FIBER@3                                        : Expert's Harvester Garb
3639: T6_ARMOR_GATHERER_FIBER                                          : Master's Harvester Garb
3640: T6_ARMOR_GATHERER_FIBER@1                                        : Master's Harvester Garb
3641: T6_ARMOR_GATHERER_FIBER@2                                        : Master's Harvester Garb
3642: T6_ARMOR_GATHERER_FIBER@3                                        : Master's Harvester Garb
3643: T7_ARMOR_GATHERER_FIBER                                          : Grandmaster's Harvester Garb
3644: T7_ARMOR_GATHERER_FIBER@1                                        : Grandmaster's Harvester Garb
3645: T7_ARMOR_GATHERER_FIBER@2                                        : Grandmaster's Harvester Garb
3646: T7_ARMOR_GATHERER_FIBER@3                                        : Grandmaster's Harvester Garb
3647: T8_ARMOR_GATHERER_FIBER                                          : Elder's Harvester Garb
3648: T8_ARMOR_GATHERER_FIBER@1                                        : Elder's Harvester Garb
3649: T8_ARMOR_GATHERER_FIBER@2                                        : Elder's Harvester Garb
3650: T8_ARMOR_GATHERER_FIBER@3                                        : Elder's Harvester Garb
3651: T4_SHOES_GATHERER_FIBER                                          : Adept's Harvester Workboots
3652: T4_SHOES_GATHERER_FIBER@1                                        : Adept's Harvester Workboots
3653: T4_SHOES_GATHERER_FIBER@2                                        : Adept's Harvester Workboots
3654: T4_SHOES_GATHERER_FIBER@3                                        : Adept's Harvester Workboots
3655: T5_SHOES_GATHERER_FIBER                                          : Expert's Harvester Workboots
3656: T5_SHOES_GATHERER_FIBER@1                                        : Expert's Harvester Workboots
3657: T5_SHOES_GATHERER_FIBER@2                                        : Expert's Harvester Workboots
3658: T5_SHOES_GATHERER_FIBER@3                                        : Expert's Harvester Workboots
3659: T6_SHOES_GATHERER_FIBER                                          : Master's Harvester Workboots
3660: T6_SHOES_GATHERER_FIBER@1                                        : Master's Harvester Workboots
3661: T6_SHOES_GATHERER_FIBER@2                                        : Master's Harvester Workboots
3662: T6_SHOES_GATHERER_FIBER@3                                        : Master's Harvester Workboots
3663: T7_SHOES_GATHERER_FIBER                                          : Grandmaster's Harvester Workboots
3664: T7_SHOES_GATHERER_FIBER@1                                        : Grandmaster's Harvester Workboots
3665: T7_SHOES_GATHERER_FIBER@2                                        : Grandmaster's Harvester Workboots
3666: T7_SHOES_GATHERER_FIBER@3                                        : Grandmaster's Harvester Workboots
3667: T8_SHOES_GATHERER_FIBER                                          : Elder's Harvester Workboots
3668: T8_SHOES_GATHERER_FIBER@1                                        : Elder's Harvester Workboots
3669: T8_SHOES_GATHERER_FIBER@2                                        : Elder's Harvester Workboots
3670: T8_SHOES_GATHERER_FIBER@3                                        : Elder's Harvester Workboots
3671: T4_BACKPACK_GATHERER_FIBER                                       : Adept's Harvester Backpack
3672: T4_BACKPACK_GATHERER_FIBER@1                                     : Adept's Harvester Backpack
3673: T4_BACKPACK_GATHERER_FIBER@2                                     : Adept's Harvester Backpack
3674: T4_BACKPACK_GATHERER_FIBER@3                                     : Adept's Harvester Backpack
3675: T5_BACKPACK_GATHERER_FIBER                                       : Expert's Harvester Backpack
3676: T5_BACKPACK_GATHERER_FIBER@1                                     : Expert's Harvester Backpack
3677: T5_BACKPACK_GATHERER_FIBER@2                                     : Expert's Harvester Backpack
3678: T5_BACKPACK_GATHERER_FIBER@3                                     : Expert's Harvester Backpack
3679: T6_BACKPACK_GATHERER_FIBER                                       : Master's Harvester Backpack
3680: T6_BACKPACK_GATHERER_FIBER@1                                     : Master's Harvester Backpack
3681: T6_BACKPACK_GATHERER_FIBER@2                                     : Master's Harvester Backpack
3682: T6_BACKPACK_GATHERER_FIBER@3                                     : Master's Harvester Backpack
3683: T7_BACKPACK_GATHERER_FIBER                                       : Grandmaster's Harvester Backpack
3684: T7_BACKPACK_GATHERER_FIBER@1                                     : Grandmaster's Harvester Backpack
3685: T7_BACKPACK_GATHERER_FIBER@2                                     : Grandmaster's Harvester Backpack
3686: T7_BACKPACK_GATHERER_FIBER@3                                     : Grandmaster's Harvester Backpack
3687: T8_BACKPACK_GATHERER_FIBER                                       : Elder's Harvester Backpack
3688: T8_BACKPACK_GATHERER_FIBER@1                                     : Elder's Harvester Backpack
3689: T8_BACKPACK_GATHERER_FIBER@2                                     : Elder's Harvester Backpack
3690: T8_BACKPACK_GATHERER_FIBER@3                                     : Elder's Harvester Backpack
3691: T4_HEAD_GATHERER_HIDE                                            : Adept's Skinner Cap
3692: T4_HEAD_GATHERER_HIDE@1                                          : Adept's Skinner Cap
3693: T4_HEAD_GATHERER_HIDE@2                                          : Adept's Skinner Cap
3694: T4_HEAD_GATHERER_HIDE@3                                          : Adept's Skinner Cap
3695: T5_HEAD_GATHERER_HIDE                                            : Expert's Skinner Cap
3696: T5_HEAD_GATHERER_HIDE@1                                          : Expert's Skinner Cap
3697: T5_HEAD_GATHERER_HIDE@2                                          : Expert's Skinner Cap
3698: T5_HEAD_GATHERER_HIDE@3                                          : Expert's Skinner Cap
3699: T6_HEAD_GATHERER_HIDE                                            : Master's Skinner Cap
3700: T6_HEAD_GATHERER_HIDE@1                                          : Master's Skinner Cap
3701: T6_HEAD_GATHERER_HIDE@2                                          : Master's Skinner Cap
3702: T6_HEAD_GATHERER_HIDE@3                                          : Master's Skinner Cap
3703: T7_HEAD_GATHERER_HIDE                                            : Grandmaster's Skinner Cap
3704: T7_HEAD_GATHERER_HIDE@1                                          : Grandmaster's Skinner Cap
3705: T7_HEAD_GATHERER_HIDE@2                                          : Grandmaster's Skinner Cap
3706: T7_HEAD_GATHERER_HIDE@3                                          : Grandmaster's Skinner Cap
3707: T8_HEAD_GATHERER_HIDE                                            : Elder's Skinner Cap
3708: T8_HEAD_GATHERER_HIDE@1                                          : Elder's Skinner Cap
3709: T8_HEAD_GATHERER_HIDE@2                                          : Elder's Skinner Cap
3710: T8_HEAD_GATHERER_HIDE@3                                          : Elder's Skinner Cap
3711: T4_ARMOR_GATHERER_HIDE                                           : Adept's Skinner Garb
3712: T4_ARMOR_GATHERER_HIDE@1                                         : Adept's Skinner Garb
3713: T4_ARMOR_GATHERER_HIDE@2                                         : Adept's Skinner Garb
3714: T4_ARMOR_GATHERER_HIDE@3                                         : Adept's Skinner Garb
3715: T5_ARMOR_GATHERER_HIDE                                           : Expert's Skinner Garb
3716: T5_ARMOR_GATHERER_HIDE@1                                         : Expert's Skinner Garb
3717: T5_ARMOR_GATHERER_HIDE@2                                         : Expert's Skinner Garb
3718: T5_ARMOR_GATHERER_HIDE@3                                         : Expert's Skinner Garb
3719: T6_ARMOR_GATHERER_HIDE                                           : Master's Skinner Garb
3720: T6_ARMOR_GATHERER_HIDE@1                                         : Master's Skinner Garb
3721: T6_ARMOR_GATHERER_HIDE@2                                         : Master's Skinner Garb
3722: T6_ARMOR_GATHERER_HIDE@3                                         : Master's Skinner Garb
3723: T7_ARMOR_GATHERER_HIDE                                           : Grandmaster's Skinner Garb
3724: T7_ARMOR_GATHERER_HIDE@1                                         : Grandmaster's Skinner Garb
3725: T7_ARMOR_GATHERER_HIDE@2                                         : Grandmaster's Skinner Garb
3726: T7_ARMOR_GATHERER_HIDE@3                                         : Grandmaster's Skinner Garb
3727: T8_ARMOR_GATHERER_HIDE                                           : Elder's Skinner Garb
3728: T8_ARMOR_GATHERER_HIDE@1                                         : Elder's Skinner Garb
3729: T8_ARMOR_GATHERER_HIDE@2                                         : Elder's Skinner Garb
3730: T8_ARMOR_GATHERER_HIDE@3                                         : Elder's Skinner Garb
3731: T4_SHOES_GATHERER_HIDE                                           : Adept's Skinner Workboots
3732: T4_SHOES_GATHERER_HIDE@1                                         : Adept's Skinner Workboots
3733: T4_SHOES_GATHERER_HIDE@2                                         : Adept's Skinner Workboots
3734: T4_SHOES_GATHERER_HIDE@3                                         : Adept's Skinner Workboots
3735: T5_SHOES_GATHERER_HIDE                                           : Expert's Skinner Workboots
3736: T5_SHOES_GATHERER_HIDE@1                                         : Expert's Skinner Workboots
3737: T5_SHOES_GATHERER_HIDE@2                                         : Expert's Skinner Workboots
3738: T5_SHOES_GATHERER_HIDE@3                                         : Expert's Skinner Workboots
3739: T6_SHOES_GATHERER_HIDE                                           : Master's Skinner Workboots
3740: T6_SHOES_GATHERER_HIDE@1                                         : Master's Skinner Workboots
3741: T6_SHOES_GATHERER_HIDE@2                                         : Master's Skinner Workboots
3742: T6_SHOES_GATHERER_HIDE@3                                         : Master's Skinner Workboots
3743: T7_SHOES_GATHERER_HIDE                                           : Grandmaster's Skinner Workboots
3744: T7_SHOES_GATHERER_HIDE@1                                         : Grandmaster's Skinner Workboots
3745: T7_SHOES_GATHERER_HIDE@2                                         : Grandmaster's Skinner Workboots
3746: T7_SHOES_GATHERER_HIDE@3                                         : Grandmaster's Skinner Workboots
3747: T8_SHOES_GATHERER_HIDE                                           : Elder's Skinner Workboots
3748: T8_SHOES_GATHERER_HIDE@1                                         : Elder's Skinner Workboots
3749: T8_SHOES_GATHERER_HIDE@2                                         : Elder's Skinner Workboots
3750: T8_SHOES_GATHERER_HIDE@3                                         : Elder's Skinner Workboots
3751: T4_BACKPACK_GATHERER_HIDE                                        : Adept's Skinner Backpack
3752: T4_BACKPACK_GATHERER_HIDE@1                                      : Adept's Skinner Backpack
3753: T4_BACKPACK_GATHERER_HIDE@2                                      : Adept's Skinner Backpack
3754: T4_BACKPACK_GATHERER_HIDE@3                                      : Adept's Skinner Backpack
3755: T5_BACKPACK_GATHERER_HIDE                                        : Expert's Skinner Backpack
3756: T5_BACKPACK_GATHERER_HIDE@1                                      : Expert's Skinner Backpack
3757: T5_BACKPACK_GATHERER_HIDE@2                                      : Expert's Skinner Backpack
3758: T5_BACKPACK_GATHERER_HIDE@3                                      : Expert's Skinner Backpack
3759: T6_BACKPACK_GATHERER_HIDE                                        : Master's Skinner Backpack
3760: T6_BACKPACK_GATHERER_HIDE@1                                      : Master's Skinner Backpack
3761: T6_BACKPACK_GATHERER_HIDE@2                                      : Master's Skinner Backpack
3762: T6_BACKPACK_GATHERER_HIDE@3                                      : Master's Skinner Backpack
3763: T7_BACKPACK_GATHERER_HIDE                                        : Grandmaster's Skinner Backpack
3764: T7_BACKPACK_GATHERER_HIDE@1                                      : Grandmaster's Skinner Backpack
3765: T7_BACKPACK_GATHERER_HIDE@2                                      : Grandmaster's Skinner Backpack
3766: T7_BACKPACK_GATHERER_HIDE@3                                      : Grandmaster's Skinner Backpack
3767: T8_BACKPACK_GATHERER_HIDE                                        : Elder's Skinner Backpack
3768: T8_BACKPACK_GATHERER_HIDE@1                                      : Elder's Skinner Backpack
3769: T8_BACKPACK_GATHERER_HIDE@2                                      : Elder's Skinner Backpack
3770: T8_BACKPACK_GATHERER_HIDE@3                                      : Elder's Skinner Backpack
3771: T4_HEAD_GATHERER_ORE                                             : Adept's Miner Cap
3772: T4_HEAD_GATHERER_ORE@1                                           : Adept's Miner Cap
3773: T4_HEAD_GATHERER_ORE@2                                           : Adept's Miner Cap
3774: T4_HEAD_GATHERER_ORE@3                                           : Adept's Miner Cap
3775: T5_HEAD_GATHERER_ORE                                             : Expert's Miner Cap
3776: T5_HEAD_GATHERER_ORE@1                                           : Expert's Miner Cap
3777: T5_HEAD_GATHERER_ORE@2                                           : Expert's Miner Cap
3778: T5_HEAD_GATHERER_ORE@3                                           : Expert's Miner Cap
3779: T6_HEAD_GATHERER_ORE                                             : Master's Miner Cap
3780: T6_HEAD_GATHERER_ORE@1                                           : Master's Miner Cap
3781: T6_HEAD_GATHERER_ORE@2                                           : Master's Miner Cap
3782: T6_HEAD_GATHERER_ORE@3                                           : Master's Miner Cap
3783: T7_HEAD_GATHERER_ORE                                             : Grandmaster's Miner Cap
3784: T7_HEAD_GATHERER_ORE@1                                           : Grandmaster's Miner Cap
3785: T7_HEAD_GATHERER_ORE@2                                           : Grandmaster's Miner Cap
3786: T7_HEAD_GATHERER_ORE@3                                           : Grandmaster's Miner Cap
3787: T8_HEAD_GATHERER_ORE                                             : Elder's Miner Cap
3788: T8_HEAD_GATHERER_ORE@1                                           : Elder's Miner Cap
3789: T8_HEAD_GATHERER_ORE@2                                           : Elder's Miner Cap
3790: T8_HEAD_GATHERER_ORE@3                                           : Elder's Miner Cap
3791: T4_ARMOR_GATHERER_ORE                                            : Adept's Miner Garb
3792: T4_ARMOR_GATHERER_ORE@1                                          : Adept's Miner Garb
3793: T4_ARMOR_GATHERER_ORE@2                                          : Adept's Miner Garb
3794: T4_ARMOR_GATHERER_ORE@3                                          : Adept's Miner Garb
3795: T5_ARMOR_GATHERER_ORE                                            : Expert's Miner Garb
3796: T5_ARMOR_GATHERER_ORE@1                                          : Expert's Miner Garb
3797: T5_ARMOR_GATHERER_ORE@2                                          : Expert's Miner Garb
3798: T5_ARMOR_GATHERER_ORE@3                                          : Expert's Miner Garb
3799: T6_ARMOR_GATHERER_ORE                                            : Master's Miner Garb
3800: T6_ARMOR_GATHERER_ORE@1                                          : Master's Miner Garb
3801: T6_ARMOR_GATHERER_ORE@2                                          : Master's Miner Garb
3802: T6_ARMOR_GATHERER_ORE@3                                          : Master's Miner Garb
3803: T7_ARMOR_GATHERER_ORE                                            : Grandmaster's Miner Garb
3804: T7_ARMOR_GATHERER_ORE@1                                          : Grandmaster's Miner Garb
3805: T7_ARMOR_GATHERER_ORE@2                                          : Grandmaster's Miner Garb
3806: T7_ARMOR_GATHERER_ORE@3                                          : Grandmaster's Miner Garb
3807: T8_ARMOR_GATHERER_ORE                                            : Elder's Miner Garb
3808: T8_ARMOR_GATHERER_ORE@1                                          : Elder's Miner Garb
3809: T8_ARMOR_GATHERER_ORE@2                                          : Elder's Miner Garb
3810: T8_ARMOR_GATHERER_ORE@3                                          : Elder's Miner Garb
3811: T4_SHOES_GATHERER_ORE                                            : Adept's Miner Workboots
3812: T4_SHOES_GATHERER_ORE@1                                          : Adept's Miner Workboots
3813: T4_SHOES_GATHERER_ORE@2                                          : Adept's Miner Workboots
3814: T4_SHOES_GATHERER_ORE@3                                          : Adept's Miner Workboots
3815: T5_SHOES_GATHERER_ORE                                            : Expert's Miner Workboots
3816: T5_SHOES_GATHERER_ORE@1                                          : Expert's Miner Workboots
3817: T5_SHOES_GATHERER_ORE@2                                          : Expert's Miner Workboots
3818: T5_SHOES_GATHERER_ORE@3                                          : Expert's Miner Workboots
3819: T6_SHOES_GATHERER_ORE                                            : Master's Miner Workboots
3820: T6_SHOES_GATHERER_ORE@1                                          : Master's Miner Workboots
3821: T6_SHOES_GATHERER_ORE@2                                          : Master's Miner Workboots
3822: T6_SHOES_GATHERER_ORE@3                                          : Master's Miner Workboots
3823: T7_SHOES_GATHERER_ORE                                            : Grandmaster's Miner Workboots
3824: T7_SHOES_GATHERER_ORE@1                                          : Grandmaster's Miner Workboots
3825: T7_SHOES_GATHERER_ORE@2                                          : Grandmaster's Miner Workboots
3826: T7_SHOES_GATHERER_ORE@3                                          : Grandmaster's Miner Workboots
3827: T8_SHOES_GATHERER_ORE                                            : Elder's Miner Workboots
3828: T8_SHOES_GATHERER_ORE@1                                          : Elder's Miner Workboots
3829: T8_SHOES_GATHERER_ORE@2                                          : Elder's Miner Workboots
3830: T8_SHOES_GATHERER_ORE@3                                          : Elder's Miner Workboots
3831: T4_BACKPACK_GATHERER_ORE                                         : Adept's Miner Backpack
3832: T4_BACKPACK_GATHERER_ORE@1                                       : Adept's Miner Backpack
3833: T4_BACKPACK_GATHERER_ORE@2                                       : Adept's Miner Backpack
3834: T4_BACKPACK_GATHERER_ORE@3                                       : Adept's Miner Backpack
3835: T5_BACKPACK_GATHERER_ORE                                         : Expert's Miner Backpack
3836: T5_BACKPACK_GATHERER_ORE@1                                       : Expert's Miner Backpack
3837: T5_BACKPACK_GATHERER_ORE@2                                       : Expert's Miner Backpack
3838: T5_BACKPACK_GATHERER_ORE@3                                       : Expert's Miner Backpack
3839: T6_BACKPACK_GATHERER_ORE                                         : Master's Miner Backpack
3840: T6_BACKPACK_GATHERER_ORE@1                                       : Master's Miner Backpack
3841: T6_BACKPACK_GATHERER_ORE@2                                       : Master's Miner Backpack
3842: T6_BACKPACK_GATHERER_ORE@3                                       : Master's Miner Backpack
3843: T7_BACKPACK_GATHERER_ORE                                         : Grandmaster's Miner Backpack
3844: T7_BACKPACK_GATHERER_ORE@1                                       : Grandmaster's Miner Backpack
3845: T7_BACKPACK_GATHERER_ORE@2                                       : Grandmaster's Miner Backpack
3846: T7_BACKPACK_GATHERER_ORE@3                                       : Grandmaster's Miner Backpack
3847: T8_BACKPACK_GATHERER_ORE                                         : Elder's Miner Backpack
3848: T8_BACKPACK_GATHERER_ORE@1                                       : Elder's Miner Backpack
3849: T8_BACKPACK_GATHERER_ORE@2                                       : Elder's Miner Backpack
3850: T8_BACKPACK_GATHERER_ORE@3                                       : Elder's Miner Backpack
3851: T4_HEAD_GATHERER_ROCK                                            : Adept's Quarrier Cap
3852: T4_HEAD_GATHERER_ROCK@1                                          : Adept's Quarrier Cap
3853: T4_HEAD_GATHERER_ROCK@2                                          : Adept's Quarrier Cap
3854: T4_HEAD_GATHERER_ROCK@3                                          : Adept's Quarrier Cap
3855: T5_HEAD_GATHERER_ROCK                                            : Expert's Quarrier Cap
3856: T5_HEAD_GATHERER_ROCK@1                                          : Expert's Quarrier Cap
3857: T5_HEAD_GATHERER_ROCK@2                                          : Expert's Quarrier Cap
3858: T5_HEAD_GATHERER_ROCK@3                                          : Expert's Quarrier Cap
3859: T6_HEAD_GATHERER_ROCK                                            : Master's Quarrier Cap
3860: T6_HEAD_GATHERER_ROCK@1                                          : Master's Quarrier Cap
3861: T6_HEAD_GATHERER_ROCK@2                                          : Master's Quarrier Cap
3862: T6_HEAD_GATHERER_ROCK@3                                          : Master's Quarrier Cap
3863: T7_HEAD_GATHERER_ROCK                                            : Grandmaster's Quarrier Cap
3864: T7_HEAD_GATHERER_ROCK@1                                          : Grandmaster's Quarrier Cap
3865: T7_HEAD_GATHERER_ROCK@2                                          : Grandmaster's Quarrier Cap
3866: T7_HEAD_GATHERER_ROCK@3                                          : Grandmaster's Quarrier Cap
3867: T8_HEAD_GATHERER_ROCK                                            : Elder's Quarrier Cap
3868: T8_HEAD_GATHERER_ROCK@1                                          : Elder's Quarrier Cap
3869: T8_HEAD_GATHERER_ROCK@2                                          : Elder's Quarrier Cap
3870: T8_HEAD_GATHERER_ROCK@3                                          : Elder's Quarrier Cap
3871: T4_ARMOR_GATHERER_ROCK                                           : Adept's Quarrier Garb
3872: T4_ARMOR_GATHERER_ROCK@1                                         : Adept's Quarrier Garb
3873: T4_ARMOR_GATHERER_ROCK@2                                         : Adept's Quarrier Garb
3874: T4_ARMOR_GATHERER_ROCK@3                                         : Adept's Quarrier Garb
3875: T5_ARMOR_GATHERER_ROCK                                           : Expert's Quarrier Garb
3876: T5_ARMOR_GATHERER_ROCK@1                                         : Expert's Quarrier Garb
3877: T5_ARMOR_GATHERER_ROCK@2                                         : Expert's Quarrier Garb
3878: T5_ARMOR_GATHERER_ROCK@3                                         : Expert's Quarrier Garb
3879: T6_ARMOR_GATHERER_ROCK                                           : Master's Quarrier Garb
3880: T6_ARMOR_GATHERER_ROCK@1                                         : Master's Quarrier Garb
3881: T6_ARMOR_GATHERER_ROCK@2                                         : Master's Quarrier Garb
3882: T6_ARMOR_GATHERER_ROCK@3                                         : Master's Quarrier Garb
3883: T7_ARMOR_GATHERER_ROCK                                           : Grandmaster's Quarrier Garb
3884: T7_ARMOR_GATHERER_ROCK@1                                         : Grandmaster's Quarrier Garb
3885: T7_ARMOR_GATHERER_ROCK@2                                         : Grandmaster's Quarrier Garb
3886: T7_ARMOR_GATHERER_ROCK@3                                         : Grandmaster's Quarrier Garb
3887: T8_ARMOR_GATHERER_ROCK                                           : Elder's Quarrier Garb
3888: T8_ARMOR_GATHERER_ROCK@1                                         : Elder's Quarrier Garb
3889: T8_ARMOR_GATHERER_ROCK@2                                         : Elder's Quarrier Garb
3890: T8_ARMOR_GATHERER_ROCK@3                                         : Elder's Quarrier Garb
3891: T4_SHOES_GATHERER_ROCK                                           : Adept's Quarrier Workboots
3892: T4_SHOES_GATHERER_ROCK@1                                         : Adept's Quarrier Workboots
3893: T4_SHOES_GATHERER_ROCK@2                                         : Adept's Quarrier Workboots
3894: T4_SHOES_GATHERER_ROCK@3                                         : Adept's Quarrier Workboots
3895: T5_SHOES_GATHERER_ROCK                                           : Expert's Quarrier Workboots
3896: T5_SHOES_GATHERER_ROCK@1                                         : Expert's Quarrier Workboots
3897: T5_SHOES_GATHERER_ROCK@2                                         : Expert's Quarrier Workboots
3898: T5_SHOES_GATHERER_ROCK@3                                         : Expert's Quarrier Workboots
3899: T6_SHOES_GATHERER_ROCK                                           : Master's Quarrier Workboots
3900: T6_SHOES_GATHERER_ROCK@1                                         : Master's Quarrier Workboots
3901: T6_SHOES_GATHERER_ROCK@2                                         : Master's Quarrier Workboots
3902: T6_SHOES_GATHERER_ROCK@3                                         : Master's Quarrier Workboots
3903: T7_SHOES_GATHERER_ROCK                                           : Grandmaster's Quarrier Workboots
3904: T7_SHOES_GATHERER_ROCK@1                                         : Grandmaster's Quarrier Workboots
3905: T7_SHOES_GATHERER_ROCK@2                                         : Grandmaster's Quarrier Workboots
3906: T7_SHOES_GATHERER_ROCK@3                                         : Grandmaster's Quarrier Workboots
3907: T8_SHOES_GATHERER_ROCK                                           : Elder's Quarrier Workboots
3908: T8_SHOES_GATHERER_ROCK@1                                         : Elder's Quarrier Workboots
3909: T8_SHOES_GATHERER_ROCK@2                                         : Elder's Quarrier Workboots
3910: T8_SHOES_GATHERER_ROCK@3                                         : Elder's Quarrier Workboots
3911: T4_BACKPACK_GATHERER_ROCK                                        : Adept's Quarrier Backpack
3912: T4_BACKPACK_GATHERER_ROCK@1                                      : Adept's Quarrier Backpack
3913: T4_BACKPACK_GATHERER_ROCK@2                                      : Adept's Quarrier Backpack
3914: T4_BACKPACK_GATHERER_ROCK@3                                      : Adept's Quarrier Backpack
3915: T5_BACKPACK_GATHERER_ROCK                                        : Expert's Quarrier Backpack
3916: T5_BACKPACK_GATHERER_ROCK@1                                      : Expert's Quarrier Backpack
3917: T5_BACKPACK_GATHERER_ROCK@2                                      : Expert's Quarrier Backpack
3918: T5_BACKPACK_GATHERER_ROCK@3                                      : Expert's Quarrier Backpack
3919: T6_BACKPACK_GATHERER_ROCK                                        : Master's Quarrier Backpack
3920: T6_BACKPACK_GATHERER_ROCK@1                                      : Master's Quarrier Backpack
3921: T6_BACKPACK_GATHERER_ROCK@2                                      : Master's Quarrier Backpack
3922: T6_BACKPACK_GATHERER_ROCK@3                                      : Master's Quarrier Backpack
3923: T7_BACKPACK_GATHERER_ROCK                                        : Grandmaster's Quarrier Backpack
3924: T7_BACKPACK_GATHERER_ROCK@1                                      : Grandmaster's Quarrier Backpack
3925: T7_BACKPACK_GATHERER_ROCK@2                                      : Grandmaster's Quarrier Backpack
3926: T7_BACKPACK_GATHERER_ROCK@3                                      : Grandmaster's Quarrier Backpack
3927: T8_BACKPACK_GATHERER_ROCK                                        : Elder's Quarrier Backpack
3928: T8_BACKPACK_GATHERER_ROCK@1                                      : Elder's Quarrier Backpack
3929: T8_BACKPACK_GATHERER_ROCK@2                                      : Elder's Quarrier Backpack
3930: T8_BACKPACK_GATHERER_ROCK@3                                      : Elder's Quarrier Backpack
3931: T4_HEAD_GATHERER_WOOD                                            : Adept's Lumberjack Cap
3932: T4_HEAD_GATHERER_WOOD@1                                          : Adept's Lumberjack Cap
3933: T4_HEAD_GATHERER_WOOD@2                                          : Adept's Lumberjack Cap
3934: T4_HEAD_GATHERER_WOOD@3                                          : Adept's Lumberjack Cap
3935: T5_HEAD_GATHERER_WOOD                                            : Expert's Lumberjack Cap
3936: T5_HEAD_GATHERER_WOOD@1                                          : Expert's Lumberjack Cap
3937: T5_HEAD_GATHERER_WOOD@2                                          : Expert's Lumberjack Cap
3938: T5_HEAD_GATHERER_WOOD@3                                          : Expert's Lumberjack Cap
3939: T6_HEAD_GATHERER_WOOD                                            : Master's Lumberjack Cap
3940: T6_HEAD_GATHERER_WOOD@1                                          : Master's Lumberjack Cap
3941: T6_HEAD_GATHERER_WOOD@2                                          : Master's Lumberjack Cap
3942: T6_HEAD_GATHERER_WOOD@3                                          : Master's Lumberjack Cap
3943: T7_HEAD_GATHERER_WOOD                                            : Grandmaster's Lumberjack Cap
3944: T7_HEAD_GATHERER_WOOD@1                                          : Grandmaster's Lumberjack Cap
3945: T7_HEAD_GATHERER_WOOD@2                                          : Grandmaster's Lumberjack Cap
3946: T7_HEAD_GATHERER_WOOD@3                                          : Grandmaster's Lumberjack Cap
3947: T8_HEAD_GATHERER_WOOD                                            : Elder's Lumberjack Cap
3948: T8_HEAD_GATHERER_WOOD@1                                          : Elder's Lumberjack Cap
3949: T8_HEAD_GATHERER_WOOD@2                                          : Elder's Lumberjack Cap
3950: T8_HEAD_GATHERER_WOOD@3                                          : Elder's Lumberjack Cap
3951: T4_ARMOR_GATHERER_WOOD                                           : Adept's Lumberjack Garb
3952: T4_ARMOR_GATHERER_WOOD@1                                         : Adept's Lumberjack Garb
3953: T4_ARMOR_GATHERER_WOOD@2                                         : Adept's Lumberjack Garb
3954: T4_ARMOR_GATHERER_WOOD@3                                         : Adept's Lumberjack Garb
3955: T5_ARMOR_GATHERER_WOOD                                           : Expert's Lumberjack Garb
3956: T5_ARMOR_GATHERER_WOOD@1                                         : Expert's Lumberjack Garb
3957: T5_ARMOR_GATHERER_WOOD@2                                         : Expert's Lumberjack Garb
3958: T5_ARMOR_GATHERER_WOOD@3                                         : Expert's Lumberjack Garb
3959: T6_ARMOR_GATHERER_WOOD                                           : Master's Lumberjack Garb
3960: T6_ARMOR_GATHERER_WOOD@1                                         : Master's Lumberjack Garb
3961: T6_ARMOR_GATHERER_WOOD@2                                         : Master's Lumberjack Garb
3962: T6_ARMOR_GATHERER_WOOD@3                                         : Master's Lumberjack Garb
3963: T7_ARMOR_GATHERER_WOOD                                           : Grandmaster's Lumberjack Garb
3964: T7_ARMOR_GATHERER_WOOD@1                                         : Grandmaster's Lumberjack Garb
3965: T7_ARMOR_GATHERER_WOOD@2                                         : Grandmaster's Lumberjack Garb
3966: T7_ARMOR_GATHERER_WOOD@3                                         : Grandmaster's Lumberjack Garb
3967: T8_ARMOR_GATHERER_WOOD                                           : Elder's Lumberjack Garb
3968: T8_ARMOR_GATHERER_WOOD@1                                         : Elder's Lumberjack Garb
3969: T8_ARMOR_GATHERER_WOOD@2                                         : Elder's Lumberjack Garb
3970: T8_ARMOR_GATHERER_WOOD@3                                         : Elder's Lumberjack Garb
3971: T4_SHOES_GATHERER_WOOD                                           : Adept's Lumberjack Workboots
3972: T4_SHOES_GATHERER_WOOD@1                                         : Adept's Lumberjack Workboots
3973: T4_SHOES_GATHERER_WOOD@2                                         : Adept's Lumberjack Workboots
3974: T4_SHOES_GATHERER_WOOD@3                                         : Adept's Lumberjack Workboots
3975: T5_SHOES_GATHERER_WOOD                                           : Expert's Lumberjack Workboots
3976: T5_SHOES_GATHERER_WOOD@1                                         : Expert's Lumberjack Workboots
3977: T5_SHOES_GATHERER_WOOD@2                                         : Expert's Lumberjack Workboots
3978: T5_SHOES_GATHERER_WOOD@3                                         : Expert's Lumberjack Workboots
3979: T6_SHOES_GATHERER_WOOD                                           : Master's Lumberjack Workboots
3980: T6_SHOES_GATHERER_WOOD@1                                         : Master's Lumberjack Workboots
3981: T6_SHOES_GATHERER_WOOD@2                                         : Master's Lumberjack Workboots
3982: T6_SHOES_GATHERER_WOOD@3                                         : Master's Lumberjack Workboots
3983: T7_SHOES_GATHERER_WOOD                                           : Grandmaster's Lumberjack Workboots
3984: T7_SHOES_GATHERER_WOOD@1                                         : Grandmaster's Lumberjack Workboots
3985: T7_SHOES_GATHERER_WOOD@2                                         : Grandmaster's Lumberjack Workboots
3986: T7_SHOES_GATHERER_WOOD@3                                         : Grandmaster's Lumberjack Workboots
3987: T8_SHOES_GATHERER_WOOD                                           : Elder's Lumberjack Workboots
3988: T8_SHOES_GATHERER_WOOD@1                                         : Elder's Lumberjack Workboots
3989: T8_SHOES_GATHERER_WOOD@2                                         : Elder's Lumberjack Workboots
3990: T8_SHOES_GATHERER_WOOD@3                                         : Elder's Lumberjack Workboots
3991: T4_BACKPACK_GATHERER_WOOD                                        : Adept's Lumberjack Backpack
3992: T4_BACKPACK_GATHERER_WOOD@1                                      : Adept's Lumberjack Backpack
3993: T4_BACKPACK_GATHERER_WOOD@2                                      : Adept's Lumberjack Backpack
3994: T4_BACKPACK_GATHERER_WOOD@3                                      : Adept's Lumberjack Backpack
3995: T5_BACKPACK_GATHERER_WOOD                                        : Expert's Lumberjack Backpack
3996: T5_BACKPACK_GATHERER_WOOD@1                                      : Expert's Lumberjack Backpack
3997: T5_BACKPACK_GATHERER_WOOD@2                                      : Expert's Lumberjack Backpack
3998: T5_BACKPACK_GATHERER_WOOD@3                                      : Expert's Lumberjack Backpack
3999: T6_BACKPACK_GATHERER_WOOD                                        : Master's Lumberjack Backpack
4000: T6_BACKPACK_GATHERER_WOOD@1                                      : Master's Lumberjack Backpack
4001: T6_BACKPACK_GATHERER_WOOD@2                                      : Master's Lumberjack Backpack
4002: T6_BACKPACK_GATHERER_WOOD@3                                      : Master's Lumberjack Backpack
4003: T7_BACKPACK_GATHERER_WOOD                                        : Grandmaster's Lumberjack Backpack
4004: T7_BACKPACK_GATHERER_WOOD@1                                      : Grandmaster's Lumberjack Backpack
4005: T7_BACKPACK_GATHERER_WOOD@2                                      : Grandmaster's Lumberjack Backpack
4006: T7_BACKPACK_GATHERER_WOOD@3                                      : Grandmaster's Lumberjack Backpack
4007: T8_BACKPACK_GATHERER_WOOD                                        : Elder's Lumberjack Backpack
4008: T8_BACKPACK_GATHERER_WOOD@1                                      : Elder's Lumberjack Backpack
4009: T8_BACKPACK_GATHERER_WOOD@2                                      : Elder's Lumberjack Backpack
4010: T8_BACKPACK_GATHERER_WOOD@3                                      : Elder's Lumberjack Backpack
4011: T4_HEAD_GATHERER_FISH                                            : Adept's Fisherman Cap
4012: T4_HEAD_GATHERER_FISH@1                                          : Adept's Fisherman Cap
4013: T4_HEAD_GATHERER_FISH@2                                          : Adept's Fisherman Cap
4014: T4_HEAD_GATHERER_FISH@3                                          : Adept's Fisherman Cap
4015: T5_HEAD_GATHERER_FISH                                            : Expert's Fisherman Cap
4016: T5_HEAD_GATHERER_FISH@1                                          : Expert's Fisherman Cap
4017: T5_HEAD_GATHERER_FISH@2                                          : Expert's Fisherman Cap
4018: T5_HEAD_GATHERER_FISH@3                                          : Expert's Fisherman Cap
4019: T6_HEAD_GATHERER_FISH                                            : Master's Fisherman Cap
4020: T6_HEAD_GATHERER_FISH@1                                          : Master's Fisherman Cap
4021: T6_HEAD_GATHERER_FISH@2                                          : Master's Fisherman Cap
4022: T6_HEAD_GATHERER_FISH@3                                          : Master's Fisherman Cap
4023: T7_HEAD_GATHERER_FISH                                            : Grandmaster's Fisherman Cap
4024: T7_HEAD_GATHERER_FISH@1                                          : Grandmaster's Fisherman Cap
4025: T7_HEAD_GATHERER_FISH@2                                          : Grandmaster's Fisherman Cap
4026: T7_HEAD_GATHERER_FISH@3                                          : Grandmaster's Fisherman Cap
4027: T8_HEAD_GATHERER_FISH                                            : Elder's Fisherman Cap
4028: T8_HEAD_GATHERER_FISH@1                                          : Elder's Fisherman Cap
4029: T8_HEAD_GATHERER_FISH@2                                          : Elder's Fisherman Cap
4030: T8_HEAD_GATHERER_FISH@3                                          : Elder's Fisherman Cap
4031: T4_ARMOR_GATHERER_FISH                                           : Adept's Fisherman Garb
4032: T4_ARMOR_GATHERER_FISH@1                                         : Adept's Fisherman Garb
4033: T4_ARMOR_GATHERER_FISH@2                                         : Adept's Fisherman Garb
4034: T4_ARMOR_GATHERER_FISH@3                                         : Adept's Fisherman Garb
4035: T5_ARMOR_GATHERER_FISH                                           : Expert's Fisherman Garb
4036: T5_ARMOR_GATHERER_FISH@1                                         : Expert's Fisherman Garb
4037: T5_ARMOR_GATHERER_FISH@2                                         : Expert's Fisherman Garb
4038: T5_ARMOR_GATHERER_FISH@3                                         : Expert's Fisherman Garb
4039: T6_ARMOR_GATHERER_FISH                                           : Master's Fisherman Garb
4040: T6_ARMOR_GATHERER_FISH@1                                         : Master's Fisherman Garb
4041: T6_ARMOR_GATHERER_FISH@2                                         : Master's Fisherman Garb
4042: T6_ARMOR_GATHERER_FISH@3                                         : Master's Fisherman Garb
4043: T7_ARMOR_GATHERER_FISH                                           : Grandmaster's Fisherman Garb
4044: T7_ARMOR_GATHERER_FISH@1                                         : Grandmaster's Fisherman Garb
4045: T7_ARMOR_GATHERER_FISH@2                                         : Grandmaster's Fisherman Garb
4046: T7_ARMOR_GATHERER_FISH@3                                         : Grandmaster's Fisherman Garb
4047: T8_ARMOR_GATHERER_FISH                                           : Elder's Fisherman Garb
4048: T8_ARMOR_GATHERER_FISH@1                                         : Elder's Fisherman Garb
4049: T8_ARMOR_GATHERER_FISH@2                                         : Elder's Fisherman Garb
4050: T8_ARMOR_GATHERER_FISH@3                                         : Elder's Fisherman Garb
4051: T4_SHOES_GATHERER_FISH                                           : Adept's Fisherman Workboots
4052: T4_SHOES_GATHERER_FISH@1                                         : Adept's Fisherman Workboots
4053: T4_SHOES_GATHERER_FISH@2                                         : Adept's Fisherman Workboots
4054: T4_SHOES_GATHERER_FISH@3                                         : Adept's Fisherman Workboots
4055: T5_SHOES_GATHERER_FISH                                           : Expert's Fisherman Workboots
4056: T5_SHOES_GATHERER_FISH@1                                         : Expert's Fisherman Workboots
4057: T5_SHOES_GATHERER_FISH@2                                         : Expert's Fisherman Workboots
4058: T5_SHOES_GATHERER_FISH@3                                         : Expert's Fisherman Workboots
4059: T6_SHOES_GATHERER_FISH                                           : Master's Fisherman Workboots
4060: T6_SHOES_GATHERER_FISH@1                                         : Master's Fisherman Workboots
4061: T6_SHOES_GATHERER_FISH@2                                         : Master's Fisherman Workboots
4062: T6_SHOES_GATHERER_FISH@3                                         : Master's Fisherman Workboots
4063: T7_SHOES_GATHERER_FISH                                           : Grandmaster's Fisherman Workboots
4064: T7_SHOES_GATHERER_FISH@1                                         : Grandmaster's Fisherman Workboots
4065: T7_SHOES_GATHERER_FISH@2                                         : Grandmaster's Fisherman Workboots
4066: T7_SHOES_GATHERER_FISH@3                                         : Grandmaster's Fisherman Workboots
4067: T8_SHOES_GATHERER_FISH                                           : Elder's Fisherman Workboots
4068: T8_SHOES_GATHERER_FISH@1                                         : Elder's Fisherman Workboots
4069: T8_SHOES_GATHERER_FISH@2                                         : Elder's Fisherman Workboots
4070: T8_SHOES_GATHERER_FISH@3                                         : Elder's Fisherman Workboots
4071: T4_BACKPACK_GATHERER_FISH                                        : Adept's Fisherman Backpack
4072: T4_BACKPACK_GATHERER_FISH@1                                      : Adept's Fisherman Backpack
4073: T4_BACKPACK_GATHERER_FISH@2                                      : Adept's Fisherman Backpack
4074: T4_BACKPACK_GATHERER_FISH@3                                      : Adept's Fisherman Backpack
4075: T5_BACKPACK_GATHERER_FISH                                        : Expert's Fisherman Backpack
4076: T5_BACKPACK_GATHERER_FISH@1                                      : Expert's Fisherman Backpack
4077: T5_BACKPACK_GATHERER_FISH@2                                      : Expert's Fisherman Backpack
4078: T5_BACKPACK_GATHERER_FISH@3                                      : Expert's Fisherman Backpack
4079: T6_BACKPACK_GATHERER_FISH                                        : Master's Fisherman Backpack
4080: T6_BACKPACK_GATHERER_FISH@1                                      : Master's Fisherman Backpack
4081: T6_BACKPACK_GATHERER_FISH@2                                      : Master's Fisherman Backpack
4082: T6_BACKPACK_GATHERER_FISH@3                                      : Master's Fisherman Backpack
4083: T7_BACKPACK_GATHERER_FISH                                        : Grandmaster's Fisherman Backpack
4084: T7_BACKPACK_GATHERER_FISH@1                                      : Grandmaster's Fisherman Backpack
4085: T7_BACKPACK_GATHERER_FISH@2                                      : Grandmaster's Fisherman Backpack
4086: T7_BACKPACK_GATHERER_FISH@3                                      : Grandmaster's Fisherman Backpack
4087: T8_BACKPACK_GATHERER_FISH                                        : Elder's Fisherman Backpack
4088: T8_BACKPACK_GATHERER_FISH@1                                      : Elder's Fisherman Backpack
4089: T8_BACKPACK_GATHERER_FISH@2                                      : Elder's Fisherman Backpack
4090: T8_BACKPACK_GATHERER_FISH@3                                      : Elder's Fisherman Backpack
4091: T2_JOURNAL_WOOD                                                  : Novice Lumberjack's Journal (Partially Full)
4092: T3_JOURNAL_WOOD                                                  : Journeyman Lumberjack's Journal (Partially Full)
4093: T4_JOURNAL_WOOD                                                  : Adept Lumberjack's Journal (Partially Full)
4094: T5_JOURNAL_WOOD                                                  : Expert Lumberjack's Journal (Partially Full)
4095: T6_JOURNAL_WOOD                                                  : Master Lumberjack's Journal (Partially Full)
4096: T7_JOURNAL_WOOD                                                  : Grandmaster Lumberjack's Journal (Partially Full)
4097: T8_JOURNAL_WOOD                                                  : Elder Lumberjack's Journal (Partially Full)
4098: T2_JOURNAL_STONE                                                 : Novice Stonecutter's Journal (Partially Full)
4099: T3_JOURNAL_STONE                                                 : Journeyman Stonecutter's Journal (Partially Full)
4100: T4_JOURNAL_STONE                                                 : Adept Stonecutter's Journal (Partially Full)
4101: T5_JOURNAL_STONE                                                 : Expert Stonecutter's Journal (Partially Full)
4102: T6_JOURNAL_STONE                                                 : Master Stonecutter's Journal (Partially Full)
4103: T7_JOURNAL_STONE                                                 : Grandmaster Stonecutter's Journal (Partially Full)
4104: T8_JOURNAL_STONE                                                 : Elder Stonecutter's Journal (Partially Full)
4105: T2_JOURNAL_ORE                                                   : Novice Prospector's Journal (Partially Full)
4106: T3_JOURNAL_ORE                                                   : Journeyman Prospector's Journal (Partially Full)
4107: T4_JOURNAL_ORE                                                   : Adept Prospector's Journal (Partially Full)
4108: T5_JOURNAL_ORE                                                   : Expert Prospector's Journal (Partially Full)
4109: T6_JOURNAL_ORE                                                   : Master Prospector's Journal (Partially Full)
4110: T7_JOURNAL_ORE                                                   : Grandmaster Prospector's Journal (Partially Full)
4111: T8_JOURNAL_ORE                                                   : Elder Prospector's Journal (Partially Full)
4112: T2_JOURNAL_FIBER                                                 : Novice Cropper's Journal (Partially Full)
4113: T3_JOURNAL_FIBER                                                 : Journeyman Cropper's Journal (Partially Full)
4114: T4_JOURNAL_FIBER                                                 : Adept Cropper's Journal (Partially Full)
4115: T5_JOURNAL_FIBER                                                 : Expert Cropper's Journal (Partially Full)
4116: T6_JOURNAL_FIBER                                                 : Master Cropper's Journal (Partially Full)
4117: T7_JOURNAL_FIBER                                                 : Grandmaster Cropper's Journal (Partially Full)
4118: T8_JOURNAL_FIBER                                                 : Elder Cropper's Journal (Partially Full)
4119: T2_JOURNAL_HIDE                                                  : Novice Gamekeeper's Journal (Partially Full)
4120: T3_JOURNAL_HIDE                                                  : Journeyman Gamekeeper's Journal (Partially Full)
4121: T4_JOURNAL_HIDE                                                  : Adept Gamekeeper's Journal (Partially Full)
4122: T5_JOURNAL_HIDE                                                  : Expert Gamekeeper's Journal (Partially Full)
4123: T6_JOURNAL_HIDE                                                  : Master Gamekeeper's Journal (Partially Full)
4124: T7_JOURNAL_HIDE                                                  : Grandmaster Gamekeeper's Journal (Partially Full)
4125: T8_JOURNAL_HIDE                                                  : Elder Gamekeeper's Journal (Partially Full)
4126: T2_JOURNAL_WARRIOR                                               : Novice Blacksmith's Journal (Partially Full)
4127: T3_JOURNAL_WARRIOR                                               : Journeyman Blacksmith's Journal (Partially Full)
4128: T4_JOURNAL_WARRIOR                                               : Adept Blacksmith's Journal (Partially Full)
4129: T5_JOURNAL_WARRIOR                                               : Expert Blacksmith's Journal (Partially Full)
4130: T6_JOURNAL_WARRIOR                                               : Master Blacksmith's Journal (Partially Full)
4131: T7_JOURNAL_WARRIOR                                               : Grandmaster Blacksmith's Journal (Partially Full)
4132: T8_JOURNAL_WARRIOR                                               : Elder Blacksmith's Journal (Partially Full)
4133: T2_JOURNAL_HUNTER                                                : Novice Fletcher's Journal (Partially Full)
4134: T3_JOURNAL_HUNTER                                                : Journeyman Fletcher's Journal (Partially Full)
4135: T4_JOURNAL_HUNTER                                                : Adept Fletcher's Journal (Partially Full)
4136: T5_JOURNAL_HUNTER                                                : Expert Fletcher's Journal (Partially Full)
4137: T6_JOURNAL_HUNTER                                                : Master Fletcher's Journal (Partially Full)
4138: T7_JOURNAL_HUNTER                                                : Grandmaster Fletcher's Journal (Partially Full)
4139: T8_JOURNAL_HUNTER                                                : Elder Fletcher's Journal (Partially Full)
4140: T2_JOURNAL_MAGE                                                  : Novice Imbuer's Journal (Partially Full)
4141: T3_JOURNAL_MAGE                                                  : Journeyman Imbuer's Journal (Partially Full)
4142: T4_JOURNAL_MAGE                                                  : Adept Imbuer's Journal (Partially Full)
4143: T5_JOURNAL_MAGE                                                  : Expert Imbuer's Journal (Partially Full)
4144: T6_JOURNAL_MAGE                                                  : Master Imbuer's Journal (Partially Full)
4145: T7_JOURNAL_MAGE                                                  : Grandmaster Imbuer's Journal (Partially Full)
4146: T8_JOURNAL_MAGE                                                  : Elder Imbuer's Journal (Partially Full)
4147: T2_JOURNAL_TOOLMAKER                                             : Novice Tinker's Journal (Partially Full)
4148: T3_JOURNAL_TOOLMAKER                                             : Journeyman Tinker's Journal (Partially Full)
4149: T4_JOURNAL_TOOLMAKER                                             : Adept Tinker's Journal (Partially Full)
4150: T5_JOURNAL_TOOLMAKER                                             : Expert Tinker's Journal (Partially Full)
4151: T6_JOURNAL_TOOLMAKER                                             : Master Tinker's Journal (Partially Full)
4152: T7_JOURNAL_TOOLMAKER                                             : Grandmaster Tinker's Journal (Partially Full)
4153: T8_JOURNAL_TOOLMAKER                                             : Elder Tinker's Journal (Partially Full)
4154: T2_JOURNAL_MERCENARY                                             : Novice Mercenary's Journal (Partially Full)
4155: T3_JOURNAL_MERCENARY                                             : Journeyman Mercenary's Journal (Partially Full)
4156: T4_JOURNAL_MERCENARY                                             : Adept Mercenary's Journal (Partially Full)
4157: T5_JOURNAL_MERCENARY                                             : Expert Mercenary's Journal (Partially Full)
4158: T6_JOURNAL_MERCENARY                                             : Master Mercenary's Journal (Partially Full)
4159: T7_JOURNAL_MERCENARY                                             : Grandmaster Mercenary's Journal (Partially Full)
4160: T8_JOURNAL_MERCENARY                                             : Elder Mercenary's Journal (Partially Full)
4161: T2_JOURNAL_TROPHY_GENERAL                                        : Novice's Generalist Trophy Journal (Partially Full)
4162: T3_JOURNAL_TROPHY_GENERAL                                        : Journeyman's Generalist Trophy Journal (Partially Full)
4163: T4_JOURNAL_TROPHY_GENERAL                                        : Adept's Generalist Trophy Journal (Partially Full)
4164: T5_JOURNAL_TROPHY_GENERAL                                        : Expert's Generalist Trophy Journal (Partially Full)
4165: T6_JOURNAL_TROPHY_GENERAL                                        : Master's Generalist Trophy Journal (Partially Full)
4166: T7_JOURNAL_TROPHY_GENERAL                                        : Grandmaster's Generalist Trophy Journal (Partially Full)
4167: T8_JOURNAL_TROPHY_GENERAL                                        : Elder's Generalist Trophy Journal (Partially Full)
4168: T2_JOURNAL_TROPHY_MERCENARY                                      : Novice Mercenary's Trophy Journal (Partially Full)
4169: T3_JOURNAL_TROPHY_MERCENARY                                      : Journeyman Mercenary's Trophy Journal (Partially Full)
4170: T4_JOURNAL_TROPHY_MERCENARY                                      : Adept Mercenary's Trophy Journal (Partially Full)
4171: T5_JOURNAL_TROPHY_MERCENARY                                      : Expert Mercenary's Trophy Journal (Partially Full)
4172: T6_JOURNAL_TROPHY_MERCENARY                                      : Master Mercenary's Trophy Journal (Partially Full)
4173: T7_JOURNAL_TROPHY_MERCENARY                                      : Grandmaster Mercenary's Trophy Journal (Partially Full)
4174: T8_JOURNAL_TROPHY_MERCENARY                                      : Elder Mercenary's Trophy Journal (Partially Full)
4175: T2_JOURNAL_TROPHY_HIDE                                           : Novice Gamekeeper's Trophy Journal (Partially Full)
4176: T3_JOURNAL_TROPHY_HIDE                                           : Journeyman Gamekeeper's Trophy Journal (Partially Full)
4177: T4_JOURNAL_TROPHY_HIDE                                           : Adept Gamekeeper's Trophy Journal (Partially Full)
4178: T5_JOURNAL_TROPHY_HIDE                                           : Expert Gamekeeper's Trophy Journal (Partially Full)
4179: T6_JOURNAL_TROPHY_HIDE                                           : Master Gamekeeper's Trophy Journal (Partially Full)
4180: T7_JOURNAL_TROPHY_HIDE                                           : Grandmaster Gamekeeper's Trophy Journal (Partially Full)
4181: T8_JOURNAL_TROPHY_HIDE                                           : Elder Gamekeeper's Trophy Journal (Partially Full)
4182: T2_JOURNAL_TROPHY_WOOD                                           : Novice Lumberjack's Trophy Journal (Partially Full)
4183: T3_JOURNAL_TROPHY_WOOD                                           : Journeyman Lumberjack's Trophy Journal (Partially Full)
4184: T4_JOURNAL_TROPHY_WOOD                                           : Adept Lumberjack's Trophy Journal (Partially Full)
4185: T5_JOURNAL_TROPHY_WOOD                                           : Expert Lumberjack's Trophy Journal (Partially Full)
4186: T6_JOURNAL_TROPHY_WOOD                                           : Master Lumberjack's Trophy Journal (Partially Full)
4187: T7_JOURNAL_TROPHY_WOOD                                           : Grandmaster Lumberjack's Trophy Journal (Partially Full)
4188: T8_JOURNAL_TROPHY_WOOD                                           : Elder Lumberjack's Trophy Journal (Partially Full)
4189: T2_JOURNAL_TROPHY_STONE                                          : Novice Stonecutter's Trophy Journal (Partially Full)
4190: T3_JOURNAL_TROPHY_STONE                                          : Journeyman Stonecutter's Trophy Journal (Partially Full)
4191: T4_JOURNAL_TROPHY_STONE                                          : Adept Stonecutter's Trophy Journal (Partially Full)
4192: T5_JOURNAL_TROPHY_STONE                                          : Expert Stonecutter's Trophy Journal (Partially Full)
4193: T6_JOURNAL_TROPHY_STONE                                          : Master Stonecutter's Trophy Journal (Partially Full)
4194: T7_JOURNAL_TROPHY_STONE                                          : Grandmaster Stonecutter's Trophy Journal (Partially Full)
4195: T8_JOURNAL_TROPHY_STONE                                          : Elder Stonecutter's Trophy Journal (Partially Full)
4196: T2_JOURNAL_TROPHY_ORE                                            : Novice Prospector's Trophy Journal (Partially Full)
4197: T3_JOURNAL_TROPHY_ORE                                            : Journeyman Prospector's Trophy Journal (Partially Full)
4198: T4_JOURNAL_TROPHY_ORE                                            : Adept Prospector's Trophy Journal (Partially Full)
4199: T5_JOURNAL_TROPHY_ORE                                            : Expert Prospector's Trophy Journal (Partially Full)
4200: T6_JOURNAL_TROPHY_ORE                                            : Master Prospector's Trophy Journal (Partially Full)
4201: T7_JOURNAL_TROPHY_ORE                                            : Grandmaster Prospector's Trophy Journal (Partially Full)
4202: T8_JOURNAL_TROPHY_ORE                                            : Elder Prospector's Trophy Journal (Partially Full)
4203: T2_JOURNAL_TROPHY_FIBER                                          : Novice Cropper's Trophy Journal (Partially Full)
4204: T3_JOURNAL_TROPHY_FIBER                                          : Journeyman Cropper's Trophy Journal (Partially Full)
4205: T4_JOURNAL_TROPHY_FIBER                                          : Adept Cropper's Trophy Journal (Partially Full)
4206: T5_JOURNAL_TROPHY_FIBER                                          : Expert Cropper's Trophy Journal (Partially Full)
4207: T6_JOURNAL_TROPHY_FIBER                                          : Master Cropper's Trophy Journal (Partially Full)
4208: T7_JOURNAL_TROPHY_FIBER                                          : Grandmaster Cropper's Trophy Journal (Partially Full)
4209: T8_JOURNAL_TROPHY_FIBER                                          : Elder Cropper's Trophy Journal (Partially Full)
4210: T2_JOURNAL_TROPHY_FISHING                                        : Novice Fisherman's Trophy Journal (Partially Full)
4211: T3_JOURNAL_TROPHY_FISHING                                        : Journeyman Fisherman's Trophy Journal (Partially Full)
4212: T4_JOURNAL_TROPHY_FISHING                                        : Adept Fisherman's Trophy Journal (Partially Full)
4213: T5_JOURNAL_TROPHY_FISHING                                        : Expert Fisherman's Trophy Journal (Partially Full)
4214: T6_JOURNAL_TROPHY_FISHING                                        : Master Fisherman's Trophy Journal (Partially Full)
4215: T7_JOURNAL_TROPHY_FISHING                                        : Grandmaster Fisherman's Trophy Journal (Partially Full)
4216: T8_JOURNAL_TROPHY_FISHING                                        : Elder Fisherman's Trophy Journal (Partially Full)
4217: T2_JOURNAL_FISHING                                               : Novice Fisherman's Journal (Partially Full)
4218: T3_JOURNAL_FISHING                                               : Journeyman Fisherman's Journal (Partially Full)
4219: T4_JOURNAL_FISHING                                               : Adept Fisherman's Journal (Partially Full)
4220: T5_JOURNAL_FISHING                                               : Expert Fisherman's Journal (Partially Full)
4221: T6_JOURNAL_FISHING                                               : Master Fisherman's Journal (Partially Full)
4222: T7_JOURNAL_FISHING                                               : Grandmaster Fisherman's Journal (Partially Full)
4223: T8_JOURNAL_FISHING                                               : Elder Fisherman's Journal (Partially Full)
4224: T2_LABOURER_CONTRACT_WOOD                                        : Novice Lumberjack Contract
4225: T3_LABOURER_CONTRACT_WOOD                                        : Journeyman Lumberjack Contract
4226: T4_LABOURER_CONTRACT_WOOD                                        : Adept Lumberjack Contract
4227: T5_LABOURER_CONTRACT_WOOD                                        : Expert Lumberjack Contract
4228: T6_LABOURER_CONTRACT_WOOD                                        : Master Lumberjack Contract
4229: T7_LABOURER_CONTRACT_WOOD                                        : Grandmaster Lumberjack Contract
4230: T8_LABOURER_CONTRACT_WOOD                                        : Elder Lumberjack Contract
4231: T2_LABOURER_CONTRACT_STONE                                       : Novice Stonecutter Contract
4232: T3_LABOURER_CONTRACT_STONE                                       : Journeyman Stonecutter Contract
4233: T4_LABOURER_CONTRACT_STONE                                       : Adept Stonecutter Contract
4234: T5_LABOURER_CONTRACT_STONE                                       : Expert Stonecutter Contract
4235: T6_LABOURER_CONTRACT_STONE                                       : Master Stonecutter Contract
4236: T7_LABOURER_CONTRACT_STONE                                       : Grandmaster Stonecutter Contract
4237: T8_LABOURER_CONTRACT_STONE                                       : Elder Stonecutter Contract
4238: T2_LABOURER_CONTRACT_FIBER                                       : Novice Cropper Contract
4239: T3_LABOURER_CONTRACT_FIBER                                       : Journeyman Cropper Contract
4240: T4_LABOURER_CONTRACT_FIBER                                       : Adept Cropper Contract
4241: T5_LABOURER_CONTRACT_FIBER                                       : Expert Cropper Contract
4242: T6_LABOURER_CONTRACT_FIBER                                       : Master Cropper Contract
4243: T7_LABOURER_CONTRACT_FIBER                                       : Grandmaster Cropper Contract
4244: T8_LABOURER_CONTRACT_FIBER                                       : Elder Cropper Contract
4245: T2_LABOURER_CONTRACT_HIDE                                        : Novice Gamekeeper Contract
4246: T3_LABOURER_CONTRACT_HIDE                                        : Journeyman Gamekeeper Contract
4247: T4_LABOURER_CONTRACT_HIDE                                        : Adept Gamekeeper Contract
4248: T5_LABOURER_CONTRACT_HIDE                                        : Expert Gamekeeper Contract
4249: T6_LABOURER_CONTRACT_HIDE                                        : Master Gamekeeper Contract
4250: T7_LABOURER_CONTRACT_HIDE                                        : Grandmaster Gamekeeper Contract
4251: T8_LABOURER_CONTRACT_HIDE                                        : Elder Gamekeeper Contract
4252: T2_LABOURER_CONTRACT_ORE                                         : Novice Prospector Contract
4253: T3_LABOURER_CONTRACT_ORE                                         : Journeyman Prospector Contract
4254: T4_LABOURER_CONTRACT_ORE                                         : Adept Prospector Contract
4255: T5_LABOURER_CONTRACT_ORE                                         : Expert Prospector Contract
4256: T6_LABOURER_CONTRACT_ORE                                         : Master Prospector Contract
4257: T7_LABOURER_CONTRACT_ORE                                         : Grandmaster Prospector Contract
4258: T8_LABOURER_CONTRACT_ORE                                         : Elder Prospector Contract
4259: T2_LABOURER_CONTRACT_MERCENARY                                   : Novice Mercenary Contract
4260: T3_LABOURER_CONTRACT_MERCENARY                                   : Journeyman Mercenary Contract
4261: T4_LABOURER_CONTRACT_MERCENARY                                   : Adept Mercenary Contract
4262: T5_LABOURER_CONTRACT_MERCENARY                                   : Expert Mercenary Contract
4263: T6_LABOURER_CONTRACT_MERCENARY                                   : Master Mercenary Contract
4264: T7_LABOURER_CONTRACT_MERCENARY                                   : Grandmaster Mercenary Contract
4265: T8_LABOURER_CONTRACT_MERCENARY                                   : Elder Mercenary Contract
4266: T2_LABOURER_CONTRACT_FISHERMAN                                   : Novice Fisherman Contract
4267: T3_LABOURER_CONTRACT_FISHERMAN                                   : Journeyman Fisherman Contract
4268: T4_LABOURER_CONTRACT_FISHERMAN                                   : Adept Fisherman Contract
4269: T5_LABOURER_CONTRACT_FISHERMAN                                   : Expert Fisherman Contract
4270: T6_LABOURER_CONTRACT_FISHERMAN                                   : Master Fisherman Contract
4271: T7_LABOURER_CONTRACT_FISHERMAN                                   : Grandmaster Fisherman Contract
4272: T8_LABOURER_CONTRACT_FISHERMAN                                   : Elder Fisherman Contract
4273: T2_LABOURER_CONTRACT_HUNTER                                      : Novice Fletcher Contract
4274: T3_LABOURER_CONTRACT_HUNTER                                      : Journeyman Fletcher Contract
4275: T4_LABOURER_CONTRACT_HUNTER                                      : Adept Fletcher Contract
4276: T5_LABOURER_CONTRACT_HUNTER                                      : Expert Fletcher Contract
4277: T6_LABOURER_CONTRACT_HUNTER                                      : Master Fletcher Contract
4278: T7_LABOURER_CONTRACT_HUNTER                                      : Grandmaster Fletcher Contract
4279: T8_LABOURER_CONTRACT_HUNTER                                      : Elder Fletcher Contract
4280: T2_LABOURER_CONTRACT_MAGE                                        : Novice Imbuer Contract
4281: T3_LABOURER_CONTRACT_MAGE                                        : Journeyman Imbuer Contract
4282: T4_LABOURER_CONTRACT_MAGE                                        : Adept Imbuer Contract
4283: T5_LABOURER_CONTRACT_MAGE                                        : Expert Imbuer Contract
4284: T6_LABOURER_CONTRACT_MAGE                                        : Master Imbuer Contract
4285: T7_LABOURER_CONTRACT_MAGE                                        : Grandmaster Imbuer Contract
4286: T8_LABOURER_CONTRACT_MAGE                                        : Elder Imbuer Contract
4287: T2_LABOURER_CONTRACT_WARRIOR                                     : Novice Blacksmith Contract
4288: T3_LABOURER_CONTRACT_WARRIOR                                     : Journeyman Blacksmith Contract
4289: T4_LABOURER_CONTRACT_WARRIOR                                     : Adept Blacksmith Contract
4290: T5_LABOURER_CONTRACT_WARRIOR                                     : Expert Blacksmith Contract
4291: T6_LABOURER_CONTRACT_WARRIOR                                     : Master Blacksmith Contract
4292: T7_LABOURER_CONTRACT_WARRIOR                                     : Grandmaster Blacksmith Contract
4293: T8_LABOURER_CONTRACT_WARRIOR                                     : Elder Blacksmith Contract
4294: T2_LABOURER_CONTRACT_TOOLMAKER                                   : Novice Tinker Contract
4295: T3_LABOURER_CONTRACT_TOOLMAKER                                   : Journeyman Tinker Contract
4296: T4_LABOURER_CONTRACT_TOOLMAKER                                   : Adept Tinker Contract
4297: T5_LABOURER_CONTRACT_TOOLMAKER                                   : Expert Tinker Contract
4298: T6_LABOURER_CONTRACT_TOOLMAKER                                   : Master Tinker Contract
4299: T7_LABOURER_CONTRACT_TOOLMAKER                                   : Grandmaster Tinker Contract
4300: T8_LABOURER_CONTRACT_TOOLMAKER                                   : Elder Tinker Contract
4301: T2_2H_BOW                                                        : Novice's Bow
4302: T3_2H_BOW                                                        : Journeyman's Bow
4303: T4_2H_BOW                                                        : Adept's Bow
4304: T4_2H_BOW@1                                                      : Adept's Bow
4305: T4_2H_BOW@2                                                      : Adept's Bow
4306: T4_2H_BOW@3                                                      : Adept's Bow
4307: T5_2H_BOW                                                        : Expert's Bow
4308: T5_2H_BOW@1                                                      : Expert's Bow
4309: T5_2H_BOW@2                                                      : Expert's Bow
4310: T5_2H_BOW@3                                                      : Expert's Bow
4311: T6_2H_BOW                                                        : Master's Bow
4312: T6_2H_BOW@1                                                      : Master's Bow
4313: T6_2H_BOW@2                                                      : Master's Bow
4314: T6_2H_BOW@3                                                      : Master's Bow
4315: T7_2H_BOW                                                        : Grandmaster's Bow
4316: T7_2H_BOW@1                                                      : Grandmaster's Bow
4317: T7_2H_BOW@2                                                      : Grandmaster's Bow
4318: T7_2H_BOW@3                                                      : Grandmaster's Bow
4319: T8_2H_BOW                                                        : Elder's Bow
4320: T8_2H_BOW@1                                                      : Elder's Bow
4321: T8_2H_BOW@2                                                      : Elder's Bow
4322: T8_2H_BOW@3                                                      : Elder's Bow
4323: T4_2H_WARBOW                                                     : Adept's Warbow
4324: T4_2H_WARBOW@1                                                   : Adept's Warbow
4325: T4_2H_WARBOW@2                                                   : Adept's Warbow
4326: T4_2H_WARBOW@3                                                   : Adept's Warbow
4327: T5_2H_WARBOW                                                     : Expert's Warbow
4328: T5_2H_WARBOW@1                                                   : Expert's Warbow
4329: T5_2H_WARBOW@2                                                   : Expert's Warbow
4330: T5_2H_WARBOW@3                                                   : Expert's Warbow
4331: T6_2H_WARBOW                                                     : Master's Warbow
4332: T6_2H_WARBOW@1                                                   : Master's Warbow
4333: T6_2H_WARBOW@2                                                   : Master's Warbow
4334: T6_2H_WARBOW@3                                                   : Master's Warbow
4335: T7_2H_WARBOW                                                     : Grandmaster's Warbow
4336: T7_2H_WARBOW@1                                                   : Grandmaster's Warbow
4337: T7_2H_WARBOW@2                                                   : Grandmaster's Warbow
4338: T7_2H_WARBOW@3                                                   : Grandmaster's Warbow
4339: T8_2H_WARBOW                                                     : Elder's Warbow
4340: T8_2H_WARBOW@1                                                   : Elder's Warbow
4341: T8_2H_WARBOW@2                                                   : Elder's Warbow
4342: T8_2H_WARBOW@3                                                   : Elder's Warbow
4343: T4_2H_LONGBOW                                                    : Adept's Longbow
4344: T4_2H_LONGBOW@1                                                  : Adept's Longbow
4345: T4_2H_LONGBOW@2                                                  : Adept's Longbow
4346: T4_2H_LONGBOW@3                                                  : Adept's Longbow
4347: T5_2H_LONGBOW                                                    : Expert's Longbow
4348: T5_2H_LONGBOW@1                                                  : Expert's Longbow
4349: T5_2H_LONGBOW@2                                                  : Expert's Longbow
4350: T5_2H_LONGBOW@3                                                  : Expert's Longbow
4351: T6_2H_LONGBOW                                                    : Master's Longbow
4352: T6_2H_LONGBOW@1                                                  : Master's Longbow
4353: T6_2H_LONGBOW@2                                                  : Master's Longbow
4354: T6_2H_LONGBOW@3                                                  : Master's Longbow
4355: T7_2H_LONGBOW                                                    : Grandmaster's Longbow
4356: T7_2H_LONGBOW@1                                                  : Grandmaster's Longbow
4357: T7_2H_LONGBOW@2                                                  : Grandmaster's Longbow
4358: T7_2H_LONGBOW@3                                                  : Grandmaster's Longbow
4359: T8_2H_LONGBOW                                                    : Elder's Longbow
4360: T8_2H_LONGBOW@1                                                  : Elder's Longbow
4361: T8_2H_LONGBOW@2                                                  : Elder's Longbow
4362: T8_2H_LONGBOW@3                                                  : Elder's Longbow
4363: T4_2H_LONGBOW_UNDEAD                                             : Adept's Whispering Bow
4364: T4_2H_LONGBOW_UNDEAD@1                                           : Adept's Whispering Bow
4365: T4_2H_LONGBOW_UNDEAD@2                                           : Adept's Whispering Bow
4366: T4_2H_LONGBOW_UNDEAD@3                                           : Adept's Whispering Bow
4367: T5_2H_LONGBOW_UNDEAD                                             : Expert's Whispering Bow
4368: T5_2H_LONGBOW_UNDEAD@1                                           : Expert's Whispering Bow
4369: T5_2H_LONGBOW_UNDEAD@2                                           : Expert's Whispering Bow
4370: T5_2H_LONGBOW_UNDEAD@3                                           : Expert's Whispering Bow
4371: T6_2H_LONGBOW_UNDEAD                                             : Master's Whispering Bow
4372: T6_2H_LONGBOW_UNDEAD@1                                           : Master's Whispering Bow
4373: T6_2H_LONGBOW_UNDEAD@2                                           : Master's Whispering Bow
4374: T6_2H_LONGBOW_UNDEAD@3                                           : Master's Whispering Bow
4375: T7_2H_LONGBOW_UNDEAD                                             : Grandmaster's Whispering Bow
4376: T7_2H_LONGBOW_UNDEAD@1                                           : Grandmaster's Whispering Bow
4377: T7_2H_LONGBOW_UNDEAD@2                                           : Grandmaster's Whispering Bow
4378: T7_2H_LONGBOW_UNDEAD@3                                           : Grandmaster's Whispering Bow
4379: T8_2H_LONGBOW_UNDEAD                                             : Elder's Whispering Bow
4380: T8_2H_LONGBOW_UNDEAD@1                                           : Elder's Whispering Bow
4381: T8_2H_LONGBOW_UNDEAD@2                                           : Elder's Whispering Bow
4382: T8_2H_LONGBOW_UNDEAD@3                                           : Elder's Whispering Bow
4383: T4_2H_BOW_HELL                                                   : Adept's Wailing Bow
4384: T4_2H_BOW_HELL@1                                                 : Adept's Wailing Bow
4385: T4_2H_BOW_HELL@2                                                 : Adept's Wailing Bow
4386: T4_2H_BOW_HELL@3                                                 : Adept's Wailing Bow
4387: T5_2H_BOW_HELL                                                   : Expert's Wailing Bow
4388: T5_2H_BOW_HELL@1                                                 : Expert's Wailing Bow
4389: T5_2H_BOW_HELL@2                                                 : Expert's Wailing Bow
4390: T5_2H_BOW_HELL@3                                                 : Expert's Wailing Bow
4391: T6_2H_BOW_HELL                                                   : Master's Wailing Bow
4392: T6_2H_BOW_HELL@1                                                 : Master's Wailing Bow
4393: T6_2H_BOW_HELL@2                                                 : Master's Wailing Bow
4394: T6_2H_BOW_HELL@3                                                 : Master's Wailing Bow
4395: T7_2H_BOW_HELL                                                   : Grandmaster's Wailing Bow
4396: T7_2H_BOW_HELL@1                                                 : Grandmaster's Wailing Bow
4397: T7_2H_BOW_HELL@2                                                 : Grandmaster's Wailing Bow
4398: T7_2H_BOW_HELL@3                                                 : Grandmaster's Wailing Bow
4399: T8_2H_BOW_HELL                                                   : Elder's Wailing Bow
4400: T8_2H_BOW_HELL@1                                                 : Elder's Wailing Bow
4401: T8_2H_BOW_HELL@2                                                 : Elder's Wailing Bow
4402: T8_2H_BOW_HELL@3                                                 : Elder's Wailing Bow
4403: T4_2H_BOW_KEEPER                                                 : Adept's Bow of Badon
4404: T4_2H_BOW_KEEPER@1                                               : Adept's Bow of Badon
4405: T4_2H_BOW_KEEPER@2                                               : Adept's Bow of Badon
4406: T4_2H_BOW_KEEPER@3                                               : Adept's Bow of Badon
4407: T5_2H_BOW_KEEPER                                                 : Expert's Bow of Badon
4408: T5_2H_BOW_KEEPER@1                                               : Expert's Bow of Badon
4409: T5_2H_BOW_KEEPER@2                                               : Expert's Bow of Badon
4410: T5_2H_BOW_KEEPER@3                                               : Expert's Bow of Badon
4411: T6_2H_BOW_KEEPER                                                 : Master's Bow of Badon
4412: T6_2H_BOW_KEEPER@1                                               : Master's Bow of Badon
4413: T6_2H_BOW_KEEPER@2                                               : Master's Bow of Badon
4414: T6_2H_BOW_KEEPER@3                                               : Master's Bow of Badon
4415: T7_2H_BOW_KEEPER                                                 : Grandmaster's Bow of Badon
4416: T7_2H_BOW_KEEPER@1                                               : Grandmaster's Bow of Badon
4417: T7_2H_BOW_KEEPER@2                                               : Grandmaster's Bow of Badon
4418: T7_2H_BOW_KEEPER@3                                               : Grandmaster's Bow of Badon
4419: T8_2H_BOW_KEEPER                                                 : Elder's Bow of Badon
4420: T8_2H_BOW_KEEPER@1                                               : Elder's Bow of Badon
4421: T8_2H_BOW_KEEPER@2                                               : Elder's Bow of Badon
4422: T8_2H_BOW_KEEPER@3                                               : Elder's Bow of Badon
4423: T3_2H_CROSSBOW                                                   : Journeyman's Crossbow
4424: T4_2H_CROSSBOW                                                   : Adept's Crossbow
4425: T4_2H_CROSSBOW@1                                                 : Adept's Crossbow
4426: T4_2H_CROSSBOW@2                                                 : Adept's Crossbow
4427: T4_2H_CROSSBOW@3                                                 : Adept's Crossbow
4428: T5_2H_CROSSBOW                                                   : Expert's Crossbow
4429: T5_2H_CROSSBOW@1                                                 : Expert's Crossbow
4430: T5_2H_CROSSBOW@2                                                 : Expert's Crossbow
4431: T5_2H_CROSSBOW@3                                                 : Expert's Crossbow
4432: T6_2H_CROSSBOW                                                   : Master's Crossbow
4433: T6_2H_CROSSBOW@1                                                 : Master's Crossbow
4434: T6_2H_CROSSBOW@2                                                 : Master's Crossbow
4435: T6_2H_CROSSBOW@3                                                 : Master's Crossbow
4436: T7_2H_CROSSBOW                                                   : Grandmaster's Crossbow
4437: T7_2H_CROSSBOW@1                                                 : Grandmaster's Crossbow
4438: T7_2H_CROSSBOW@2                                                 : Grandmaster's Crossbow
4439: T7_2H_CROSSBOW@3                                                 : Grandmaster's Crossbow
4440: T8_2H_CROSSBOW                                                   : Elder's Crossbow
4441: T8_2H_CROSSBOW@1                                                 : Elder's Crossbow
4442: T8_2H_CROSSBOW@2                                                 : Elder's Crossbow
4443: T8_2H_CROSSBOW@3                                                 : Elder's Crossbow
4444: T4_2H_CROSSBOWLARGE                                              : Adept's Heavy Crossbow
4445: T4_2H_CROSSBOWLARGE@1                                            : Adept's Heavy Crossbow
4446: T4_2H_CROSSBOWLARGE@2                                            : Adept's Heavy Crossbow
4447: T4_2H_CROSSBOWLARGE@3                                            : Adept's Heavy Crossbow
4448: T5_2H_CROSSBOWLARGE                                              : Expert's Heavy Crossbow
4449: T5_2H_CROSSBOWLARGE@1                                            : Expert's Heavy Crossbow
4450: T5_2H_CROSSBOWLARGE@2                                            : Expert's Heavy Crossbow
4451: T5_2H_CROSSBOWLARGE@3                                            : Expert's Heavy Crossbow
4452: T6_2H_CROSSBOWLARGE                                              : Master's Heavy Crossbow
4453: T6_2H_CROSSBOWLARGE@1                                            : Master's Heavy Crossbow
4454: T6_2H_CROSSBOWLARGE@2                                            : Master's Heavy Crossbow
4455: T6_2H_CROSSBOWLARGE@3                                            : Master's Heavy Crossbow
4456: T7_2H_CROSSBOWLARGE                                              : Grandmaster's Heavy Crossbow
4457: T7_2H_CROSSBOWLARGE@1                                            : Grandmaster's Heavy Crossbow
4458: T7_2H_CROSSBOWLARGE@2                                            : Grandmaster's Heavy Crossbow
4459: T7_2H_CROSSBOWLARGE@3                                            : Grandmaster's Heavy Crossbow
4460: T8_2H_CROSSBOWLARGE                                              : Elder's Heavy Crossbow
4461: T8_2H_CROSSBOWLARGE@1                                            : Elder's Heavy Crossbow
4462: T8_2H_CROSSBOWLARGE@2                                            : Elder's Heavy Crossbow
4463: T8_2H_CROSSBOWLARGE@3                                            : Elder's Heavy Crossbow
4464: T4_MAIN_1HCROSSBOW                                               : Adept's Light Crossbow
4465: T4_MAIN_1HCROSSBOW@1                                             : Adept's Light Crossbow
4466: T4_MAIN_1HCROSSBOW@2                                             : Adept's Light Crossbow
4467: T4_MAIN_1HCROSSBOW@3                                             : Adept's Light Crossbow
4468: T5_MAIN_1HCROSSBOW                                               : Expert's Light Crossbow
4469: T5_MAIN_1HCROSSBOW@1                                             : Expert's Light Crossbow
4470: T5_MAIN_1HCROSSBOW@2                                             : Expert's Light Crossbow
4471: T5_MAIN_1HCROSSBOW@3                                             : Expert's Light Crossbow
4472: T6_MAIN_1HCROSSBOW                                               : Master's Light Crossbow
4473: T6_MAIN_1HCROSSBOW@1                                             : Master's Light Crossbow
4474: T6_MAIN_1HCROSSBOW@2                                             : Master's Light Crossbow
4475: T6_MAIN_1HCROSSBOW@3                                             : Master's Light Crossbow
4476: T7_MAIN_1HCROSSBOW                                               : Grandmaster's Light Crossbow
4477: T7_MAIN_1HCROSSBOW@1                                             : Grandmaster's Light Crossbow
4478: T7_MAIN_1HCROSSBOW@2                                             : Grandmaster's Light Crossbow
4479: T7_MAIN_1HCROSSBOW@3                                             : Grandmaster's Light Crossbow
4480: T8_MAIN_1HCROSSBOW                                               : Elder's Light Crossbow
4481: T8_MAIN_1HCROSSBOW@1                                             : Elder's Light Crossbow
4482: T8_MAIN_1HCROSSBOW@2                                             : Elder's Light Crossbow
4483: T8_MAIN_1HCROSSBOW@3                                             : Elder's Light Crossbow
4484: T4_2H_REPEATINGCROSSBOW_UNDEAD                                   : Adept's Weeping Repeater
4485: T4_2H_REPEATINGCROSSBOW_UNDEAD@1                                 : Adept's Weeping Repeater
4486: T4_2H_REPEATINGCROSSBOW_UNDEAD@2                                 : Adept's Weeping Repeater
4487: T4_2H_REPEATINGCROSSBOW_UNDEAD@3                                 : Adept's Weeping Repeater
4488: T5_2H_REPEATINGCROSSBOW_UNDEAD                                   : Expert's Weeping Repeater
4489: T5_2H_REPEATINGCROSSBOW_UNDEAD@1                                 : Expert's Weeping Repeater
4490: T5_2H_REPEATINGCROSSBOW_UNDEAD@2                                 : Expert's Weeping Repeater
4491: T5_2H_REPEATINGCROSSBOW_UNDEAD@3                                 : Expert's Weeping Repeater
4492: T6_2H_REPEATINGCROSSBOW_UNDEAD                                   : Master's Weeping Repeater
4493: T6_2H_REPEATINGCROSSBOW_UNDEAD@1                                 : Master's Weeping Repeater
4494: T6_2H_REPEATINGCROSSBOW_UNDEAD@2                                 : Master's Weeping Repeater
4495: T6_2H_REPEATINGCROSSBOW_UNDEAD@3                                 : Master's Weeping Repeater
4496: T7_2H_REPEATINGCROSSBOW_UNDEAD                                   : Grandmaster's Weeping Repeater
4497: T7_2H_REPEATINGCROSSBOW_UNDEAD@1                                 : Grandmaster's Weeping Repeater
4498: T7_2H_REPEATINGCROSSBOW_UNDEAD@2                                 : Grandmaster's Weeping Repeater
4499: T7_2H_REPEATINGCROSSBOW_UNDEAD@3                                 : Grandmaster's Weeping Repeater
4500: T8_2H_REPEATINGCROSSBOW_UNDEAD                                   : Elder's Weeping Repeater
4501: T8_2H_REPEATINGCROSSBOW_UNDEAD@1                                 : Elder's Weeping Repeater
4502: T8_2H_REPEATINGCROSSBOW_UNDEAD@2                                 : Elder's Weeping Repeater
4503: T8_2H_REPEATINGCROSSBOW_UNDEAD@3                                 : Elder's Weeping Repeater
4504: T4_2H_DUALCROSSBOW_HELL                                          : Adept's Boltcasters
4505: T4_2H_DUALCROSSBOW_HELL@1                                        : Adept's Boltcasters
4506: T4_2H_DUALCROSSBOW_HELL@2                                        : Adept's Boltcasters
4507: T4_2H_DUALCROSSBOW_HELL@3                                        : Adept's Boltcasters
4508: T5_2H_DUALCROSSBOW_HELL                                          : Expert's Boltcasters
4509: T5_2H_DUALCROSSBOW_HELL@1                                        : Expert's Boltcasters
4510: T5_2H_DUALCROSSBOW_HELL@2                                        : Expert's Boltcasters
4511: T5_2H_DUALCROSSBOW_HELL@3                                        : Expert's Boltcasters
4512: T6_2H_DUALCROSSBOW_HELL                                          : Master's Boltcasters
4513: T6_2H_DUALCROSSBOW_HELL@1                                        : Master's Boltcasters
4514: T6_2H_DUALCROSSBOW_HELL@2                                        : Master's Boltcasters
4515: T6_2H_DUALCROSSBOW_HELL@3                                        : Master's Boltcasters
4516: T7_2H_DUALCROSSBOW_HELL                                          : Grandmaster's Boltcasters
4517: T7_2H_DUALCROSSBOW_HELL@1                                        : Grandmaster's Boltcasters
4518: T7_2H_DUALCROSSBOW_HELL@2                                        : Grandmaster's Boltcasters
4519: T7_2H_DUALCROSSBOW_HELL@3                                        : Grandmaster's Boltcasters
4520: T8_2H_DUALCROSSBOW_HELL                                          : Elder's Boltcasters
4521: T8_2H_DUALCROSSBOW_HELL@1                                        : Elder's Boltcasters
4522: T8_2H_DUALCROSSBOW_HELL@2                                        : Elder's Boltcasters
4523: T8_2H_DUALCROSSBOW_HELL@3                                        : Elder's Boltcasters
4524: T4_2H_CROSSBOWLARGE_MORGANA                                      : Adept's Siegebow
4525: T4_2H_CROSSBOWLARGE_MORGANA@1                                    : Adept's Siegebow
4526: T4_2H_CROSSBOWLARGE_MORGANA@2                                    : Adept's Siegebow
4527: T4_2H_CROSSBOWLARGE_MORGANA@3                                    : Adept's Siegebow
4528: T5_2H_CROSSBOWLARGE_MORGANA                                      : Expert's Siegebow
4529: T5_2H_CROSSBOWLARGE_MORGANA@1                                    : Expert's Siegebow
4530: T5_2H_CROSSBOWLARGE_MORGANA@2                                    : Expert's Siegebow
4531: T5_2H_CROSSBOWLARGE_MORGANA@3                                    : Expert's Siegebow
4532: T6_2H_CROSSBOWLARGE_MORGANA                                      : Master's Siegebow
4533: T6_2H_CROSSBOWLARGE_MORGANA@1                                    : Master's Siegebow
4534: T6_2H_CROSSBOWLARGE_MORGANA@2                                    : Master's Siegebow
4535: T6_2H_CROSSBOWLARGE_MORGANA@3                                    : Master's Siegebow
4536: T7_2H_CROSSBOWLARGE_MORGANA                                      : Grandmaster's Siegebow
4537: T7_2H_CROSSBOWLARGE_MORGANA@1                                    : Grandmaster's Siegebow
4538: T7_2H_CROSSBOWLARGE_MORGANA@2                                    : Grandmaster's Siegebow
4539: T7_2H_CROSSBOWLARGE_MORGANA@3                                    : Grandmaster's Siegebow
4540: T8_2H_CROSSBOWLARGE_MORGANA                                      : Elder's Siegebow
4541: T8_2H_CROSSBOWLARGE_MORGANA@1                                    : Elder's Siegebow
4542: T8_2H_CROSSBOWLARGE_MORGANA@2                                    : Elder's Siegebow
4543: T8_2H_CROSSBOWLARGE_MORGANA@3                                    : Elder's Siegebow
4544: T3_MAIN_CURSEDSTAFF                                              : Journeyman's Cursed Staff
4545: T4_MAIN_CURSEDSTAFF                                              : Adept's Cursed Staff
4546: T4_MAIN_CURSEDSTAFF@1                                            : Adept's Cursed Staff
4547: T4_MAIN_CURSEDSTAFF@2                                            : Adept's Cursed Staff
4548: T4_MAIN_CURSEDSTAFF@3                                            : Adept's Cursed Staff
4549: T5_MAIN_CURSEDSTAFF                                              : Expert's Cursed Staff
4550: T5_MAIN_CURSEDSTAFF@1                                            : Expert's Cursed Staff
4551: T5_MAIN_CURSEDSTAFF@2                                            : Expert's Cursed Staff
4552: T5_MAIN_CURSEDSTAFF@3                                            : Expert's Cursed Staff
4553: T6_MAIN_CURSEDSTAFF                                              : Master's Cursed Staff
4554: T6_MAIN_CURSEDSTAFF@1                                            : Master's Cursed Staff
4555: T6_MAIN_CURSEDSTAFF@2                                            : Master's Cursed Staff
4556: T6_MAIN_CURSEDSTAFF@3                                            : Master's Cursed Staff
4557: T7_MAIN_CURSEDSTAFF                                              : Grandmaster's Cursed Staff
4558: T7_MAIN_CURSEDSTAFF@1                                            : Grandmaster's Cursed Staff
4559: T7_MAIN_CURSEDSTAFF@2                                            : Grandmaster's Cursed Staff
4560: T7_MAIN_CURSEDSTAFF@3                                            : Grandmaster's Cursed Staff
4561: T8_MAIN_CURSEDSTAFF                                              : Elder's Cursed Staff
4562: T8_MAIN_CURSEDSTAFF@1                                            : Elder's Cursed Staff
4563: T8_MAIN_CURSEDSTAFF@2                                            : Elder's Cursed Staff
4564: T8_MAIN_CURSEDSTAFF@3                                            : Elder's Cursed Staff
4565: T4_2H_CURSEDSTAFF                                                : Adept's Great Cursed Staff
4566: T4_2H_CURSEDSTAFF@1                                              : Adept's Great Cursed Staff
4567: T4_2H_CURSEDSTAFF@2                                              : Adept's Great Cursed Staff
4568: T4_2H_CURSEDSTAFF@3                                              : Adept's Great Cursed Staff
4569: T5_2H_CURSEDSTAFF                                                : Expert's Great Cursed Staff
4570: T5_2H_CURSEDSTAFF@1                                              : Expert's Great Cursed Staff
4571: T5_2H_CURSEDSTAFF@2                                              : Expert's Great Cursed Staff
4572: T5_2H_CURSEDSTAFF@3                                              : Expert's Great Cursed Staff
4573: T6_2H_CURSEDSTAFF                                                : Master's Great Cursed Staff
4574: T6_2H_CURSEDSTAFF@1                                              : Master's Great Cursed Staff
4575: T6_2H_CURSEDSTAFF@2                                              : Master's Great Cursed Staff
4576: T6_2H_CURSEDSTAFF@3                                              : Master's Great Cursed Staff
4577: T7_2H_CURSEDSTAFF                                                : Grandmaster's Great Cursed Staff
4578: T7_2H_CURSEDSTAFF@1                                              : Grandmaster's Great Cursed Staff
4579: T7_2H_CURSEDSTAFF@2                                              : Grandmaster's Great Cursed Staff
4580: T7_2H_CURSEDSTAFF@3                                              : Grandmaster's Great Cursed Staff
4581: T8_2H_CURSEDSTAFF                                                : Elder's Great Cursed Staff
4582: T8_2H_CURSEDSTAFF@1                                              : Elder's Great Cursed Staff
4583: T8_2H_CURSEDSTAFF@2                                              : Elder's Great Cursed Staff
4584: T8_2H_CURSEDSTAFF@3                                              : Elder's Great Cursed Staff
4585: T4_2H_DEMONICSTAFF                                               : Adept's Demonic Staff
4586: T4_2H_DEMONICSTAFF@1                                             : Adept's Demonic Staff
4587: T4_2H_DEMONICSTAFF@2                                             : Adept's Demonic Staff
4588: T4_2H_DEMONICSTAFF@3                                             : Adept's Demonic Staff
4589: T5_2H_DEMONICSTAFF                                               : Expert's Demonic Staff
4590: T5_2H_DEMONICSTAFF@1                                             : Expert's Demonic Staff
4591: T5_2H_DEMONICSTAFF@2                                             : Expert's Demonic Staff
4592: T5_2H_DEMONICSTAFF@3                                             : Expert's Demonic Staff
4593: T6_2H_DEMONICSTAFF                                               : Master's Demonic Staff
4594: T6_2H_DEMONICSTAFF@1                                             : Master's Demonic Staff
4595: T6_2H_DEMONICSTAFF@2                                             : Master's Demonic Staff
4596: T6_2H_DEMONICSTAFF@3                                             : Master's Demonic Staff
4597: T7_2H_DEMONICSTAFF                                               : Grandmaster's Demonic Staff
4598: T7_2H_DEMONICSTAFF@1                                             : Grandmaster's Demonic Staff
4599: T7_2H_DEMONICSTAFF@2                                             : Grandmaster's Demonic Staff
4600: T7_2H_DEMONICSTAFF@3                                             : Grandmaster's Demonic Staff
4601: T8_2H_DEMONICSTAFF                                               : Elder's Demonic Staff
4602: T8_2H_DEMONICSTAFF@1                                             : Elder's Demonic Staff
4603: T8_2H_DEMONICSTAFF@2                                             : Elder's Demonic Staff
4604: T8_2H_DEMONICSTAFF@3                                             : Elder's Demonic Staff
4605: T4_MAIN_CURSEDSTAFF_UNDEAD                                       : Adept's Lifecurse Staff
4606: T4_MAIN_CURSEDSTAFF_UNDEAD@1                                     : Adept's Lifecurse Staff
4607: T4_MAIN_CURSEDSTAFF_UNDEAD@2                                     : Adept's Lifecurse Staff
4608: T4_MAIN_CURSEDSTAFF_UNDEAD@3                                     : Adept's Lifecurse Staff
4609: T5_MAIN_CURSEDSTAFF_UNDEAD                                       : Expert's Lifecurse Staff
4610: T5_MAIN_CURSEDSTAFF_UNDEAD@1                                     : Expert's Lifecurse Staff
4611: T5_MAIN_CURSEDSTAFF_UNDEAD@2                                     : Expert's Lifecurse Staff
4612: T5_MAIN_CURSEDSTAFF_UNDEAD@3                                     : Expert's Lifecurse Staff
4613: T6_MAIN_CURSEDSTAFF_UNDEAD                                       : Master's Lifecurse Staff
4614: T6_MAIN_CURSEDSTAFF_UNDEAD@1                                     : Master's Lifecurse Staff
4615: T6_MAIN_CURSEDSTAFF_UNDEAD@2                                     : Master's Lifecurse Staff
4616: T6_MAIN_CURSEDSTAFF_UNDEAD@3                                     : Master's Lifecurse Staff
4617: T7_MAIN_CURSEDSTAFF_UNDEAD                                       : Grandmaster's Lifecurse Staff
4618: T7_MAIN_CURSEDSTAFF_UNDEAD@1                                     : Grandmaster's Lifecurse Staff
4619: T7_MAIN_CURSEDSTAFF_UNDEAD@2                                     : Grandmaster's Lifecurse Staff
4620: T7_MAIN_CURSEDSTAFF_UNDEAD@3                                     : Grandmaster's Lifecurse Staff
4621: T8_MAIN_CURSEDSTAFF_UNDEAD                                       : Elder's Lifecurse Staff
4622: T8_MAIN_CURSEDSTAFF_UNDEAD@1                                     : Elder's Lifecurse Staff
4623: T8_MAIN_CURSEDSTAFF_UNDEAD@2                                     : Elder's Lifecurse Staff
4624: T8_MAIN_CURSEDSTAFF_UNDEAD@3                                     : Elder's Lifecurse Staff
4625: T4_2H_SKULLORB_HELL                                              : Adept's Cursed Skull
4626: T4_2H_SKULLORB_HELL@1                                            : Adept's Cursed Skull
4627: T4_2H_SKULLORB_HELL@2                                            : Adept's Cursed Skull
4628: T4_2H_SKULLORB_HELL@3                                            : Adept's Cursed Skull
4629: T5_2H_SKULLORB_HELL                                              : Expert's Cursed Skull
4630: T5_2H_SKULLORB_HELL@1                                            : Expert's Cursed Skull
4631: T5_2H_SKULLORB_HELL@2                                            : Expert's Cursed Skull
4632: T5_2H_SKULLORB_HELL@3                                            : Expert's Cursed Skull
4633: T6_2H_SKULLORB_HELL                                              : Master's Cursed Skull
4634: T6_2H_SKULLORB_HELL@1                                            : Master's Cursed Skull
4635: T6_2H_SKULLORB_HELL@2                                            : Master's Cursed Skull
4636: T6_2H_SKULLORB_HELL@3                                            : Master's Cursed Skull
4637: T7_2H_SKULLORB_HELL                                              : Grandmaster's Cursed Skull
4638: T7_2H_SKULLORB_HELL@1                                            : Grandmaster's Cursed Skull
4639: T7_2H_SKULLORB_HELL@2                                            : Grandmaster's Cursed Skull
4640: T7_2H_SKULLORB_HELL@3                                            : Grandmaster's Cursed Skull
4641: T8_2H_SKULLORB_HELL                                              : Elder's Cursed Skull
4642: T8_2H_SKULLORB_HELL@1                                            : Elder's Cursed Skull
4643: T8_2H_SKULLORB_HELL@2                                            : Elder's Cursed Skull
4644: T8_2H_SKULLORB_HELL@3                                            : Elder's Cursed Skull
4645: T4_2H_CURSEDSTAFF_MORGANA                                        : Adept's Damnation Staff
4646: T4_2H_CURSEDSTAFF_MORGANA@1                                      : Adept's Damnation Staff
4647: T4_2H_CURSEDSTAFF_MORGANA@2                                      : Adept's Damnation Staff
4648: T4_2H_CURSEDSTAFF_MORGANA@3                                      : Adept's Damnation Staff
4649: T5_2H_CURSEDSTAFF_MORGANA                                        : Expert's Damnation Staff
4650: T5_2H_CURSEDSTAFF_MORGANA@1                                      : Expert's Damnation Staff
4651: T5_2H_CURSEDSTAFF_MORGANA@2                                      : Expert's Damnation Staff
4652: T5_2H_CURSEDSTAFF_MORGANA@3                                      : Expert's Damnation Staff
4653: T6_2H_CURSEDSTAFF_MORGANA                                        : Master's Damnation Staff
4654: T6_2H_CURSEDSTAFF_MORGANA@1                                      : Master's Damnation Staff
4655: T6_2H_CURSEDSTAFF_MORGANA@2                                      : Master's Damnation Staff
4656: T6_2H_CURSEDSTAFF_MORGANA@3                                      : Master's Damnation Staff
4657: T7_2H_CURSEDSTAFF_MORGANA                                        : Grandmaster's Damnation Staff
4658: T7_2H_CURSEDSTAFF_MORGANA@1                                      : Grandmaster's Damnation Staff
4659: T7_2H_CURSEDSTAFF_MORGANA@2                                      : Grandmaster's Damnation Staff
4660: T7_2H_CURSEDSTAFF_MORGANA@3                                      : Grandmaster's Damnation Staff
4661: T8_2H_CURSEDSTAFF_MORGANA                                        : Elder's Damnation Staff
4662: T8_2H_CURSEDSTAFF_MORGANA@1                                      : Elder's Damnation Staff
4663: T8_2H_CURSEDSTAFF_MORGANA@2                                      : Elder's Damnation Staff
4664: T8_2H_CURSEDSTAFF_MORGANA@3                                      : Elder's Damnation Staff
4665: T2_MAIN_FIRESTAFF                                                : Novice's Fire Staff
4666: T3_MAIN_FIRESTAFF                                                : Journeyman's Fire Staff
4667: T4_MAIN_FIRESTAFF                                                : Adept's Fire Staff
4668: T4_MAIN_FIRESTAFF@1                                              : Adept's Fire Staff
4669: T4_MAIN_FIRESTAFF@2                                              : Adept's Fire Staff
4670: T4_MAIN_FIRESTAFF@3                                              : Adept's Fire Staff
4671: T5_MAIN_FIRESTAFF                                                : Expert's Fire Staff
4672: T5_MAIN_FIRESTAFF@1                                              : Expert's Fire Staff
4673: T5_MAIN_FIRESTAFF@2                                              : Expert's Fire Staff
4674: T5_MAIN_FIRESTAFF@3                                              : Expert's Fire Staff
4675: T6_MAIN_FIRESTAFF                                                : Master's Fire Staff
4676: T6_MAIN_FIRESTAFF@1                                              : Master's Fire Staff
4677: T6_MAIN_FIRESTAFF@2                                              : Master's Fire Staff
4678: T6_MAIN_FIRESTAFF@3                                              : Master's Fire Staff
4679: T7_MAIN_FIRESTAFF                                                : Grandmaster's Fire Staff
4680: T7_MAIN_FIRESTAFF@1                                              : Grandmaster's Fire Staff
4681: T7_MAIN_FIRESTAFF@2                                              : Grandmaster's Fire Staff
4682: T7_MAIN_FIRESTAFF@3                                              : Grandmaster's Fire Staff
4683: T8_MAIN_FIRESTAFF                                                : Elder's Fire Staff
4684: T8_MAIN_FIRESTAFF@1                                              : Elder's Fire Staff
4685: T8_MAIN_FIRESTAFF@2                                              : Elder's Fire Staff
4686: T8_MAIN_FIRESTAFF@3                                              : Elder's Fire Staff
4687: T4_2H_FIRESTAFF                                                  : Adept's Great Fire Staff
4688: T4_2H_FIRESTAFF@1                                                : Adept's Great Fire Staff
4689: T4_2H_FIRESTAFF@2                                                : Adept's Great Fire Staff
4690: T4_2H_FIRESTAFF@3                                                : Adept's Great Fire Staff
4691: T5_2H_FIRESTAFF                                                  : Expert's Great Fire Staff
4692: T5_2H_FIRESTAFF@1                                                : Expert's Great Fire Staff
4693: T5_2H_FIRESTAFF@2                                                : Expert's Great Fire Staff
4694: T5_2H_FIRESTAFF@3                                                : Expert's Great Fire Staff
4695: T6_2H_FIRESTAFF                                                  : Master's Great Fire Staff
4696: T6_2H_FIRESTAFF@1                                                : Master's Great Fire Staff
4697: T6_2H_FIRESTAFF@2                                                : Master's Great Fire Staff
4698: T6_2H_FIRESTAFF@3                                                : Master's Great Fire Staff
4699: T7_2H_FIRESTAFF                                                  : Grandmaster's Great Fire Staff
4700: T7_2H_FIRESTAFF@1                                                : Grandmaster's Great Fire Staff
4701: T7_2H_FIRESTAFF@2                                                : Grandmaster's Great Fire Staff
4702: T7_2H_FIRESTAFF@3                                                : Grandmaster's Great Fire Staff
4703: T8_2H_FIRESTAFF                                                  : Vendetta's Wrath
4704: T8_2H_FIRESTAFF@1                                                : Vendetta's Wrath
4705: T8_2H_FIRESTAFF@2                                                : Vendetta's Wrath
4706: T8_2H_FIRESTAFF@3                                                : Vendetta's Wrath
4707: T4_2H_INFERNOSTAFF                                               : Adept's Infernal Staff
4708: T4_2H_INFERNOSTAFF@1                                             : Adept's Infernal Staff
4709: T4_2H_INFERNOSTAFF@2                                             : Adept's Infernal Staff
4710: T4_2H_INFERNOSTAFF@3                                             : Adept's Infernal Staff
4711: T5_2H_INFERNOSTAFF                                               : Expert's Infernal Staff
4712: T5_2H_INFERNOSTAFF@1                                             : Expert's Infernal Staff
4713: T5_2H_INFERNOSTAFF@2                                             : Expert's Infernal Staff
4714: T5_2H_INFERNOSTAFF@3                                             : Expert's Infernal Staff
4715: T6_2H_INFERNOSTAFF                                               : Master's Infernal Staff
4716: T6_2H_INFERNOSTAFF@1                                             : Master's Infernal Staff
4717: T6_2H_INFERNOSTAFF@2                                             : Master's Infernal Staff
4718: T6_2H_INFERNOSTAFF@3                                             : Master's Infernal Staff
4719: T7_2H_INFERNOSTAFF                                               : Grandmaster's Infernal Staff
4720: T7_2H_INFERNOSTAFF@1                                             : Grandmaster's Infernal Staff
4721: T7_2H_INFERNOSTAFF@2                                             : Grandmaster's Infernal Staff
4722: T7_2H_INFERNOSTAFF@3                                             : Grandmaster's Infernal Staff
4723: T8_2H_INFERNOSTAFF                                               : Elder's Infernal Staff
4724: T8_2H_INFERNOSTAFF@1                                             : Elder's Infernal Staff
4725: T8_2H_INFERNOSTAFF@2                                             : Elder's Infernal Staff
4726: T8_2H_INFERNOSTAFF@3                                             : Elder's Infernal Staff
4727: T4_MAIN_FIRESTAFF_KEEPER                                         : Adept's Wildfire Staff
4728: T4_MAIN_FIRESTAFF_KEEPER@1                                       : Adept's Wildfire Staff
4729: T4_MAIN_FIRESTAFF_KEEPER@2                                       : Adept's Wildfire Staff
4730: T4_MAIN_FIRESTAFF_KEEPER@3                                       : Adept's Wildfire Staff
4731: T5_MAIN_FIRESTAFF_KEEPER                                         : Expert's Wildfire Staff
4732: T5_MAIN_FIRESTAFF_KEEPER@1                                       : Expert's Wildfire Staff
4733: T5_MAIN_FIRESTAFF_KEEPER@2                                       : Expert's Wildfire Staff
4734: T5_MAIN_FIRESTAFF_KEEPER@3                                       : Expert's Wildfire Staff
4735: T6_MAIN_FIRESTAFF_KEEPER                                         : Master's Wildfire Staff
4736: T6_MAIN_FIRESTAFF_KEEPER@1                                       : Master's Wildfire Staff
4737: T6_MAIN_FIRESTAFF_KEEPER@2                                       : Master's Wildfire Staff
4738: T6_MAIN_FIRESTAFF_KEEPER@3                                       : Master's Wildfire Staff
4739: T7_MAIN_FIRESTAFF_KEEPER                                         : Grandmaster's Wildfire Staff
4740: T7_MAIN_FIRESTAFF_KEEPER@1                                       : Grandmaster's Wildfire Staff
4741: T7_MAIN_FIRESTAFF_KEEPER@2                                       : Grandmaster's Wildfire Staff
4742: T7_MAIN_FIRESTAFF_KEEPER@3                                       : Grandmaster's Wildfire Staff
4743: T8_MAIN_FIRESTAFF_KEEPER                                         : Elder's Wildfire Staff
4744: T8_MAIN_FIRESTAFF_KEEPER@1                                       : Elder's Wildfire Staff
4745: T8_MAIN_FIRESTAFF_KEEPER@2                                       : Elder's Wildfire Staff
4746: T8_MAIN_FIRESTAFF_KEEPER@3                                       : Elder's Wildfire Staff
4747: T4_2H_FIRESTAFF_HELL                                             : Adept's Brimstone Staff
4748: T4_2H_FIRESTAFF_HELL@1                                           : Adept's Brimstone Staff
4749: T4_2H_FIRESTAFF_HELL@2                                           : Adept's Brimstone Staff
4750: T4_2H_FIRESTAFF_HELL@3                                           : Adept's Brimstone Staff
4751: T5_2H_FIRESTAFF_HELL                                             : Expert's Brimstone Staff
4752: T5_2H_FIRESTAFF_HELL@1                                           : Expert's Brimstone Staff
4753: T5_2H_FIRESTAFF_HELL@2                                           : Expert's Brimstone Staff
4754: T5_2H_FIRESTAFF_HELL@3                                           : Expert's Brimstone Staff
4755: T6_2H_FIRESTAFF_HELL                                             : Master's Brimstone Staff
4756: T6_2H_FIRESTAFF_HELL@1                                           : Master's Brimstone Staff
4757: T6_2H_FIRESTAFF_HELL@2                                           : Master's Brimstone Staff
4758: T6_2H_FIRESTAFF_HELL@3                                           : Master's Brimstone Staff
4759: T7_2H_FIRESTAFF_HELL                                             : Grandmaster's Brimstone Staff
4760: T7_2H_FIRESTAFF_HELL@1                                           : Grandmaster's Brimstone Staff
4761: T7_2H_FIRESTAFF_HELL@2                                           : Grandmaster's Brimstone Staff
4762: T7_2H_FIRESTAFF_HELL@3                                           : Grandmaster's Brimstone Staff
4763: T8_2H_FIRESTAFF_HELL                                             : Elder's Brimstone Staff
4764: T8_2H_FIRESTAFF_HELL@1                                           : Elder's Brimstone Staff
4765: T8_2H_FIRESTAFF_HELL@2                                           : Elder's Brimstone Staff
4766: T8_2H_FIRESTAFF_HELL@3                                           : Elder's Brimstone Staff
4767: T4_2H_INFERNOSTAFF_MORGANA                                       : Adept's Blazing Staff
4768: T4_2H_INFERNOSTAFF_MORGANA@1                                     : Adept's Blazing Staff
4769: T4_2H_INFERNOSTAFF_MORGANA@2                                     : Adept's Blazing Staff
4770: T4_2H_INFERNOSTAFF_MORGANA@3                                     : Adept's Blazing Staff
4771: T5_2H_INFERNOSTAFF_MORGANA                                       : Expert's Blazing Staff
4772: T5_2H_INFERNOSTAFF_MORGANA@1                                     : Expert's Blazing Staff
4773: T5_2H_INFERNOSTAFF_MORGANA@2                                     : Expert's Blazing Staff
4774: T5_2H_INFERNOSTAFF_MORGANA@3                                     : Expert's Blazing Staff
4775: T6_2H_INFERNOSTAFF_MORGANA                                       : Master's Blazing Staff
4776: T6_2H_INFERNOSTAFF_MORGANA@1                                     : Master's Blazing Staff
4777: T6_2H_INFERNOSTAFF_MORGANA@2                                     : Master's Blazing Staff
4778: T6_2H_INFERNOSTAFF_MORGANA@3                                     : Master's Blazing Staff
4779: T7_2H_INFERNOSTAFF_MORGANA                                       : Grandmaster's Blazing Staff
4780: T7_2H_INFERNOSTAFF_MORGANA@1                                     : Grandmaster's Blazing Staff
4781: T7_2H_INFERNOSTAFF_MORGANA@2                                     : Grandmaster's Blazing Staff
4782: T7_2H_INFERNOSTAFF_MORGANA@3                                     : Grandmaster's Blazing Staff
4783: T8_2H_INFERNOSTAFF_MORGANA                                       : Elder's Blazing Staff
4784: T8_2H_INFERNOSTAFF_MORGANA@1                                     : Elder's Blazing Staff
4785: T8_2H_INFERNOSTAFF_MORGANA@2                                     : Elder's Blazing Staff
4786: T8_2H_INFERNOSTAFF_MORGANA@3                                     : Elder's Blazing Staff
4787: T3_MAIN_FROSTSTAFF                                               : Journeyman's Frost Staff
4788: T4_MAIN_FROSTSTAFF                                               : Adept's Frost Staff
4789: T4_MAIN_FROSTSTAFF@1                                             : Adept's Frost Staff
4790: T4_MAIN_FROSTSTAFF@2                                             : Adept's Frost Staff
4791: T4_MAIN_FROSTSTAFF@3                                             : Adept's Frost Staff
4792: T5_MAIN_FROSTSTAFF                                               : Expert's Frost Staff
4793: T5_MAIN_FROSTSTAFF@1                                             : Expert's Frost Staff
4794: T5_MAIN_FROSTSTAFF@2                                             : Expert's Frost Staff
4795: T5_MAIN_FROSTSTAFF@3                                             : Expert's Frost Staff
4796: T6_MAIN_FROSTSTAFF                                               : Master's Frost Staff
4797: T6_MAIN_FROSTSTAFF@1                                             : Master's Frost Staff
4798: T6_MAIN_FROSTSTAFF@2                                             : Master's Frost Staff
4799: T6_MAIN_FROSTSTAFF@3                                             : Master's Frost Staff
4800: T7_MAIN_FROSTSTAFF                                               : Grandmaster's Frost Staff
4801: T7_MAIN_FROSTSTAFF@1                                             : Grandmaster's Frost Staff
4802: T7_MAIN_FROSTSTAFF@2                                             : Grandmaster's Frost Staff
4803: T7_MAIN_FROSTSTAFF@3                                             : Grandmaster's Frost Staff
4804: T8_MAIN_FROSTSTAFF                                               : Elder's Frost Staff
4805: T8_MAIN_FROSTSTAFF@1                                             : Elder's Frost Staff
4806: T8_MAIN_FROSTSTAFF@2                                             : Elder's Frost Staff
4807: T8_MAIN_FROSTSTAFF@3                                             : Elder's Frost Staff
4808: T4_2H_FROSTSTAFF                                                 : Adept's Great Frost Staff
4809: T4_2H_FROSTSTAFF@1                                               : Adept's Great Frost Staff
4810: T4_2H_FROSTSTAFF@2                                               : Adept's Great Frost Staff
4811: T4_2H_FROSTSTAFF@3                                               : Adept's Great Frost Staff
4812: T5_2H_FROSTSTAFF                                                 : Expert's Great Frost Staff
4813: T5_2H_FROSTSTAFF@1                                               : Expert's Great Frost Staff
4814: T5_2H_FROSTSTAFF@2                                               : Expert's Great Frost Staff
4815: T5_2H_FROSTSTAFF@3                                               : Expert's Great Frost Staff
4816: T6_2H_FROSTSTAFF                                                 : Master's Great Frost Staff
4817: T6_2H_FROSTSTAFF@1                                               : Master's Great Frost Staff
4818: T6_2H_FROSTSTAFF@2                                               : Master's Great Frost Staff
4819: T6_2H_FROSTSTAFF@3                                               : Master's Great Frost Staff
4820: T7_2H_FROSTSTAFF                                                 : Grandmaster's Great Frost Staff
4821: T7_2H_FROSTSTAFF@1                                               : Grandmaster's Great Frost Staff
4822: T7_2H_FROSTSTAFF@2                                               : Grandmaster's Great Frost Staff
4823: T7_2H_FROSTSTAFF@3                                               : Grandmaster's Great Frost Staff
4824: T8_2H_FROSTSTAFF                                                 : Elder's Great Frost Staff
4825: T8_2H_FROSTSTAFF@1                                               : Elder's Great Frost Staff
4826: T8_2H_FROSTSTAFF@2                                               : Elder's Great Frost Staff
4827: T8_2H_FROSTSTAFF@3                                               : Elder's Great Frost Staff
4828: T4_2H_GLACIALSTAFF                                               : Adept's Glacial Staff
4829: T4_2H_GLACIALSTAFF@1                                             : Adept's Glacial Staff
4830: T4_2H_GLACIALSTAFF@2                                             : Adept's Glacial Staff
4831: T4_2H_GLACIALSTAFF@3                                             : Adept's Glacial Staff
4832: T5_2H_GLACIALSTAFF                                               : Expert's Glacial Staff
4833: T5_2H_GLACIALSTAFF@1                                             : Expert's Glacial Staff
4834: T5_2H_GLACIALSTAFF@2                                             : Expert's Glacial Staff
4835: T5_2H_GLACIALSTAFF@3                                             : Expert's Glacial Staff
4836: T6_2H_GLACIALSTAFF                                               : Master's Glacial Staff
4837: T6_2H_GLACIALSTAFF@1                                             : Master's Glacial Staff
4838: T6_2H_GLACIALSTAFF@2                                             : Master's Glacial Staff
4839: T6_2H_GLACIALSTAFF@3                                             : Master's Glacial Staff
4840: T7_2H_GLACIALSTAFF                                               : Grandmaster's Glacial Staff
4841: T7_2H_GLACIALSTAFF@1                                             : Grandmaster's Glacial Staff
4842: T7_2H_GLACIALSTAFF@2                                             : Grandmaster's Glacial Staff
4843: T7_2H_GLACIALSTAFF@3                                             : Grandmaster's Glacial Staff
4844: T8_2H_GLACIALSTAFF                                               : Elder's Glacial Staff
4845: T8_2H_GLACIALSTAFF@1                                             : Elder's Glacial Staff
4846: T8_2H_GLACIALSTAFF@2                                             : Elder's Glacial Staff
4847: T8_2H_GLACIALSTAFF@3                                             : Elder's Glacial Staff
4848: T4_MAIN_FROSTSTAFF_KEEPER                                        : Adept's Hoarfrost Staff
4849: T4_MAIN_FROSTSTAFF_KEEPER@1                                      : Adept's Hoarfrost Staff
4850: T4_MAIN_FROSTSTAFF_KEEPER@2                                      : Adept's Hoarfrost Staff
4851: T4_MAIN_FROSTSTAFF_KEEPER@3                                      : Adept's Hoarfrost Staff
4852: T5_MAIN_FROSTSTAFF_KEEPER                                        : Expert's Hoarfrost Staff
4853: T5_MAIN_FROSTSTAFF_KEEPER@1                                      : Expert's Hoarfrost Staff
4854: T5_MAIN_FROSTSTAFF_KEEPER@2                                      : Expert's Hoarfrost Staff
4855: T5_MAIN_FROSTSTAFF_KEEPER@3                                      : Expert's Hoarfrost Staff
4856: T6_MAIN_FROSTSTAFF_KEEPER                                        : Master's Hoarfrost Staff
4857: T6_MAIN_FROSTSTAFF_KEEPER@1                                      : Master's Hoarfrost Staff
4858: T6_MAIN_FROSTSTAFF_KEEPER@2                                      : Master's Hoarfrost Staff
4859: T6_MAIN_FROSTSTAFF_KEEPER@3                                      : Master's Hoarfrost Staff
4860: T7_MAIN_FROSTSTAFF_KEEPER                                        : Grandmaster's Hoarfrost Staff
4861: T7_MAIN_FROSTSTAFF_KEEPER@1                                      : Grandmaster's Hoarfrost Staff
4862: T7_MAIN_FROSTSTAFF_KEEPER@2                                      : Grandmaster's Hoarfrost Staff
4863: T7_MAIN_FROSTSTAFF_KEEPER@3                                      : Grandmaster's Hoarfrost Staff
4864: T8_MAIN_FROSTSTAFF_KEEPER                                        : Elder's Hoarfrost Staff
4865: T8_MAIN_FROSTSTAFF_KEEPER@1                                      : Elder's Hoarfrost Staff
4866: T8_MAIN_FROSTSTAFF_KEEPER@2                                      : Elder's Hoarfrost Staff
4867: T8_MAIN_FROSTSTAFF_KEEPER@3                                      : Elder's Hoarfrost Staff
4868: T4_2H_ICEGAUNTLETS_HELL                                          : Adept's Icicle Staff
4869: T4_2H_ICEGAUNTLETS_HELL@1                                        : Adept's Icicle Staff
4870: T4_2H_ICEGAUNTLETS_HELL@2                                        : Adept's Icicle Staff
4871: T4_2H_ICEGAUNTLETS_HELL@3                                        : Adept's Icicle Staff
4872: T5_2H_ICEGAUNTLETS_HELL                                          : Expert's Icicle Staff
4873: T5_2H_ICEGAUNTLETS_HELL@1                                        : Expert's Icicle Staff
4874: T5_2H_ICEGAUNTLETS_HELL@2                                        : Expert's Icicle Staff
4875: T5_2H_ICEGAUNTLETS_HELL@3                                        : Expert's Icicle Staff
4876: T6_2H_ICEGAUNTLETS_HELL                                          : Master's Icicle Staff
4877: T6_2H_ICEGAUNTLETS_HELL@1                                        : Master's Icicle Staff
4878: T6_2H_ICEGAUNTLETS_HELL@2                                        : Master's Icicle Staff
4879: T6_2H_ICEGAUNTLETS_HELL@3                                        : Master's Icicle Staff
4880: T7_2H_ICEGAUNTLETS_HELL                                          : Grandmaster's Icicle Staff
4881: T7_2H_ICEGAUNTLETS_HELL@1                                        : Grandmaster's Icicle Staff
4882: T7_2H_ICEGAUNTLETS_HELL@2                                        : Grandmaster's Icicle Staff
4883: T7_2H_ICEGAUNTLETS_HELL@3                                        : Grandmaster's Icicle Staff
4884: T8_2H_ICEGAUNTLETS_HELL                                          : Elder's Icicle Staff
4885: T8_2H_ICEGAUNTLETS_HELL@1                                        : Elder's Icicle Staff
4886: T8_2H_ICEGAUNTLETS_HELL@2                                        : Elder's Icicle Staff
4887: T8_2H_ICEGAUNTLETS_HELL@3                                        : Elder's Icicle Staff
4888: T4_2H_ICECRYSTAL_UNDEAD                                          : Adept's Permafrost Prism
4889: T4_2H_ICECRYSTAL_UNDEAD@1                                        : Adept's Permafrost Prism
4890: T4_2H_ICECRYSTAL_UNDEAD@2                                        : Adept's Permafrost Prism
4891: T4_2H_ICECRYSTAL_UNDEAD@3                                        : Adept's Permafrost Prism
4892: T5_2H_ICECRYSTAL_UNDEAD                                          : Expert's Permafrost Prism
4893: T5_2H_ICECRYSTAL_UNDEAD@1                                        : Expert's Permafrost Prism
4894: T5_2H_ICECRYSTAL_UNDEAD@2                                        : Expert's Permafrost Prism
4895: T5_2H_ICECRYSTAL_UNDEAD@3                                        : Expert's Permafrost Prism
4896: T6_2H_ICECRYSTAL_UNDEAD                                          : Master's Permafrost Prism
4897: T6_2H_ICECRYSTAL_UNDEAD@1                                        : Master's Permafrost Prism
4898: T6_2H_ICECRYSTAL_UNDEAD@2                                        : Master's Permafrost Prism
4899: T6_2H_ICECRYSTAL_UNDEAD@3                                        : Master's Permafrost Prism
4900: T7_2H_ICECRYSTAL_UNDEAD                                          : Grandmaster's Permafrost Prism
4901: T7_2H_ICECRYSTAL_UNDEAD@1                                        : Grandmaster's Permafrost Prism
4902: T7_2H_ICECRYSTAL_UNDEAD@2                                        : Grandmaster's Permafrost Prism
4903: T7_2H_ICECRYSTAL_UNDEAD@3                                        : Grandmaster's Permafrost Prism
4904: T8_2H_ICECRYSTAL_UNDEAD                                          : Elder's Permafrost Prism
4905: T8_2H_ICECRYSTAL_UNDEAD@1                                        : Elder's Permafrost Prism
4906: T8_2H_ICECRYSTAL_UNDEAD@2                                        : Elder's Permafrost Prism
4907: T8_2H_ICECRYSTAL_UNDEAD@3                                        : Elder's Permafrost Prism
4908: T3_MAIN_ARCANESTAFF                                              : Journeyman's Arcane Staff
4909: T4_MAIN_ARCANESTAFF                                              : Adept's Arcane Staff
4910: T4_MAIN_ARCANESTAFF@1                                            : Adept's Arcane Staff
4911: T4_MAIN_ARCANESTAFF@2                                            : Adept's Arcane Staff
4912: T4_MAIN_ARCANESTAFF@3                                            : Adept's Arcane Staff
4913: T5_MAIN_ARCANESTAFF                                              : Expert's Arcane Staff
4914: T5_MAIN_ARCANESTAFF@1                                            : Expert's Arcane Staff
4915: T5_MAIN_ARCANESTAFF@2                                            : Expert's Arcane Staff
4916: T5_MAIN_ARCANESTAFF@3                                            : Expert's Arcane Staff
4917: T6_MAIN_ARCANESTAFF                                              : Master's Arcane Staff
4918: T6_MAIN_ARCANESTAFF@1                                            : Master's Arcane Staff
4919: T6_MAIN_ARCANESTAFF@2                                            : Master's Arcane Staff
4920: T6_MAIN_ARCANESTAFF@3                                            : Master's Arcane Staff
4921: T7_MAIN_ARCANESTAFF                                              : Grandmaster's Arcane Staff
4922: T7_MAIN_ARCANESTAFF@1                                            : Grandmaster's Arcane Staff
4923: T7_MAIN_ARCANESTAFF@2                                            : Grandmaster's Arcane Staff
4924: T7_MAIN_ARCANESTAFF@3                                            : Grandmaster's Arcane Staff
4925: T8_MAIN_ARCANESTAFF                                              : Elder's Arcane Staff
4926: T8_MAIN_ARCANESTAFF@1                                            : Elder's Arcane Staff
4927: T8_MAIN_ARCANESTAFF@2                                            : Elder's Arcane Staff
4928: T8_MAIN_ARCANESTAFF@3                                            : Elder's Arcane Staff
4929: T4_2H_ARCANESTAFF                                                : Adept's Great Arcane Staff
4930: T4_2H_ARCANESTAFF@1                                              : Adept's Great Arcane Staff
4931: T4_2H_ARCANESTAFF@2                                              : Adept's Great Arcane Staff
4932: T4_2H_ARCANESTAFF@3                                              : Adept's Great Arcane Staff
4933: T5_2H_ARCANESTAFF                                                : Expert's Great Arcane Staff
4934: T5_2H_ARCANESTAFF@1                                              : Expert's Great Arcane Staff
4935: T5_2H_ARCANESTAFF@2                                              : Expert's Great Arcane Staff
4936: T5_2H_ARCANESTAFF@3                                              : Expert's Great Arcane Staff
4937: T6_2H_ARCANESTAFF                                                : Master's Great Arcane Staff
4938: T6_2H_ARCANESTAFF@1                                              : Master's Great Arcane Staff
4939: T6_2H_ARCANESTAFF@2                                              : Master's Great Arcane Staff
4940: T6_2H_ARCANESTAFF@3                                              : Master's Great Arcane Staff
4941: T7_2H_ARCANESTAFF                                                : Grandmaster's Great Arcane Staff
4942: T7_2H_ARCANESTAFF@1                                              : Grandmaster's Great Arcane Staff
4943: T7_2H_ARCANESTAFF@2                                              : Grandmaster's Great Arcane Staff
4944: T7_2H_ARCANESTAFF@3                                              : Grandmaster's Great Arcane Staff
4945: T8_2H_ARCANESTAFF                                                : Elder's Great Arcane Staff
4946: T8_2H_ARCANESTAFF@1                                              : Elder's Great Arcane Staff
4947: T8_2H_ARCANESTAFF@2                                              : Elder's Great Arcane Staff
4948: T8_2H_ARCANESTAFF@3                                              : Elder's Great Arcane Staff
4949: T4_2H_ENIGMATICSTAFF                                             : Adept's Enigmatic Staff
4950: T4_2H_ENIGMATICSTAFF@1                                           : Adept's Enigmatic Staff
4951: T4_2H_ENIGMATICSTAFF@2                                           : Adept's Enigmatic Staff
4952: T4_2H_ENIGMATICSTAFF@3                                           : Adept's Enigmatic Staff
4953: T5_2H_ENIGMATICSTAFF                                             : Expert's Enigmatic Staff
4954: T5_2H_ENIGMATICSTAFF@1                                           : Expert's Enigmatic Staff
4955: T5_2H_ENIGMATICSTAFF@2                                           : Expert's Enigmatic Staff
4956: T5_2H_ENIGMATICSTAFF@3                                           : Expert's Enigmatic Staff
4957: T6_2H_ENIGMATICSTAFF                                             : Master's Enigmatic Staff
4958: T6_2H_ENIGMATICSTAFF@1                                           : Master's Enigmatic Staff
4959: T6_2H_ENIGMATICSTAFF@2                                           : Master's Enigmatic Staff
4960: T6_2H_ENIGMATICSTAFF@3                                           : Master's Enigmatic Staff
4961: T7_2H_ENIGMATICSTAFF                                             : Grandmaster's Enigmatic Staff
4962: T7_2H_ENIGMATICSTAFF@1                                           : Grandmaster's Enigmatic Staff
4963: T7_2H_ENIGMATICSTAFF@2                                           : Grandmaster's Enigmatic Staff
4964: T7_2H_ENIGMATICSTAFF@3                                           : Grandmaster's Enigmatic Staff
4965: T8_2H_ENIGMATICSTAFF                                             : Elder's Enigmatic Staff
4966: T8_2H_ENIGMATICSTAFF@1                                           : Elder's Enigmatic Staff
4967: T8_2H_ENIGMATICSTAFF@2                                           : Elder's Enigmatic Staff
4968: T8_2H_ENIGMATICSTAFF@3                                           : Elder's Enigmatic Staff
4969: T4_MAIN_ARCANESTAFF_UNDEAD                                       : Adept's Witchwork Staff
4970: T4_MAIN_ARCANESTAFF_UNDEAD@1                                     : Adept's Witchwork Staff
4971: T4_MAIN_ARCANESTAFF_UNDEAD@2                                     : Adept's Witchwork Staff
4972: T4_MAIN_ARCANESTAFF_UNDEAD@3                                     : Adept's Witchwork Staff
4973: T5_MAIN_ARCANESTAFF_UNDEAD                                       : Expert's Witchwork Staff
4974: T5_MAIN_ARCANESTAFF_UNDEAD@1                                     : Expert's Witchwork Staff
4975: T5_MAIN_ARCANESTAFF_UNDEAD@2                                     : Expert's Witchwork Staff
4976: T5_MAIN_ARCANESTAFF_UNDEAD@3                                     : Expert's Witchwork Staff
4977: T6_MAIN_ARCANESTAFF_UNDEAD                                       : Master's Witchwork Staff
4978: T6_MAIN_ARCANESTAFF_UNDEAD@1                                     : Master's Witchwork Staff
4979: T6_MAIN_ARCANESTAFF_UNDEAD@2                                     : Master's Witchwork Staff
4980: T6_MAIN_ARCANESTAFF_UNDEAD@3                                     : Master's Witchwork Staff
4981: T7_MAIN_ARCANESTAFF_UNDEAD                                       : Grandmaster's Witchwork Staff
4982: T7_MAIN_ARCANESTAFF_UNDEAD@1                                     : Grandmaster's Witchwork Staff
4983: T7_MAIN_ARCANESTAFF_UNDEAD@2                                     : Grandmaster's Witchwork Staff
4984: T7_MAIN_ARCANESTAFF_UNDEAD@3                                     : Grandmaster's Witchwork Staff
4985: T8_MAIN_ARCANESTAFF_UNDEAD                                       : Elder's Witchwork Staff
4986: T8_MAIN_ARCANESTAFF_UNDEAD@1                                     : Elder's Witchwork Staff
4987: T8_MAIN_ARCANESTAFF_UNDEAD@2                                     : Elder's Witchwork Staff
4988: T8_MAIN_ARCANESTAFF_UNDEAD@3                                     : Elder's Witchwork Staff
4989: T4_2H_ARCANESTAFF_HELL                                           : Adept's Occult Staff
4990: T4_2H_ARCANESTAFF_HELL@1                                         : Adept's Occult Staff
4991: T4_2H_ARCANESTAFF_HELL@2                                         : Adept's Occult Staff
4992: T4_2H_ARCANESTAFF_HELL@3                                         : Adept's Occult Staff
4993: T5_2H_ARCANESTAFF_HELL                                           : Expert's Occult Staff
4994: T5_2H_ARCANESTAFF_HELL@1                                         : Expert's Occult Staff
4995: T5_2H_ARCANESTAFF_HELL@2                                         : Expert's Occult Staff
4996: T5_2H_ARCANESTAFF_HELL@3                                         : Expert's Occult Staff
4997: T6_2H_ARCANESTAFF_HELL                                           : Master's Occult Staff
4998: T6_2H_ARCANESTAFF_HELL@1                                         : Master's Occult Staff
4999: T6_2H_ARCANESTAFF_HELL@2                                         : Master's Occult Staff
5000: T6_2H_ARCANESTAFF_HELL@3                                         : Master's Occult Staff
5001: T7_2H_ARCANESTAFF_HELL                                           : Grandmaster's Occult Staff
5002: T7_2H_ARCANESTAFF_HELL@1                                         : Grandmaster's Occult Staff
5003: T7_2H_ARCANESTAFF_HELL@2                                         : Grandmaster's Occult Staff
5004: T7_2H_ARCANESTAFF_HELL@3                                         : Grandmaster's Occult Staff
5005: T8_2H_ARCANESTAFF_HELL                                           : Elder's Occult Staff
5006: T8_2H_ARCANESTAFF_HELL@1                                         : Elder's Occult Staff
5007: T8_2H_ARCANESTAFF_HELL@2                                         : Elder's Occult Staff
5008: T8_2H_ARCANESTAFF_HELL@3                                         : Elder's Occult Staff
5009: T4_2H_ENIGMATICORB_MORGANA                                       : Adept's Malevolent Locus
5010: T4_2H_ENIGMATICORB_MORGANA@1                                     : Adept's Malevolent Locus
5011: T4_2H_ENIGMATICORB_MORGANA@2                                     : Adept's Malevolent Locus
5012: T4_2H_ENIGMATICORB_MORGANA@3                                     : Adept's Malevolent Locus
5013: T5_2H_ENIGMATICORB_MORGANA                                       : Expert's Malevolent Locus
5014: T5_2H_ENIGMATICORB_MORGANA@1                                     : Expert's Malevolent Locus
5015: T5_2H_ENIGMATICORB_MORGANA@2                                     : Expert's Malevolent Locus
5016: T5_2H_ENIGMATICORB_MORGANA@3                                     : Expert's Malevolent Locus
5017: T6_2H_ENIGMATICORB_MORGANA                                       : Master's Malevolent Locus
5018: T6_2H_ENIGMATICORB_MORGANA@1                                     : Master's Malevolent Locus
5019: T6_2H_ENIGMATICORB_MORGANA@2                                     : Master's Malevolent Locus
5020: T6_2H_ENIGMATICORB_MORGANA@3                                     : Master's Malevolent Locus
5021: T7_2H_ENIGMATICORB_MORGANA                                       : Grandmaster's Malevolent Locus
5022: T7_2H_ENIGMATICORB_MORGANA@1                                     : Grandmaster's Malevolent Locus
5023: T7_2H_ENIGMATICORB_MORGANA@2                                     : Grandmaster's Malevolent Locus
5024: T7_2H_ENIGMATICORB_MORGANA@3                                     : Grandmaster's Malevolent Locus
5025: T8_2H_ENIGMATICORB_MORGANA                                       : Elder's Malevolent Locus
5026: T8_2H_ENIGMATICORB_MORGANA@1                                     : Elder's Malevolent Locus
5027: T8_2H_ENIGMATICORB_MORGANA@2                                     : Elder's Malevolent Locus
5028: T8_2H_ENIGMATICORB_MORGANA@3                                     : Elder's Malevolent Locus
5029: T3_MAIN_HOLYSTAFF                                                : Journeyman's Holy Staff
5030: T4_MAIN_HOLYSTAFF                                                : Adept's Holy Staff
5031: T4_MAIN_HOLYSTAFF@1                                              : Adept's Holy Staff
5032: T4_MAIN_HOLYSTAFF@2                                              : Adept's Holy Staff
5033: T4_MAIN_HOLYSTAFF@3                                              : Adept's Holy Staff
5034: T5_MAIN_HOLYSTAFF                                                : Expert's Holy Staff
5035: T5_MAIN_HOLYSTAFF@1                                              : Expert's Holy Staff
5036: T5_MAIN_HOLYSTAFF@2                                              : Expert's Holy Staff
5037: T5_MAIN_HOLYSTAFF@3                                              : Expert's Holy Staff
5038: T6_MAIN_HOLYSTAFF                                                : Master's Holy Staff
5039: T6_MAIN_HOLYSTAFF@1                                              : Master's Holy Staff
5040: T6_MAIN_HOLYSTAFF@2                                              : Master's Holy Staff
5041: T6_MAIN_HOLYSTAFF@3                                              : Master's Holy Staff
5042: T7_MAIN_HOLYSTAFF                                                : Grandmaster's Holy Staff
5043: T7_MAIN_HOLYSTAFF@1                                              : Grandmaster's Holy Staff
5044: T7_MAIN_HOLYSTAFF@2                                              : Grandmaster's Holy Staff
5045: T7_MAIN_HOLYSTAFF@3                                              : Grandmaster's Holy Staff
5046: T8_MAIN_HOLYSTAFF                                                : Elder's Holy Staff
5047: T8_MAIN_HOLYSTAFF@1                                              : Elder's Holy Staff
5048: T8_MAIN_HOLYSTAFF@2                                              : Elder's Holy Staff
5049: T8_MAIN_HOLYSTAFF@3                                              : Elder's Holy Staff
5050: T4_2H_HOLYSTAFF                                                  : Adept's Great Holy Staff
5051: T4_2H_HOLYSTAFF@1                                                : Adept's Great Holy Staff
5052: T4_2H_HOLYSTAFF@2                                                : Adept's Great Holy Staff
5053: T4_2H_HOLYSTAFF@3                                                : Adept's Great Holy Staff
5054: T5_2H_HOLYSTAFF                                                  : Expert's Great Holy Staff
5055: T5_2H_HOLYSTAFF@1                                                : Expert's Great Holy Staff
5056: T5_2H_HOLYSTAFF@2                                                : Expert's Great Holy Staff
5057: T5_2H_HOLYSTAFF@3                                                : Expert's Great Holy Staff
5058: T6_2H_HOLYSTAFF                                                  : Master's Great Holy Staff
5059: T6_2H_HOLYSTAFF@1                                                : Master's Great Holy Staff
5060: T6_2H_HOLYSTAFF@2                                                : Master's Great Holy Staff
5061: T6_2H_HOLYSTAFF@3                                                : Master's Great Holy Staff
5062: T7_2H_HOLYSTAFF                                                  : Grandmaster's Great Holy Staff
5063: T7_2H_HOLYSTAFF@1                                                : Grandmaster's Great Holy Staff
5064: T7_2H_HOLYSTAFF@2                                                : Grandmaster's Great Holy Staff
5065: T7_2H_HOLYSTAFF@3                                                : Grandmaster's Great Holy Staff
5066: T8_2H_HOLYSTAFF                                                  : Elder's Great Holy Staff
5067: T8_2H_HOLYSTAFF@1                                                : Elder's Great Holy Staff
5068: T8_2H_HOLYSTAFF@2                                                : Elder's Great Holy Staff
5069: T8_2H_HOLYSTAFF@3                                                : Elder's Great Holy Staff
5070: T4_2H_DIVINESTAFF                                                : Adept's Divine Staff
5071: T4_2H_DIVINESTAFF@1                                              : Adept's Divine Staff
5072: T4_2H_DIVINESTAFF@2                                              : Adept's Divine Staff
5073: T4_2H_DIVINESTAFF@3                                              : Adept's Divine Staff
5074: T5_2H_DIVINESTAFF                                                : Expert's Divine Staff
5075: T5_2H_DIVINESTAFF@1                                              : Expert's Divine Staff
5076: T5_2H_DIVINESTAFF@2                                              : Expert's Divine Staff
5077: T5_2H_DIVINESTAFF@3                                              : Expert's Divine Staff
5078: T6_2H_DIVINESTAFF                                                : Master's Divine Staff
5079: T6_2H_DIVINESTAFF@1                                              : Master's Divine Staff
5080: T6_2H_DIVINESTAFF@2                                              : Master's Divine Staff
5081: T6_2H_DIVINESTAFF@3                                              : Master's Divine Staff
5082: T7_2H_DIVINESTAFF                                                : Grandmaster's Divine Staff
5083: T7_2H_DIVINESTAFF@1                                              : Grandmaster's Divine Staff
5084: T7_2H_DIVINESTAFF@2                                              : Grandmaster's Divine Staff
5085: T7_2H_DIVINESTAFF@3                                              : Grandmaster's Divine Staff
5086: T8_2H_DIVINESTAFF                                                : Elder's Divine Staff
5087: T8_2H_DIVINESTAFF@1                                              : Elder's Divine Staff
5088: T8_2H_DIVINESTAFF@2                                              : Elder's Divine Staff
5089: T8_2H_DIVINESTAFF@3                                              : Elder's Divine Staff
5090: T4_MAIN_HOLYSTAFF_MORGANA                                        : Adept's Lifetouch Staff
5091: T4_MAIN_HOLYSTAFF_MORGANA@1                                      : Adept's Lifetouch Staff
5092: T4_MAIN_HOLYSTAFF_MORGANA@2                                      : Adept's Lifetouch Staff
5093: T4_MAIN_HOLYSTAFF_MORGANA@3                                      : Adept's Lifetouch Staff
5094: T5_MAIN_HOLYSTAFF_MORGANA                                        : Expert's Lifetouch Staff
5095: T5_MAIN_HOLYSTAFF_MORGANA@1                                      : Expert's Lifetouch Staff
5096: T5_MAIN_HOLYSTAFF_MORGANA@2                                      : Expert's Lifetouch Staff
5097: T5_MAIN_HOLYSTAFF_MORGANA@3                                      : Expert's Lifetouch Staff
5098: T6_MAIN_HOLYSTAFF_MORGANA                                        : Master's Lifetouch Staff
5099: T6_MAIN_HOLYSTAFF_MORGANA@1                                      : Master's Lifetouch Staff
5100: T6_MAIN_HOLYSTAFF_MORGANA@2                                      : Master's Lifetouch Staff
5101: T6_MAIN_HOLYSTAFF_MORGANA@3                                      : Master's Lifetouch Staff
5102: T7_MAIN_HOLYSTAFF_MORGANA                                        : Grandmaster's Lifetouch Staff
5103: T7_MAIN_HOLYSTAFF_MORGANA@1                                      : Grandmaster's Lifetouch Staff
5104: T7_MAIN_HOLYSTAFF_MORGANA@2                                      : Grandmaster's Lifetouch Staff
5105: T7_MAIN_HOLYSTAFF_MORGANA@3                                      : Grandmaster's Lifetouch Staff
5106: T8_MAIN_HOLYSTAFF_MORGANA                                        : Elder's Lifetouch Staff
5107: T8_MAIN_HOLYSTAFF_MORGANA@1                                      : Elder's Lifetouch Staff
5108: T8_MAIN_HOLYSTAFF_MORGANA@2                                      : Elder's Lifetouch Staff
5109: T8_MAIN_HOLYSTAFF_MORGANA@3                                      : Elder's Lifetouch Staff
5110: T4_2H_HOLYSTAFF_HELL                                             : Adept's Fallen Staff
5111: T4_2H_HOLYSTAFF_HELL@1                                           : Adept's Fallen Staff
5112: T4_2H_HOLYSTAFF_HELL@2                                           : Adept's Fallen Staff
5113: T4_2H_HOLYSTAFF_HELL@3                                           : Adept's Fallen Staff
5114: T5_2H_HOLYSTAFF_HELL                                             : Expert's Fallen Staff
5115: T5_2H_HOLYSTAFF_HELL@1                                           : Expert's Fallen Staff
5116: T5_2H_HOLYSTAFF_HELL@2                                           : Expert's Fallen Staff
5117: T5_2H_HOLYSTAFF_HELL@3                                           : Expert's Fallen Staff
5118: T6_2H_HOLYSTAFF_HELL                                             : Master's Fallen Staff
5119: T6_2H_HOLYSTAFF_HELL@1                                           : Master's Fallen Staff
5120: T6_2H_HOLYSTAFF_HELL@2                                           : Master's Fallen Staff
5121: T6_2H_HOLYSTAFF_HELL@3                                           : Master's Fallen Staff
5122: T7_2H_HOLYSTAFF_HELL                                             : Grandmaster's Fallen Staff
5123: T7_2H_HOLYSTAFF_HELL@1                                           : Grandmaster's Fallen Staff
5124: T7_2H_HOLYSTAFF_HELL@2                                           : Grandmaster's Fallen Staff
5125: T7_2H_HOLYSTAFF_HELL@3                                           : Grandmaster's Fallen Staff
5126: T8_2H_HOLYSTAFF_HELL                                             : Elder's Fallen Staff
5127: T8_2H_HOLYSTAFF_HELL@1                                           : Elder's Fallen Staff
5128: T8_2H_HOLYSTAFF_HELL@2                                           : Elder's Fallen Staff
5129: T8_2H_HOLYSTAFF_HELL@3                                           : Elder's Fallen Staff
5130: T4_2H_HOLYSTAFF_UNDEAD                                           : Adept's Redemption Staff
5131: T4_2H_HOLYSTAFF_UNDEAD@1                                         : Adept's Redemption Staff
5132: T4_2H_HOLYSTAFF_UNDEAD@2                                         : Adept's Redemption Staff
5133: T4_2H_HOLYSTAFF_UNDEAD@3                                         : Adept's Redemption Staff
5134: T5_2H_HOLYSTAFF_UNDEAD                                           : Expert's Redemption Staff
5135: T5_2H_HOLYSTAFF_UNDEAD@1                                         : Expert's Redemption Staff
5136: T5_2H_HOLYSTAFF_UNDEAD@2                                         : Expert's Redemption Staff
5137: T5_2H_HOLYSTAFF_UNDEAD@3                                         : Expert's Redemption Staff
5138: T6_2H_HOLYSTAFF_UNDEAD                                           : Master's Redemption Staff
5139: T6_2H_HOLYSTAFF_UNDEAD@1                                         : Master's Redemption Staff
5140: T6_2H_HOLYSTAFF_UNDEAD@2                                         : Master's Redemption Staff
5141: T6_2H_HOLYSTAFF_UNDEAD@3                                         : Master's Redemption Staff
5142: T7_2H_HOLYSTAFF_UNDEAD                                           : Grandmaster's Redemption Staff
5143: T7_2H_HOLYSTAFF_UNDEAD@1                                         : Grandmaster's Redemption Staff
5144: T7_2H_HOLYSTAFF_UNDEAD@2                                         : Grandmaster's Redemption Staff
5145: T7_2H_HOLYSTAFF_UNDEAD@3                                         : Grandmaster's Redemption Staff
5146: T8_2H_HOLYSTAFF_UNDEAD                                           : Elder's Redemption Staff
5147: T8_2H_HOLYSTAFF_UNDEAD@1                                         : Elder's Redemption Staff
5148: T8_2H_HOLYSTAFF_UNDEAD@2                                         : Elder's Redemption Staff
5149: T8_2H_HOLYSTAFF_UNDEAD@3                                         : Elder's Redemption Staff
5150: T3_MAIN_NATURESTAFF                                              : Journeyman's Nature Staff
5151: T4_MAIN_NATURESTAFF                                              : Adept's Nature Staff
5152: T4_MAIN_NATURESTAFF@1                                            : Adept's Nature Staff
5153: T4_MAIN_NATURESTAFF@2                                            : Adept's Nature Staff
5154: T4_MAIN_NATURESTAFF@3                                            : Adept's Nature Staff
5155: T5_MAIN_NATURESTAFF                                              : Expert's Nature Staff
5156: T5_MAIN_NATURESTAFF@1                                            : Expert's Nature Staff
5157: T5_MAIN_NATURESTAFF@2                                            : Expert's Nature Staff
5158: T5_MAIN_NATURESTAFF@3                                            : Expert's Nature Staff
5159: T6_MAIN_NATURESTAFF                                              : Master's Nature Staff
5160: T6_MAIN_NATURESTAFF@1                                            : Master's Nature Staff
5161: T6_MAIN_NATURESTAFF@2                                            : Master's Nature Staff
5162: T6_MAIN_NATURESTAFF@3                                            : Master's Nature Staff
5163: T7_MAIN_NATURESTAFF                                              : Grandmaster's Nature Staff
5164: T7_MAIN_NATURESTAFF@1                                            : Grandmaster's Nature Staff
5165: T7_MAIN_NATURESTAFF@2                                            : Grandmaster's Nature Staff
5166: T7_MAIN_NATURESTAFF@3                                            : Grandmaster's Nature Staff
5167: T8_MAIN_NATURESTAFF                                              : Elder's Nature Staff
5168: T8_MAIN_NATURESTAFF@1                                            : Elder's Nature Staff
5169: T8_MAIN_NATURESTAFF@2                                            : Elder's Nature Staff
5170: T8_MAIN_NATURESTAFF@3                                            : Elder's Nature Staff
5171: T4_2H_NATURESTAFF                                                : Adept's Great Nature Staff
5172: T4_2H_NATURESTAFF@1                                              : Adept's Great Nature Staff
5173: T4_2H_NATURESTAFF@2                                              : Adept's Great Nature Staff
5174: T4_2H_NATURESTAFF@3                                              : Adept's Great Nature Staff
5175: T5_2H_NATURESTAFF                                                : Expert's Great Nature Staff
5176: T5_2H_NATURESTAFF@1                                              : Expert's Great Nature Staff
5177: T5_2H_NATURESTAFF@2                                              : Expert's Great Nature Staff
5178: T5_2H_NATURESTAFF@3                                              : Expert's Great Nature Staff
5179: T6_2H_NATURESTAFF                                                : Master's Great Nature Staff
5180: T6_2H_NATURESTAFF@1                                              : Master's Great Nature Staff
5181: T6_2H_NATURESTAFF@2                                              : Master's Great Nature Staff
5182: T6_2H_NATURESTAFF@3                                              : Master's Great Nature Staff
5183: T7_2H_NATURESTAFF                                                : Grandmaster's Great Nature Staff
5184: T7_2H_NATURESTAFF@1                                              : Grandmaster's Great Nature Staff
5185: T7_2H_NATURESTAFF@2                                              : Grandmaster's Great Nature Staff
5186: T7_2H_NATURESTAFF@3                                              : Grandmaster's Great Nature Staff
5187: T8_2H_NATURESTAFF                                                : Elder's Great Nature Staff
5188: T8_2H_NATURESTAFF@1                                              : Elder's Great Nature Staff
5189: T8_2H_NATURESTAFF@2                                              : Elder's Great Nature Staff
5190: T8_2H_NATURESTAFF@3                                              : Elder's Great Nature Staff
5191: T4_2H_WILDSTAFF                                                  : Adept's Wild Staff
5192: T4_2H_WILDSTAFF@1                                                : Adept's Wild Staff
5193: T4_2H_WILDSTAFF@2                                                : Adept's Wild Staff
5194: T4_2H_WILDSTAFF@3                                                : Adept's Wild Staff
5195: T5_2H_WILDSTAFF                                                  : Expert's Wild Staff
5196: T5_2H_WILDSTAFF@1                                                : Expert's Wild Staff
5197: T5_2H_WILDSTAFF@2                                                : Expert's Wild Staff
5198: T5_2H_WILDSTAFF@3                                                : Expert's Wild Staff
5199: T6_2H_WILDSTAFF                                                  : Master's Wild Staff
5200: T6_2H_WILDSTAFF@1                                                : Master's Wild Staff
5201: T6_2H_WILDSTAFF@2                                                : Master's Wild Staff
5202: T6_2H_WILDSTAFF@3                                                : Master's Wild Staff
5203: T7_2H_WILDSTAFF                                                  : Grandmaster's Wild Staff
5204: T7_2H_WILDSTAFF@1                                                : Grandmaster's Wild Staff
5205: T7_2H_WILDSTAFF@2                                                : Grandmaster's Wild Staff
5206: T7_2H_WILDSTAFF@3                                                : Grandmaster's Wild Staff
5207: T8_2H_WILDSTAFF                                                  : Elder's Wild Staff
5208: T8_2H_WILDSTAFF@1                                                : Elder's Wild Staff
5209: T8_2H_WILDSTAFF@2                                                : Elder's Wild Staff
5210: T8_2H_WILDSTAFF@3                                                : Elder's Wild Staff
5211: T4_MAIN_NATURESTAFF_KEEPER                                       : Adept's Druidic Staff
5212: T4_MAIN_NATURESTAFF_KEEPER@1                                     : Adept's Druidic Staff
5213: T4_MAIN_NATURESTAFF_KEEPER@2                                     : Adept's Druidic Staff
5214: T4_MAIN_NATURESTAFF_KEEPER@3                                     : Adept's Druidic Staff
5215: T5_MAIN_NATURESTAFF_KEEPER                                       : Expert's Druidic Staff
5216: T5_MAIN_NATURESTAFF_KEEPER@1                                     : Expert's Druidic Staff
5217: T5_MAIN_NATURESTAFF_KEEPER@2                                     : Expert's Druidic Staff
5218: T5_MAIN_NATURESTAFF_KEEPER@3                                     : Expert's Druidic Staff
5219: T6_MAIN_NATURESTAFF_KEEPER                                       : Master's Druidic Staff
5220: T6_MAIN_NATURESTAFF_KEEPER@1                                     : Master's Druidic Staff
5221: T6_MAIN_NATURESTAFF_KEEPER@2                                     : Master's Druidic Staff
5222: T6_MAIN_NATURESTAFF_KEEPER@3                                     : Master's Druidic Staff
5223: T7_MAIN_NATURESTAFF_KEEPER                                       : Grandmaster's Druidic Staff
5224: T7_MAIN_NATURESTAFF_KEEPER@1                                     : Grandmaster's Druidic Staff
5225: T7_MAIN_NATURESTAFF_KEEPER@2                                     : Grandmaster's Druidic Staff
5226: T7_MAIN_NATURESTAFF_KEEPER@3                                     : Grandmaster's Druidic Staff
5227: T8_MAIN_NATURESTAFF_KEEPER                                       : Elder's Druidic Staff
5228: T8_MAIN_NATURESTAFF_KEEPER@1                                     : Elder's Druidic Staff
5229: T8_MAIN_NATURESTAFF_KEEPER@2                                     : Elder's Druidic Staff
5230: T8_MAIN_NATURESTAFF_KEEPER@3                                     : Elder's Druidic Staff
5231: T4_2H_NATURESTAFF_HELL                                           : Adept's Blight Staff
5232: T4_2H_NATURESTAFF_HELL@1                                         : Adept's Blight Staff
5233: T4_2H_NATURESTAFF_HELL@2                                         : Adept's Blight Staff
5234: T4_2H_NATURESTAFF_HELL@3                                         : Adept's Blight Staff
5235: T5_2H_NATURESTAFF_HELL                                           : Expert's Blight Staff
5236: T5_2H_NATURESTAFF_HELL@1                                         : Expert's Blight Staff
5237: T5_2H_NATURESTAFF_HELL@2                                         : Expert's Blight Staff
5238: T5_2H_NATURESTAFF_HELL@3                                         : Expert's Blight Staff
5239: T6_2H_NATURESTAFF_HELL                                           : Master's Blight Staff
5240: T6_2H_NATURESTAFF_HELL@1                                         : Master's Blight Staff
5241: T6_2H_NATURESTAFF_HELL@2                                         : Master's Blight Staff
5242: T6_2H_NATURESTAFF_HELL@3                                         : Master's Blight Staff
5243: T7_2H_NATURESTAFF_HELL                                           : Grandmaster's Blight Staff
5244: T7_2H_NATURESTAFF_HELL@1                                         : Grandmaster's Blight Staff
5245: T7_2H_NATURESTAFF_HELL@2                                         : Grandmaster's Blight Staff
5246: T7_2H_NATURESTAFF_HELL@3                                         : Grandmaster's Blight Staff
5247: T8_2H_NATURESTAFF_HELL                                           : Elder's Blight Staff
5248: T8_2H_NATURESTAFF_HELL@1                                         : Elder's Blight Staff
5249: T8_2H_NATURESTAFF_HELL@2                                         : Elder's Blight Staff
5250: T8_2H_NATURESTAFF_HELL@3                                         : Elder's Blight Staff
5251: T4_2H_NATURESTAFF_KEEPER                                         : Adept's Rampant Staff
5252: T4_2H_NATURESTAFF_KEEPER@1                                       : Adept's Rampant Staff
5253: T4_2H_NATURESTAFF_KEEPER@2                                       : Adept's Rampant Staff
5254: T4_2H_NATURESTAFF_KEEPER@3                                       : Adept's Rampant Staff
5255: T5_2H_NATURESTAFF_KEEPER                                         : Expert's Rampant Staff
5256: T5_2H_NATURESTAFF_KEEPER@1                                       : Expert's Rampant Staff
5257: T5_2H_NATURESTAFF_KEEPER@2                                       : Expert's Rampant Staff
5258: T5_2H_NATURESTAFF_KEEPER@3                                       : Expert's Rampant Staff
5259: T6_2H_NATURESTAFF_KEEPER                                         : Master's Rampant Staff
5260: T6_2H_NATURESTAFF_KEEPER@1                                       : Master's Rampant Staff
5261: T6_2H_NATURESTAFF_KEEPER@2                                       : Master's Rampant Staff
5262: T6_2H_NATURESTAFF_KEEPER@3                                       : Master's Rampant Staff
5263: T7_2H_NATURESTAFF_KEEPER                                         : Grandmaster's Rampant Staff
5264: T7_2H_NATURESTAFF_KEEPER@1                                       : Grandmaster's Rampant Staff
5265: T7_2H_NATURESTAFF_KEEPER@2                                       : Grandmaster's Rampant Staff
5266: T7_2H_NATURESTAFF_KEEPER@3                                       : Grandmaster's Rampant Staff
5267: T8_2H_NATURESTAFF_KEEPER                                         : Elder's Rampant Staff
5268: T8_2H_NATURESTAFF_KEEPER@1                                       : Elder's Rampant Staff
5269: T8_2H_NATURESTAFF_KEEPER@2                                       : Elder's Rampant Staff
5270: T8_2H_NATURESTAFF_KEEPER@3                                       : Elder's Rampant Staff
5271: T3_MAIN_DAGGER                                                   : Journeyman's Dagger
5272: T4_MAIN_DAGGER                                                   : Adept's Dagger
5273: T4_MAIN_DAGGER@1                                                 : Adept's Dagger
5274: T4_MAIN_DAGGER@2                                                 : Adept's Dagger
5275: T4_MAIN_DAGGER@3                                                 : Adept's Dagger
5276: T5_MAIN_DAGGER                                                   : Expert's Dagger
5277: T5_MAIN_DAGGER@1                                                 : Expert's Dagger
5278: T5_MAIN_DAGGER@2                                                 : Expert's Dagger
5279: T5_MAIN_DAGGER@3                                                 : Expert's Dagger
5280: T6_MAIN_DAGGER                                                   : Master's Dagger
5281: T6_MAIN_DAGGER@1                                                 : Master's Dagger
5282: T6_MAIN_DAGGER@2                                                 : Master's Dagger
5283: T6_MAIN_DAGGER@3                                                 : Master's Dagger
5284: T7_MAIN_DAGGER                                                   : Grandmaster's Dagger
5285: T7_MAIN_DAGGER@1                                                 : Grandmaster's Dagger
5286: T7_MAIN_DAGGER@2                                                 : Grandmaster's Dagger
5287: T7_MAIN_DAGGER@3                                                 : Grandmaster's Dagger
5288: T8_MAIN_DAGGER                                                   : Elder's Dagger
5289: T8_MAIN_DAGGER@1                                                 : Elder's Dagger
5290: T8_MAIN_DAGGER@2                                                 : Elder's Dagger
5291: T8_MAIN_DAGGER@3                                                 : Elder's Dagger
5292: T4_2H_DAGGERPAIR                                                 : Adept's Dagger Pair
5293: T4_2H_DAGGERPAIR@1                                               : Adept's Dagger Pair
5294: T4_2H_DAGGERPAIR@2                                               : Adept's Dagger Pair
5295: T4_2H_DAGGERPAIR@3                                               : Adept's Dagger Pair
5296: T5_2H_DAGGERPAIR                                                 : Expert's Dagger Pair
5297: T5_2H_DAGGERPAIR@1                                               : Expert's Dagger Pair
5298: T5_2H_DAGGERPAIR@2                                               : Expert's Dagger Pair
5299: T5_2H_DAGGERPAIR@3                                               : Expert's Dagger Pair
5300: T6_2H_DAGGERPAIR                                                 : Master's Dagger Pair
5301: T6_2H_DAGGERPAIR@1                                               : Master's Dagger Pair
5302: T6_2H_DAGGERPAIR@2                                               : Master's Dagger Pair
5303: T6_2H_DAGGERPAIR@3                                               : Master's Dagger Pair
5304: T7_2H_DAGGERPAIR                                                 : Grandmaster's Dagger Pair
5305: T7_2H_DAGGERPAIR@1                                               : Grandmaster's Dagger Pair
5306: T7_2H_DAGGERPAIR@2                                               : Grandmaster's Dagger Pair
5307: T7_2H_DAGGERPAIR@3                                               : Grandmaster's Dagger Pair
5308: T8_2H_DAGGERPAIR                                                 : Elder's Dagger Pair
5309: T8_2H_DAGGERPAIR@1                                               : Elder's Dagger Pair
5310: T8_2H_DAGGERPAIR@2                                               : Elder's Dagger Pair
5311: T8_2H_DAGGERPAIR@3                                               : Elder's Dagger Pair
5312: T4_2H_CLAWPAIR                                                   : Adept's Claws
5313: T4_2H_CLAWPAIR@1                                                 : Adept's Claws
5314: T4_2H_CLAWPAIR@2                                                 : Adept's Claws
5315: T4_2H_CLAWPAIR@3                                                 : Adept's Claws
5316: T5_2H_CLAWPAIR                                                   : Expert's Claws
5317: T5_2H_CLAWPAIR@1                                                 : Expert's Claws
5318: T5_2H_CLAWPAIR@2                                                 : Expert's Claws
5319: T5_2H_CLAWPAIR@3                                                 : Expert's Claws
5320: T6_2H_CLAWPAIR                                                   : Master's Claws
5321: T6_2H_CLAWPAIR@1                                                 : Master's Claws
5322: T6_2H_CLAWPAIR@2                                                 : Master's Claws
5323: T6_2H_CLAWPAIR@3                                                 : Master's Claws
5324: T7_2H_CLAWPAIR                                                   : Grandmaster's Claws
5325: T7_2H_CLAWPAIR@1                                                 : Grandmaster's Claws
5326: T7_2H_CLAWPAIR@2                                                 : Grandmaster's Claws
5327: T7_2H_CLAWPAIR@3                                                 : Grandmaster's Claws
5328: T8_2H_CLAWPAIR                                                   : Elder's Claws
5329: T8_2H_CLAWPAIR@1                                                 : Elder's Claws
5330: T8_2H_CLAWPAIR@2                                                 : Elder's Claws
5331: T8_2H_CLAWPAIR@3                                                 : Elder's Claws
5332: T4_MAIN_RAPIER_MORGANA                                           : Adept's Bloodletter
5333: T4_MAIN_RAPIER_MORGANA@1                                         : Adept's Bloodletter
5334: T4_MAIN_RAPIER_MORGANA@2                                         : Adept's Bloodletter
5335: T4_MAIN_RAPIER_MORGANA@3                                         : Adept's Bloodletter
5336: T5_MAIN_RAPIER_MORGANA                                           : Expert's Bloodletter
5337: T5_MAIN_RAPIER_MORGANA@1                                         : Expert's Bloodletter
5338: T5_MAIN_RAPIER_MORGANA@2                                         : Expert's Bloodletter
5339: T5_MAIN_RAPIER_MORGANA@3                                         : Expert's Bloodletter
5340: T6_MAIN_RAPIER_MORGANA                                           : Master's Bloodletter
5341: T6_MAIN_RAPIER_MORGANA@1                                         : Master's Bloodletter
5342: T6_MAIN_RAPIER_MORGANA@2                                         : Master's Bloodletter
5343: T6_MAIN_RAPIER_MORGANA@3                                         : Master's Bloodletter
5344: T7_MAIN_RAPIER_MORGANA                                           : Grandmaster's Bloodletter
5345: T7_MAIN_RAPIER_MORGANA@1                                         : Grandmaster's Bloodletter
5346: T7_MAIN_RAPIER_MORGANA@2                                         : Grandmaster's Bloodletter
5347: T7_MAIN_RAPIER_MORGANA@3                                         : Grandmaster's Bloodletter
5348: T8_MAIN_RAPIER_MORGANA                                           : Elder's Bloodletter
5349: T8_MAIN_RAPIER_MORGANA@1                                         : Elder's Bloodletter
5350: T8_MAIN_RAPIER_MORGANA@2                                         : Elder's Bloodletter
5351: T8_MAIN_RAPIER_MORGANA@3                                         : Elder's Bloodletter
5352: T4_2H_IRONGAUNTLETS_HELL                                         : Adept's Black Hands
5353: T4_2H_IRONGAUNTLETS_HELL@1                                       : Adept's Black Hands
5354: T4_2H_IRONGAUNTLETS_HELL@2                                       : Adept's Black Hands
5355: T4_2H_IRONGAUNTLETS_HELL@3                                       : Adept's Black Hands
5356: T5_2H_IRONGAUNTLETS_HELL                                         : Expert's Black Hands
5357: T5_2H_IRONGAUNTLETS_HELL@1                                       : Expert's Black Hands
5358: T5_2H_IRONGAUNTLETS_HELL@2                                       : Expert's Black Hands
5359: T5_2H_IRONGAUNTLETS_HELL@3                                       : Expert's Black Hands
5360: T6_2H_IRONGAUNTLETS_HELL                                         : Master's Black Hands
5361: T6_2H_IRONGAUNTLETS_HELL@1                                       : Master's Black Hands
5362: T6_2H_IRONGAUNTLETS_HELL@2                                       : Master's Black Hands
5363: T6_2H_IRONGAUNTLETS_HELL@3                                       : Master's Black Hands
5364: T7_2H_IRONGAUNTLETS_HELL                                         : Grandmaster's Black Hands
5365: T7_2H_IRONGAUNTLETS_HELL@1                                       : Grandmaster's Black Hands
5366: T7_2H_IRONGAUNTLETS_HELL@2                                       : Grandmaster's Black Hands
5367: T7_2H_IRONGAUNTLETS_HELL@3                                       : Grandmaster's Black Hands
5368: T8_2H_IRONGAUNTLETS_HELL                                         : Elder's Black Hands
5369: T8_2H_IRONGAUNTLETS_HELL@1                                       : Elder's Black Hands
5370: T8_2H_IRONGAUNTLETS_HELL@2                                       : Elder's Black Hands
5371: T8_2H_IRONGAUNTLETS_HELL@3                                       : Elder's Black Hands
5372: T4_2H_DUALSICKLE_UNDEAD                                          : Adept's Deathgivers
5373: T4_2H_DUALSICKLE_UNDEAD@1                                        : Adept's Deathgivers
5374: T4_2H_DUALSICKLE_UNDEAD@2                                        : Adept's Deathgivers
5375: T4_2H_DUALSICKLE_UNDEAD@3                                        : Adept's Deathgivers
5376: T5_2H_DUALSICKLE_UNDEAD                                          : Expert's Deathgivers
5377: T5_2H_DUALSICKLE_UNDEAD@1                                        : Expert's Deathgivers
5378: T5_2H_DUALSICKLE_UNDEAD@2                                        : Expert's Deathgivers
5379: T5_2H_DUALSICKLE_UNDEAD@3                                        : Expert's Deathgivers
5380: T6_2H_DUALSICKLE_UNDEAD                                          : Master's Deathgivers
5381: T6_2H_DUALSICKLE_UNDEAD@1                                        : Master's Deathgivers
5382: T6_2H_DUALSICKLE_UNDEAD@2                                        : Master's Deathgivers
5383: T6_2H_DUALSICKLE_UNDEAD@3                                        : Master's Deathgivers
5384: T7_2H_DUALSICKLE_UNDEAD                                          : Grandmaster's Deathgivers
5385: T7_2H_DUALSICKLE_UNDEAD@1                                        : Grandmaster's Deathgivers
5386: T7_2H_DUALSICKLE_UNDEAD@2                                        : Grandmaster's Deathgivers
5387: T7_2H_DUALSICKLE_UNDEAD@3                                        : Grandmaster's Deathgivers
5388: T8_2H_DUALSICKLE_UNDEAD                                          : Elder's Deathgivers
5389: T8_2H_DUALSICKLE_UNDEAD@1                                        : Elder's Deathgivers
5390: T8_2H_DUALSICKLE_UNDEAD@2                                        : Elder's Deathgivers
5391: T8_2H_DUALSICKLE_UNDEAD@3                                        : Elder's Deathgivers
5392: T3_MAIN_SPEAR                                                    : Journeyman's Spear
5393: T4_MAIN_SPEAR                                                    : Adept's Spear
5394: T4_MAIN_SPEAR@1                                                  : Adept's Spear
5395: T4_MAIN_SPEAR@2                                                  : Adept's Spear
5396: T4_MAIN_SPEAR@3                                                  : Adept's Spear
5397: T5_MAIN_SPEAR                                                    : Expert's Spear
5398: T5_MAIN_SPEAR@1                                                  : Expert's Spear
5399: T5_MAIN_SPEAR@2                                                  : Expert's Spear
5400: T5_MAIN_SPEAR@3                                                  : Expert's Spear
5401: T6_MAIN_SPEAR                                                    : Master's Spear
5402: T6_MAIN_SPEAR@1                                                  : Master's Spear
5403: T6_MAIN_SPEAR@2                                                  : Master's Spear
5404: T6_MAIN_SPEAR@3                                                  : Master's Spear
5405: T7_MAIN_SPEAR                                                    : Grandmaster's Spear
5406: T7_MAIN_SPEAR@1                                                  : Grandmaster's Spear
5407: T7_MAIN_SPEAR@2                                                  : Grandmaster's Spear
5408: T7_MAIN_SPEAR@3                                                  : Grandmaster's Spear
5409: T8_MAIN_SPEAR                                                    : Elder's Spear
5410: T8_MAIN_SPEAR@1                                                  : Elder's Spear
5411: T8_MAIN_SPEAR@2                                                  : Elder's Spear
5412: T8_MAIN_SPEAR@3                                                  : Elder's Spear
5413: T4_2H_SPEAR                                                      : Adept's Pike
5414: T4_2H_SPEAR@1                                                    : Adept's Pike
5415: T4_2H_SPEAR@2                                                    : Adept's Pike
5416: T4_2H_SPEAR@3                                                    : Adept's Pike
5417: T5_2H_SPEAR                                                      : Expert's Pike
5418: T5_2H_SPEAR@1                                                    : Expert's Pike
5419: T5_2H_SPEAR@2                                                    : Expert's Pike
5420: T5_2H_SPEAR@3                                                    : Expert's Pike
5421: T6_2H_SPEAR                                                      : Master's Pike
5422: T6_2H_SPEAR@1                                                    : Master's Pike
5423: T6_2H_SPEAR@2                                                    : Master's Pike
5424: T6_2H_SPEAR@3                                                    : Master's Pike
5425: T7_2H_SPEAR                                                      : Grandmaster's Pike
5426: T7_2H_SPEAR@1                                                    : Grandmaster's Pike
5427: T7_2H_SPEAR@2                                                    : Grandmaster's Pike
5428: T7_2H_SPEAR@3                                                    : Grandmaster's Pike
5429: T8_2H_SPEAR                                                      : Elder's Pike
5430: T8_2H_SPEAR@1                                                    : Elder's Pike
5431: T8_2H_SPEAR@2                                                    : Elder's Pike
5432: T8_2H_SPEAR@3                                                    : Elder's Pike
5433: T4_2H_GLAIVE                                                     : Adept's Glaive
5434: T4_2H_GLAIVE@1                                                   : Adept's Glaive
5435: T4_2H_GLAIVE@2                                                   : Adept's Glaive
5436: T4_2H_GLAIVE@3                                                   : Adept's Glaive
5437: T5_2H_GLAIVE                                                     : Expert's Glaive
5438: T5_2H_GLAIVE@1                                                   : Expert's Glaive
5439: T5_2H_GLAIVE@2                                                   : Expert's Glaive
5440: T5_2H_GLAIVE@3                                                   : Expert's Glaive
5441: T6_2H_GLAIVE                                                     : Master's Glaive
5442: T6_2H_GLAIVE@1                                                   : Master's Glaive
5443: T6_2H_GLAIVE@2                                                   : Master's Glaive
5444: T6_2H_GLAIVE@3                                                   : Master's Glaive
5445: T7_2H_GLAIVE                                                     : Grandmaster's Glaive
5446: T7_2H_GLAIVE@1                                                   : Grandmaster's Glaive
5447: T7_2H_GLAIVE@2                                                   : Grandmaster's Glaive
5448: T7_2H_GLAIVE@3                                                   : Grandmaster's Glaive
5449: T8_2H_GLAIVE                                                     : Elder's Glaive
5450: T8_2H_GLAIVE@1                                                   : Elder's Glaive
5451: T8_2H_GLAIVE@2                                                   : Elder's Glaive
5452: T8_2H_GLAIVE@3                                                   : Elder's Glaive
5453: T4_MAIN_SPEAR_KEEPER                                             : Adept's Heron Spear
5454: T4_MAIN_SPEAR_KEEPER@1                                           : Adept's Heron Spear
5455: T4_MAIN_SPEAR_KEEPER@2                                           : Adept's Heron Spear
5456: T4_MAIN_SPEAR_KEEPER@3                                           : Adept's Heron Spear
5457: T5_MAIN_SPEAR_KEEPER                                             : Expert's Heron Spear
5458: T5_MAIN_SPEAR_KEEPER@1                                           : Expert's Heron Spear
5459: T5_MAIN_SPEAR_KEEPER@2                                           : Expert's Heron Spear
5460: T5_MAIN_SPEAR_KEEPER@3                                           : Expert's Heron Spear
5461: T6_MAIN_SPEAR_KEEPER                                             : Master's Heron Spear
5462: T6_MAIN_SPEAR_KEEPER@1                                           : Master's Heron Spear
5463: T6_MAIN_SPEAR_KEEPER@2                                           : Master's Heron Spear
5464: T6_MAIN_SPEAR_KEEPER@3                                           : Master's Heron Spear
5465: T7_MAIN_SPEAR_KEEPER                                             : Grandmaster's Heron Spear
5466: T7_MAIN_SPEAR_KEEPER@1                                           : Grandmaster's Heron Spear
5467: T7_MAIN_SPEAR_KEEPER@2                                           : Grandmaster's Heron Spear
5468: T7_MAIN_SPEAR_KEEPER@3                                           : Grandmaster's Heron Spear
5469: T8_MAIN_SPEAR_KEEPER                                             : Elder's Heron Spear
5470: T8_MAIN_SPEAR_KEEPER@1                                           : Elder's Heron Spear
5471: T8_MAIN_SPEAR_KEEPER@2                                           : Elder's Heron Spear
5472: T8_MAIN_SPEAR_KEEPER@3                                           : Elder's Heron Spear
5473: T4_2H_HARPOON_HELL                                               : Adept's Spirithunter
5474: T4_2H_HARPOON_HELL@1                                             : Adept's Spirithunter
5475: T4_2H_HARPOON_HELL@2                                             : Adept's Spirithunter
5476: T4_2H_HARPOON_HELL@3                                             : Adept's Spirithunter
5477: T5_2H_HARPOON_HELL                                               : Expert's Spirithunter
5478: T5_2H_HARPOON_HELL@1                                             : Expert's Spirithunter
5479: T5_2H_HARPOON_HELL@2                                             : Expert's Spirithunter
5480: T5_2H_HARPOON_HELL@3                                             : Expert's Spirithunter
5481: T6_2H_HARPOON_HELL                                               : Master's Spirithunter
5482: T6_2H_HARPOON_HELL@1                                             : Master's Spirithunter
5483: T6_2H_HARPOON_HELL@2                                             : Master's Spirithunter
5484: T6_2H_HARPOON_HELL@3                                             : Master's Spirithunter
5485: T7_2H_HARPOON_HELL                                               : Grandmaster's Spirithunter
5486: T7_2H_HARPOON_HELL@1                                             : Grandmaster's Spirithunter
5487: T7_2H_HARPOON_HELL@2                                             : Grandmaster's Spirithunter
5488: T7_2H_HARPOON_HELL@3                                             : Grandmaster's Spirithunter
5489: T8_2H_HARPOON_HELL                                               : Elder's Spirithunter
5490: T8_2H_HARPOON_HELL@1                                             : Elder's Spirithunter
5491: T8_2H_HARPOON_HELL@2                                             : Elder's Spirithunter
5492: T8_2H_HARPOON_HELL@3                                             : Elder's Spirithunter
5493: T4_2H_TRIDENT_UNDEAD                                             : Adept's Trinity Spear
5494: T4_2H_TRIDENT_UNDEAD@1                                           : Adept's Trinity Spear
5495: T4_2H_TRIDENT_UNDEAD@2                                           : Adept's Trinity Spear
5496: T4_2H_TRIDENT_UNDEAD@3                                           : Adept's Trinity Spear
5497: T5_2H_TRIDENT_UNDEAD                                             : Expert's Trinity Spear
5498: T5_2H_TRIDENT_UNDEAD@1                                           : Expert's Trinity Spear
5499: T5_2H_TRIDENT_UNDEAD@2                                           : Expert's Trinity Spear
5500: T5_2H_TRIDENT_UNDEAD@3                                           : Expert's Trinity Spear
5501: T6_2H_TRIDENT_UNDEAD                                             : Master's Trinity Spear
5502: T6_2H_TRIDENT_UNDEAD@1                                           : Master's Trinity Spear
5503: T6_2H_TRIDENT_UNDEAD@2                                           : Master's Trinity Spear
5504: T6_2H_TRIDENT_UNDEAD@3                                           : Master's Trinity Spear
5505: T7_2H_TRIDENT_UNDEAD                                             : Grandmaster's Trinity Spear
5506: T7_2H_TRIDENT_UNDEAD@1                                           : Grandmaster's Trinity Spear
5507: T7_2H_TRIDENT_UNDEAD@2                                           : Grandmaster's Trinity Spear
5508: T7_2H_TRIDENT_UNDEAD@3                                           : Grandmaster's Trinity Spear
5509: T8_2H_TRIDENT_UNDEAD                                             : Elder's Trinity Spear
5510: T8_2H_TRIDENT_UNDEAD@1                                           : Elder's Trinity Spear
5511: T8_2H_TRIDENT_UNDEAD@2                                           : Elder's Trinity Spear
5512: T8_2H_TRIDENT_UNDEAD@3                                           : Elder's Trinity Spear
5513: T3_MAIN_AXE                                                      : Journeyman's Battleaxe
5514: T4_MAIN_AXE                                                      : Adept's Battleaxe
5515: T4_MAIN_AXE@1                                                    : Adept's Battleaxe
5516: T4_MAIN_AXE@2                                                    : Adept's Battleaxe
5517: T4_MAIN_AXE@3                                                    : Adept's Battleaxe
5518: T5_MAIN_AXE                                                      : Expert's Battleaxe
5519: T5_MAIN_AXE@1                                                    : Expert's Battleaxe
5520: T5_MAIN_AXE@2                                                    : Expert's Battleaxe
5521: T5_MAIN_AXE@3                                                    : Expert's Battleaxe
5522: T6_MAIN_AXE                                                      : Master's Battleaxe
5523: T6_MAIN_AXE@1                                                    : Master's Battleaxe
5524: T6_MAIN_AXE@2                                                    : Master's Battleaxe
5525: T6_MAIN_AXE@3                                                    : Master's Battleaxe
5526: T7_MAIN_AXE                                                      : Grandmaster's Battleaxe
5527: T7_MAIN_AXE@1                                                    : Grandmaster's Battleaxe
5528: T7_MAIN_AXE@2                                                    : Grandmaster's Battleaxe
5529: T7_MAIN_AXE@3                                                    : Grandmaster's Battleaxe
5530: T8_MAIN_AXE                                                      : Elder's Battleaxe
5531: T8_MAIN_AXE@1                                                    : Elder's Battleaxe
5532: T8_MAIN_AXE@2                                                    : Elder's Battleaxe
5533: T8_MAIN_AXE@3                                                    : Elder's Battleaxe
5534: T4_2H_AXE                                                        : Adept's Greataxe
5535: T4_2H_AXE@1                                                      : Adept's Greataxe
5536: T4_2H_AXE@2                                                      : Adept's Greataxe
5537: T4_2H_AXE@3                                                      : Adept's Greataxe
5538: T5_2H_AXE                                                        : Expert's Greataxe
5539: T5_2H_AXE@1                                                      : Expert's Greataxe
5540: T5_2H_AXE@2                                                      : Expert's Greataxe
5541: T5_2H_AXE@3                                                      : Expert's Greataxe
5542: T6_2H_AXE                                                        : Master's Greataxe
5543: T6_2H_AXE@1                                                      : Master's Greataxe
5544: T6_2H_AXE@2                                                      : Master's Greataxe
5545: T6_2H_AXE@3                                                      : Master's Greataxe
5546: T7_2H_AXE                                                        : Grandmaster's Greataxe
5547: T7_2H_AXE@1                                                      : Grandmaster's Greataxe
5548: T7_2H_AXE@2                                                      : Grandmaster's Greataxe
5549: T7_2H_AXE@3                                                      : Grandmaster's Greataxe
5550: T8_2H_AXE                                                        : The Hand of Khor
5551: T8_2H_AXE@1                                                      : The Hand of Khor
5552: T8_2H_AXE@2                                                      : The Hand of Khor
5553: T8_2H_AXE@3                                                      : The Hand of Khor
5554: T4_2H_HALBERD                                                    : Adept's Halberd
5555: T4_2H_HALBERD@1                                                  : Adept's Halberd
5556: T4_2H_HALBERD@2                                                  : Adept's Halberd
5557: T4_2H_HALBERD@3                                                  : Adept's Halberd
5558: T5_2H_HALBERD                                                    : Expert's Halberd
5559: T5_2H_HALBERD@1                                                  : Expert's Halberd
5560: T5_2H_HALBERD@2                                                  : Expert's Halberd
5561: T5_2H_HALBERD@3                                                  : Expert's Halberd
5562: T6_2H_HALBERD                                                    : Master's Halberd
5563: T6_2H_HALBERD@1                                                  : Master's Halberd
5564: T6_2H_HALBERD@2                                                  : Master's Halberd
5565: T6_2H_HALBERD@3                                                  : Master's Halberd
5566: T7_2H_HALBERD                                                    : Grandmaster's Halberd
5567: T7_2H_HALBERD@1                                                  : Grandmaster's Halberd
5568: T7_2H_HALBERD@2                                                  : Grandmaster's Halberd
5569: T7_2H_HALBERD@3                                                  : Grandmaster's Halberd
5570: T8_2H_HALBERD                                                    : Elder's Halberd
5571: T8_2H_HALBERD@1                                                  : Elder's Halberd
5572: T8_2H_HALBERD@2                                                  : Elder's Halberd
5573: T8_2H_HALBERD@3                                                  : Elder's Halberd
5574: T4_2H_HALBERD_MORGANA                                            : Adept's Carrioncaller
5575: T4_2H_HALBERD_MORGANA@1                                          : Adept's Carrioncaller
5576: T4_2H_HALBERD_MORGANA@2                                          : Adept's Carrioncaller
5577: T4_2H_HALBERD_MORGANA@3                                          : Adept's Carrioncaller
5578: T5_2H_HALBERD_MORGANA                                            : Expert's Carrioncaller
5579: T5_2H_HALBERD_MORGANA@1                                          : Expert's Carrioncaller
5580: T5_2H_HALBERD_MORGANA@2                                          : Expert's Carrioncaller
5581: T5_2H_HALBERD_MORGANA@3                                          : Expert's Carrioncaller
5582: T6_2H_HALBERD_MORGANA                                            : Master's Carrioncaller
5583: T6_2H_HALBERD_MORGANA@1                                          : Master's Carrioncaller
5584: T6_2H_HALBERD_MORGANA@2                                          : Master's Carrioncaller
5585: T6_2H_HALBERD_MORGANA@3                                          : Master's Carrioncaller
5586: T7_2H_HALBERD_MORGANA                                            : Grandmaster's Carrioncaller
5587: T7_2H_HALBERD_MORGANA@1                                          : Grandmaster's Carrioncaller
5588: T7_2H_HALBERD_MORGANA@2                                          : Grandmaster's Carrioncaller
5589: T7_2H_HALBERD_MORGANA@3                                          : Grandmaster's Carrioncaller
5590: T8_2H_HALBERD_MORGANA                                            : Elder's Carrioncaller
5591: T8_2H_HALBERD_MORGANA@1                                          : Elder's Carrioncaller
5592: T8_2H_HALBERD_MORGANA@2                                          : Elder's Carrioncaller
5593: T8_2H_HALBERD_MORGANA@3                                          : Elder's Carrioncaller
5594: T4_2H_SCYTHE_HELL                                                : Adept's Infernal Scythe
5595: T4_2H_SCYTHE_HELL@1                                              : Adept's Infernal Scythe
5596: T4_2H_SCYTHE_HELL@2                                              : Adept's Infernal Scythe
5597: T4_2H_SCYTHE_HELL@3                                              : Adept's Infernal Scythe
5598: T5_2H_SCYTHE_HELL                                                : Expert's Infernal Scythe
5599: T5_2H_SCYTHE_HELL@1                                              : Expert's Infernal Scythe
5600: T5_2H_SCYTHE_HELL@2                                              : Expert's Infernal Scythe
5601: T5_2H_SCYTHE_HELL@3                                              : Expert's Infernal Scythe
5602: T6_2H_SCYTHE_HELL                                                : Master's Infernal Scythe
5603: T6_2H_SCYTHE_HELL@1                                              : Master's Infernal Scythe
5604: T6_2H_SCYTHE_HELL@2                                              : Master's Infernal Scythe
5605: T6_2H_SCYTHE_HELL@3                                              : Master's Infernal Scythe
5606: T7_2H_SCYTHE_HELL                                                : Grandmaster's Infernal Scythe
5607: T7_2H_SCYTHE_HELL@1                                              : Grandmaster's Infernal Scythe
5608: T7_2H_SCYTHE_HELL@2                                              : Grandmaster's Infernal Scythe
5609: T7_2H_SCYTHE_HELL@3                                              : Grandmaster's Infernal Scythe
5610: T8_2H_SCYTHE_HELL                                                : Elder's Infernal Scythe
5611: T8_2H_SCYTHE_HELL@1                                              : Elder's Infernal Scythe
5612: T8_2H_SCYTHE_HELL@2                                              : Elder's Infernal Scythe
5613: T8_2H_SCYTHE_HELL@3                                              : Elder's Infernal Scythe
5614: T4_2H_DUALAXE_KEEPER                                             : Adept's Bear Paws
5615: T4_2H_DUALAXE_KEEPER@1                                           : Adept's Bear Paws
5616: T4_2H_DUALAXE_KEEPER@2                                           : Adept's Bear Paws
5617: T4_2H_DUALAXE_KEEPER@3                                           : Adept's Bear Paws
5618: T5_2H_DUALAXE_KEEPER                                             : Expert's Bear Paws
5619: T5_2H_DUALAXE_KEEPER@1                                           : Expert's Bear Paws
5620: T5_2H_DUALAXE_KEEPER@2                                           : Expert's Bear Paws
5621: T5_2H_DUALAXE_KEEPER@3                                           : Expert's Bear Paws
5622: T6_2H_DUALAXE_KEEPER                                             : Master's Bear Paws
5623: T6_2H_DUALAXE_KEEPER@1                                           : Master's Bear Paws
5624: T6_2H_DUALAXE_KEEPER@2                                           : Master's Bear Paws
5625: T6_2H_DUALAXE_KEEPER@3                                           : Master's Bear Paws
5626: T7_2H_DUALAXE_KEEPER                                             : Grandmaster's Bear Paws
5627: T7_2H_DUALAXE_KEEPER@1                                           : Grandmaster's Bear Paws
5628: T7_2H_DUALAXE_KEEPER@2                                           : Grandmaster's Bear Paws
5629: T7_2H_DUALAXE_KEEPER@3                                           : Grandmaster's Bear Paws
5630: T8_2H_DUALAXE_KEEPER                                             : Elder's Bear Paws
5631: T8_2H_DUALAXE_KEEPER@1                                           : Elder's Bear Paws
5632: T8_2H_DUALAXE_KEEPER@2                                           : Elder's Bear Paws
5633: T8_2H_DUALAXE_KEEPER@3                                           : Elder's Bear Paws
5634: T1_MAIN_SWORD                                                    : Beginner's Broadsword
5635: T2_MAIN_SWORD                                                    : Novice's Broadsword
5636: T3_MAIN_SWORD                                                    : Journeyman's Broadsword
5637: T4_MAIN_SWORD                                                    : Adept's Broadsword
5638: T4_MAIN_SWORD@1                                                  : Adept's Broadsword
5639: T4_MAIN_SWORD@2                                                  : Adept's Broadsword
5640: T4_MAIN_SWORD@3                                                  : Adept's Broadsword
5641: T5_MAIN_SWORD                                                    : Expert's Broadsword
5642: T5_MAIN_SWORD@1                                                  : Expert's Broadsword
5643: T5_MAIN_SWORD@2                                                  : Expert's Broadsword
5644: T5_MAIN_SWORD@3                                                  : Expert's Broadsword
5645: T6_MAIN_SWORD                                                    : Master's Broadsword
5646: T6_MAIN_SWORD@1                                                  : Master's Broadsword
5647: T6_MAIN_SWORD@2                                                  : Master's Broadsword
5648: T6_MAIN_SWORD@3                                                  : Master's Broadsword
5649: T7_MAIN_SWORD                                                    : Grandmaster's Broadsword
5650: T7_MAIN_SWORD@1                                                  : Grandmaster's Broadsword
5651: T7_MAIN_SWORD@2                                                  : Grandmaster's Broadsword
5652: T7_MAIN_SWORD@3                                                  : Grandmaster's Broadsword
5653: T8_MAIN_SWORD                                                    : Elder's Broadsword
5654: T8_MAIN_SWORD@1                                                  : Elder's Broadsword
5655: T8_MAIN_SWORD@2                                                  : Elder's Broadsword
5656: T8_MAIN_SWORD@3                                                  : Elder's Broadsword
5657: T4_2H_CLAYMORE                                                   : Adept's Claymore
5658: T4_2H_CLAYMORE@1                                                 : Adept's Claymore
5659: T4_2H_CLAYMORE@2                                                 : Adept's Claymore
5660: T4_2H_CLAYMORE@3                                                 : Adept's Claymore
5661: T5_2H_CLAYMORE                                                   : Expert's Claymore
5662: T5_2H_CLAYMORE@1                                                 : Expert's Claymore
5663: T5_2H_CLAYMORE@2                                                 : Expert's Claymore
5664: T5_2H_CLAYMORE@3                                                 : Expert's Claymore
5665: T6_2H_CLAYMORE                                                   : Master's Claymore
5666: T6_2H_CLAYMORE@1                                                 : Master's Claymore
5667: T6_2H_CLAYMORE@2                                                 : Master's Claymore
5668: T6_2H_CLAYMORE@3                                                 : Master's Claymore
5669: T7_2H_CLAYMORE                                                   : Grandmaster's Claymore
5670: T7_2H_CLAYMORE@1                                                 : Grandmaster's Claymore
5671: T7_2H_CLAYMORE@2                                                 : Grandmaster's Claymore
5672: T7_2H_CLAYMORE@3                                                 : Grandmaster's Claymore
5673: T8_2H_CLAYMORE                                                   : Elder's Claymore
5674: T8_2H_CLAYMORE@1                                                 : Elder's Claymore
5675: T8_2H_CLAYMORE@2                                                 : Elder's Claymore
5676: T8_2H_CLAYMORE@3                                                 : Elder's Claymore
5677: T4_2H_DUALSWORD                                                  : Adept's Dual Swords
5678: T4_2H_DUALSWORD@1                                                : Adept's Dual Swords
5679: T4_2H_DUALSWORD@2                                                : Adept's Dual Swords
5680: T4_2H_DUALSWORD@3                                                : Adept's Dual Swords
5681: T5_2H_DUALSWORD                                                  : Expert's Dual Swords
5682: T5_2H_DUALSWORD@1                                                : Expert's Dual Swords
5683: T5_2H_DUALSWORD@2                                                : Expert's Dual Swords
5684: T5_2H_DUALSWORD@3                                                : Expert's Dual Swords
5685: T6_2H_DUALSWORD                                                  : Master's Dual Swords
5686: T6_2H_DUALSWORD@1                                                : Master's Dual Swords
5687: T6_2H_DUALSWORD@2                                                : Master's Dual Swords
5688: T6_2H_DUALSWORD@3                                                : Master's Dual Swords
5689: T7_2H_DUALSWORD                                                  : Grandmaster's Dual Swords
5690: T7_2H_DUALSWORD@1                                                : Grandmaster's Dual Swords
5691: T7_2H_DUALSWORD@2                                                : Grandmaster's Dual Swords
5692: T7_2H_DUALSWORD@3                                                : Grandmaster's Dual Swords
5693: T8_2H_DUALSWORD                                                  : Elder's Dual Swords
5694: T8_2H_DUALSWORD@1                                                : Elder's Dual Swords
5695: T8_2H_DUALSWORD@2                                                : Elder's Dual Swords
5696: T8_2H_DUALSWORD@3                                                : Elder's Dual Swords
5697: T4_MAIN_SCIMITAR_MORGANA                                         : Adept's Clarent Blade
5698: T4_MAIN_SCIMITAR_MORGANA@1                                       : Adept's Clarent Blade
5699: T4_MAIN_SCIMITAR_MORGANA@2                                       : Adept's Clarent Blade
5700: T4_MAIN_SCIMITAR_MORGANA@3                                       : Adept's Clarent Blade
5701: T5_MAIN_SCIMITAR_MORGANA                                         : Expert's Clarent Blade
5702: T5_MAIN_SCIMITAR_MORGANA@1                                       : Expert's Clarent Blade
5703: T5_MAIN_SCIMITAR_MORGANA@2                                       : Expert's Clarent Blade
5704: T5_MAIN_SCIMITAR_MORGANA@3                                       : Expert's Clarent Blade
5705: T6_MAIN_SCIMITAR_MORGANA                                         : Master's Clarent Blade
5706: T6_MAIN_SCIMITAR_MORGANA@1                                       : Master's Clarent Blade
5707: T6_MAIN_SCIMITAR_MORGANA@2                                       : Master's Clarent Blade
5708: T6_MAIN_SCIMITAR_MORGANA@3                                       : Master's Clarent Blade
5709: T7_MAIN_SCIMITAR_MORGANA                                         : Grandmaster's Clarent Blade
5710: T7_MAIN_SCIMITAR_MORGANA@1                                       : Grandmaster's Clarent Blade
5711: T7_MAIN_SCIMITAR_MORGANA@2                                       : Grandmaster's Clarent Blade
5712: T7_MAIN_SCIMITAR_MORGANA@3                                       : Grandmaster's Clarent Blade
5713: T8_MAIN_SCIMITAR_MORGANA                                         : Elder's Clarent Blade
5714: T8_MAIN_SCIMITAR_MORGANA@1                                       : Elder's Clarent Blade
5715: T8_MAIN_SCIMITAR_MORGANA@2                                       : Elder's Clarent Blade
5716: T8_MAIN_SCIMITAR_MORGANA@3                                       : Elder's Clarent Blade
5717: T4_2H_CLEAVER_HELL                                               : Adept's Carving Sword
5718: T4_2H_CLEAVER_HELL@1                                             : Adept's Carving Sword
5719: T4_2H_CLEAVER_HELL@2                                             : Adept's Carving Sword
5720: T4_2H_CLEAVER_HELL@3                                             : Adept's Carving Sword
5721: T5_2H_CLEAVER_HELL                                               : Expert's Carving Sword
5722: T5_2H_CLEAVER_HELL@1                                             : Expert's Carving Sword
5723: T5_2H_CLEAVER_HELL@2                                             : Expert's Carving Sword
5724: T5_2H_CLEAVER_HELL@3                                             : Expert's Carving Sword
5725: T6_2H_CLEAVER_HELL                                               : Master's Carving Sword
5726: T6_2H_CLEAVER_HELL@1                                             : Master's Carving Sword
5727: T6_2H_CLEAVER_HELL@2                                             : Master's Carving Sword
5728: T6_2H_CLEAVER_HELL@3                                             : Master's Carving Sword
5729: T7_2H_CLEAVER_HELL                                               : Grandmaster's Carving Sword
5730: T7_2H_CLEAVER_HELL@1                                             : Grandmaster's Carving Sword
5731: T7_2H_CLEAVER_HELL@2                                             : Grandmaster's Carving Sword
5732: T7_2H_CLEAVER_HELL@3                                             : Grandmaster's Carving Sword
5733: T8_2H_CLEAVER_HELL                                               : Elder's Carving Sword
5734: T8_2H_CLEAVER_HELL@1                                             : Elder's Carving Sword
5735: T8_2H_CLEAVER_HELL@2                                             : Elder's Carving Sword
5736: T8_2H_CLEAVER_HELL@3                                             : Elder's Carving Sword
5737: T4_2H_DUALSCIMITAR_UNDEAD                                        : Adept's Galatine Pair
5738: T4_2H_DUALSCIMITAR_UNDEAD@1                                      : Adept's Galatine Pair
5739: T4_2H_DUALSCIMITAR_UNDEAD@2                                      : Adept's Galatine Pair
5740: T4_2H_DUALSCIMITAR_UNDEAD@3                                      : Adept's Galatine Pair
5741: T5_2H_DUALSCIMITAR_UNDEAD                                        : Expert's Galatine Pair
5742: T5_2H_DUALSCIMITAR_UNDEAD@1                                      : Expert's Galatine Pair
5743: T5_2H_DUALSCIMITAR_UNDEAD@2                                      : Expert's Galatine Pair
5744: T5_2H_DUALSCIMITAR_UNDEAD@3                                      : Expert's Galatine Pair
5745: T6_2H_DUALSCIMITAR_UNDEAD                                        : Master's Galatine Pair
5746: T6_2H_DUALSCIMITAR_UNDEAD@1                                      : Master's Galatine Pair
5747: T6_2H_DUALSCIMITAR_UNDEAD@2                                      : Master's Galatine Pair
5748: T6_2H_DUALSCIMITAR_UNDEAD@3                                      : Master's Galatine Pair
5749: T7_2H_DUALSCIMITAR_UNDEAD                                        : Grandmaster's Galatine Pair
5750: T7_2H_DUALSCIMITAR_UNDEAD@1                                      : Grandmaster's Galatine Pair
5751: T7_2H_DUALSCIMITAR_UNDEAD@2                                      : Grandmaster's Galatine Pair
5752: T7_2H_DUALSCIMITAR_UNDEAD@3                                      : Grandmaster's Galatine Pair
5753: T8_2H_DUALSCIMITAR_UNDEAD                                        : Elder's Galatine Pair
5754: T8_2H_DUALSCIMITAR_UNDEAD@1                                      : Elder's Galatine Pair
5755: T8_2H_DUALSCIMITAR_UNDEAD@2                                      : Elder's Galatine Pair
5756: T8_2H_DUALSCIMITAR_UNDEAD@3                                      : Elder's Galatine Pair
5757: T3_2H_QUARTERSTAFF                                               : Journeyman's Quarterstaff
5758: T4_2H_QUARTERSTAFF                                               : Adept's Quarterstaff
5759: T4_2H_QUARTERSTAFF@1                                             : Adept's Quarterstaff
5760: T4_2H_QUARTERSTAFF@2                                             : Adept's Quarterstaff
5761: T4_2H_QUARTERSTAFF@3                                             : Adept's Quarterstaff
5762: T5_2H_QUARTERSTAFF                                               : Expert's Quarterstaff
5763: T5_2H_QUARTERSTAFF@1                                             : Expert's Quarterstaff
5764: T5_2H_QUARTERSTAFF@2                                             : Expert's Quarterstaff
5765: T5_2H_QUARTERSTAFF@3                                             : Expert's Quarterstaff
5766: T6_2H_QUARTERSTAFF                                               : Master's Quarterstaff
5767: T6_2H_QUARTERSTAFF@1                                             : Master's Quarterstaff
5768: T6_2H_QUARTERSTAFF@2                                             : Master's Quarterstaff
5769: T6_2H_QUARTERSTAFF@3                                             : Master's Quarterstaff
5770: T7_2H_QUARTERSTAFF                                               : Grandmaster's Quarterstaff
5771: T7_2H_QUARTERSTAFF@1                                             : Grandmaster's Quarterstaff
5772: T7_2H_QUARTERSTAFF@2                                             : Grandmaster's Quarterstaff
5773: T7_2H_QUARTERSTAFF@3                                             : Grandmaster's Quarterstaff
5774: T8_2H_QUARTERSTAFF                                               : Elder's Quarterstaff
5775: T8_2H_QUARTERSTAFF@1                                             : Elder's Quarterstaff
5776: T8_2H_QUARTERSTAFF@2                                             : Elder's Quarterstaff
5777: T8_2H_QUARTERSTAFF@3                                             : Elder's Quarterstaff
5778: T4_2H_IRONCLADEDSTAFF                                            : Adept's Iron-clad Staff
5779: T4_2H_IRONCLADEDSTAFF@1                                          : Adept's Iron-clad Staff
5780: T4_2H_IRONCLADEDSTAFF@2                                          : Adept's Iron-clad Staff
5781: T4_2H_IRONCLADEDSTAFF@3                                          : Adept's Iron-clad Staff
5782: T5_2H_IRONCLADEDSTAFF                                            : Expert's Iron-clad Staff
5783: T5_2H_IRONCLADEDSTAFF@1                                          : Expert's Iron-clad Staff
5784: T5_2H_IRONCLADEDSTAFF@2                                          : Expert's Iron-clad Staff
5785: T5_2H_IRONCLADEDSTAFF@3                                          : Expert's Iron-clad Staff
5786: T6_2H_IRONCLADEDSTAFF                                            : Master's Iron-clad Staff
5787: T6_2H_IRONCLADEDSTAFF@1                                          : Master's Iron-clad Staff
5788: T6_2H_IRONCLADEDSTAFF@2                                          : Master's Iron-clad Staff
5789: T6_2H_IRONCLADEDSTAFF@3                                          : Master's Iron-clad Staff
5790: T7_2H_IRONCLADEDSTAFF                                            : Grandmaster's Iron-clad Staff
5791: T7_2H_IRONCLADEDSTAFF@1                                          : Grandmaster's Iron-clad Staff
5792: T7_2H_IRONCLADEDSTAFF@2                                          : Grandmaster's Iron-clad Staff
5793: T7_2H_IRONCLADEDSTAFF@3                                          : Grandmaster's Iron-clad Staff
5794: T8_2H_IRONCLADEDSTAFF                                            : Elder's Iron-clad Staff
5795: T8_2H_IRONCLADEDSTAFF@1                                          : Elder's Iron-clad Staff
5796: T8_2H_IRONCLADEDSTAFF@2                                          : Elder's Iron-clad Staff
5797: T8_2H_IRONCLADEDSTAFF@3                                          : Elder's Iron-clad Staff
5798: T4_2H_DOUBLEBLADEDSTAFF                                          : Adept's Double Bladed Staff
5799: T4_2H_DOUBLEBLADEDSTAFF@1                                        : Adept's Double Bladed Staff
5800: T4_2H_DOUBLEBLADEDSTAFF@2                                        : Adept's Double Bladed Staff
5801: T4_2H_DOUBLEBLADEDSTAFF@3                                        : Adept's Double Bladed Staff
5802: T5_2H_DOUBLEBLADEDSTAFF                                          : Expert's Double Bladed Staff
5803: T5_2H_DOUBLEBLADEDSTAFF@1                                        : Expert's Double Bladed Staff
5804: T5_2H_DOUBLEBLADEDSTAFF@2                                        : Expert's Double Bladed Staff
5805: T5_2H_DOUBLEBLADEDSTAFF@3                                        : Expert's Double Bladed Staff
5806: T6_2H_DOUBLEBLADEDSTAFF                                          : Master's Double Bladed Staff
5807: T6_2H_DOUBLEBLADEDSTAFF@1                                        : Master's Double Bladed Staff
5808: T6_2H_DOUBLEBLADEDSTAFF@2                                        : Master's Double Bladed Staff
5809: T6_2H_DOUBLEBLADEDSTAFF@3                                        : Master's Double Bladed Staff
5810: T7_2H_DOUBLEBLADEDSTAFF                                          : Grandmaster's Double Bladed Staff
5811: T7_2H_DOUBLEBLADEDSTAFF@1                                        : Grandmaster's Double Bladed Staff
5812: T7_2H_DOUBLEBLADEDSTAFF@2                                        : Grandmaster's Double Bladed Staff
5813: T7_2H_DOUBLEBLADEDSTAFF@3                                        : Grandmaster's Double Bladed Staff
5814: T8_2H_DOUBLEBLADEDSTAFF                                          : Elder's Double Bladed Staff
5815: T8_2H_DOUBLEBLADEDSTAFF@1                                        : Elder's Double Bladed Staff
5816: T8_2H_DOUBLEBLADEDSTAFF@2                                        : Elder's Double Bladed Staff
5817: T8_2H_DOUBLEBLADEDSTAFF@3                                        : Elder's Double Bladed Staff
5818: T4_2H_COMBATSTAFF_MORGANA                                        : Adept's Black Monk Stave
5819: T4_2H_COMBATSTAFF_MORGANA@1                                      : Adept's Black Monk Stave
5820: T4_2H_COMBATSTAFF_MORGANA@2                                      : Adept's Black Monk Stave
5821: T4_2H_COMBATSTAFF_MORGANA@3                                      : Adept's Black Monk Stave
5822: T5_2H_COMBATSTAFF_MORGANA                                        : Expert's Black Monk Stave
5823: T5_2H_COMBATSTAFF_MORGANA@1                                      : Expert's Black Monk Stave
5824: T5_2H_COMBATSTAFF_MORGANA@2                                      : Expert's Black Monk Stave
5825: T5_2H_COMBATSTAFF_MORGANA@3                                      : Expert's Black Monk Stave
5826: T6_2H_COMBATSTAFF_MORGANA                                        : Master's Black Monk Stave
5827: T6_2H_COMBATSTAFF_MORGANA@1                                      : Master's Black Monk Stave
5828: T6_2H_COMBATSTAFF_MORGANA@2                                      : Master's Black Monk Stave
5829: T6_2H_COMBATSTAFF_MORGANA@3                                      : Master's Black Monk Stave
5830: T7_2H_COMBATSTAFF_MORGANA                                        : Grandmaster's Black Monk Stave
5831: T7_2H_COMBATSTAFF_MORGANA@1                                      : Grandmaster's Black Monk Stave
5832: T7_2H_COMBATSTAFF_MORGANA@2                                      : Grandmaster's Black Monk Stave
5833: T7_2H_COMBATSTAFF_MORGANA@3                                      : Grandmaster's Black Monk Stave
5834: T8_2H_COMBATSTAFF_MORGANA                                        : Elder's Black Monk Stave
5835: T8_2H_COMBATSTAFF_MORGANA@1                                      : Elder's Black Monk Stave
5836: T8_2H_COMBATSTAFF_MORGANA@2                                      : Elder's Black Monk Stave
5837: T8_2H_COMBATSTAFF_MORGANA@3                                      : Elder's Black Monk Stave
5838: T4_2H_TWINSCYTHE_HELL                                            : Adept's Soulscythe
5839: T4_2H_TWINSCYTHE_HELL@1                                          : Adept's Soulscythe
5840: T4_2H_TWINSCYTHE_HELL@2                                          : Adept's Soulscythe
5841: T4_2H_TWINSCYTHE_HELL@3                                          : Adept's Soulscythe
5842: T5_2H_TWINSCYTHE_HELL                                            : Expert's Soulscythe
5843: T5_2H_TWINSCYTHE_HELL@1                                          : Expert's Soulscythe
5844: T5_2H_TWINSCYTHE_HELL@2                                          : Expert's Soulscythe
5845: T5_2H_TWINSCYTHE_HELL@3                                          : Expert's Soulscythe
5846: T6_2H_TWINSCYTHE_HELL                                            : Master's Soulscythe
5847: T6_2H_TWINSCYTHE_HELL@1                                          : Master's Soulscythe
5848: T6_2H_TWINSCYTHE_HELL@2                                          : Master's Soulscythe
5849: T6_2H_TWINSCYTHE_HELL@3                                          : Master's Soulscythe
5850: T7_2H_TWINSCYTHE_HELL                                            : Grandmaster's Soulscythe
5851: T7_2H_TWINSCYTHE_HELL@1                                          : Grandmaster's Soulscythe
5852: T7_2H_TWINSCYTHE_HELL@2                                          : Grandmaster's Soulscythe
5853: T7_2H_TWINSCYTHE_HELL@3                                          : Grandmaster's Soulscythe
5854: T8_2H_TWINSCYTHE_HELL                                            : Elder's Soulscythe
5855: T8_2H_TWINSCYTHE_HELL@1                                          : Elder's Soulscythe
5856: T8_2H_TWINSCYTHE_HELL@2                                          : Elder's Soulscythe
5857: T8_2H_TWINSCYTHE_HELL@3                                          : Elder's Soulscythe
5858: T4_2H_ROCKSTAFF_KEEPER                                           : Adept's Staff of Balance
5859: T4_2H_ROCKSTAFF_KEEPER@1                                         : Adept's Staff of Balance
5860: T4_2H_ROCKSTAFF_KEEPER@2                                         : Adept's Staff of Balance
5861: T4_2H_ROCKSTAFF_KEEPER@3                                         : Adept's Staff of Balance
5862: T5_2H_ROCKSTAFF_KEEPER                                           : Expert's Staff of Balance
5863: T5_2H_ROCKSTAFF_KEEPER@1                                         : Expert's Staff of Balance
5864: T5_2H_ROCKSTAFF_KEEPER@2                                         : Expert's Staff of Balance
5865: T5_2H_ROCKSTAFF_KEEPER@3                                         : Expert's Staff of Balance
5866: T6_2H_ROCKSTAFF_KEEPER                                           : Master's Staff of Balance
5867: T6_2H_ROCKSTAFF_KEEPER@1                                         : Master's Staff of Balance
5868: T6_2H_ROCKSTAFF_KEEPER@2                                         : Master's Staff of Balance
5869: T6_2H_ROCKSTAFF_KEEPER@3                                         : Master's Staff of Balance
5870: T7_2H_ROCKSTAFF_KEEPER                                           : Grandmaster's Staff of Balance
5871: T7_2H_ROCKSTAFF_KEEPER@1                                         : Grandmaster's Staff of Balance
5872: T7_2H_ROCKSTAFF_KEEPER@2                                         : Grandmaster's Staff of Balance
5873: T7_2H_ROCKSTAFF_KEEPER@3                                         : Grandmaster's Staff of Balance
5874: T8_2H_ROCKSTAFF_KEEPER                                           : Elder's Staff of Balance
5875: T8_2H_ROCKSTAFF_KEEPER@1                                         : Elder's Staff of Balance
5876: T8_2H_ROCKSTAFF_KEEPER@2                                         : Elder's Staff of Balance
5877: T8_2H_ROCKSTAFF_KEEPER@3                                         : Elder's Staff of Balance
5878: T3_MAIN_HAMMER                                                   : Journeyman's Hammer
5879: T4_MAIN_HAMMER                                                   : Adept's Hammer
5880: T4_MAIN_HAMMER@1                                                 : Adept's Hammer
5881: T4_MAIN_HAMMER@2                                                 : Adept's Hammer
5882: T4_MAIN_HAMMER@3                                                 : Adept's Hammer
5883: T5_MAIN_HAMMER                                                   : Expert's Hammer
5884: T5_MAIN_HAMMER@1                                                 : Expert's Hammer
5885: T5_MAIN_HAMMER@2                                                 : Expert's Hammer
5886: T5_MAIN_HAMMER@3                                                 : Expert's Hammer
5887: T6_MAIN_HAMMER                                                   : Master's Hammer
5888: T6_MAIN_HAMMER@1                                                 : Master's Hammer
5889: T6_MAIN_HAMMER@2                                                 : Master's Hammer
5890: T6_MAIN_HAMMER@3                                                 : Master's Hammer
5891: T7_MAIN_HAMMER                                                   : Grandmaster's Hammer
5892: T7_MAIN_HAMMER@1                                                 : Grandmaster's Hammer
5893: T7_MAIN_HAMMER@2                                                 : Grandmaster's Hammer
5894: T7_MAIN_HAMMER@3                                                 : Grandmaster's Hammer
5895: T8_MAIN_HAMMER                                                   : Elder's Hammer
5896: T8_MAIN_HAMMER@1                                                 : Elder's Hammer
5897: T8_MAIN_HAMMER@2                                                 : Elder's Hammer
5898: T8_MAIN_HAMMER@3                                                 : Elder's Hammer
5899: T4_2H_POLEHAMMER                                                 : Adept's Polehammer
5900: T4_2H_POLEHAMMER@1                                               : Adept's Polehammer
5901: T4_2H_POLEHAMMER@2                                               : Adept's Polehammer
5902: T4_2H_POLEHAMMER@3                                               : Adept's Polehammer
5903: T5_2H_POLEHAMMER                                                 : Expert's Polehammer
5904: T5_2H_POLEHAMMER@1                                               : Expert's Polehammer
5905: T5_2H_POLEHAMMER@2                                               : Expert's Polehammer
5906: T5_2H_POLEHAMMER@3                                               : Expert's Polehammer
5907: T6_2H_POLEHAMMER                                                 : Master's Polehammer
5908: T6_2H_POLEHAMMER@1                                               : Master's Polehammer
5909: T6_2H_POLEHAMMER@2                                               : Master's Polehammer
5910: T6_2H_POLEHAMMER@3                                               : Master's Polehammer
5911: T7_2H_POLEHAMMER                                                 : Grandmaster's Polehammer
5912: T7_2H_POLEHAMMER@1                                               : Grandmaster's Polehammer
5913: T7_2H_POLEHAMMER@2                                               : Grandmaster's Polehammer
5914: T7_2H_POLEHAMMER@3                                               : Grandmaster's Polehammer
5915: T8_2H_POLEHAMMER                                                 : Elder's Polehammer
5916: T8_2H_POLEHAMMER@1                                               : Elder's Polehammer
5917: T8_2H_POLEHAMMER@2                                               : Elder's Polehammer
5918: T8_2H_POLEHAMMER@3                                               : Elder's Polehammer
5919: T4_2H_HAMMER                                                     : Adept's Great Hammer
5920: T4_2H_HAMMER@1                                                   : Adept's Great Hammer
5921: T4_2H_HAMMER@2                                                   : Adept's Great Hammer
5922: T4_2H_HAMMER@3                                                   : Adept's Great Hammer
5923: T5_2H_HAMMER                                                     : Expert's Great Hammer
5924: T5_2H_HAMMER@1                                                   : Expert's Great Hammer
5925: T5_2H_HAMMER@2                                                   : Expert's Great Hammer
5926: T5_2H_HAMMER@3                                                   : Expert's Great Hammer
5927: T6_2H_HAMMER                                                     : Master's Great Hammer
5928: T6_2H_HAMMER@1                                                   : Master's Great Hammer
5929: T6_2H_HAMMER@2                                                   : Master's Great Hammer
5930: T6_2H_HAMMER@3                                                   : Master's Great Hammer
5931: T7_2H_HAMMER                                                     : Grandmaster's Great Hammer
5932: T7_2H_HAMMER@1                                                   : Grandmaster's Great Hammer
5933: T7_2H_HAMMER@2                                                   : Grandmaster's Great Hammer
5934: T7_2H_HAMMER@3                                                   : Grandmaster's Great Hammer
5935: T8_2H_HAMMER                                                     : Elder's Great Hammer
5936: T8_2H_HAMMER@1                                                   : Elder's Great Hammer
5937: T8_2H_HAMMER@2                                                   : Elder's Great Hammer
5938: T8_2H_HAMMER@3                                                   : Elder's Great Hammer
5939: T4_2H_HAMMER_UNDEAD                                              : Adept's Tombhammer
5940: T4_2H_HAMMER_UNDEAD@1                                            : Adept's Tombhammer
5941: T4_2H_HAMMER_UNDEAD@2                                            : Adept's Tombhammer
5942: T4_2H_HAMMER_UNDEAD@3                                            : Adept's Tombhammer
5943: T5_2H_HAMMER_UNDEAD                                              : Expert's Tombhammer
5944: T5_2H_HAMMER_UNDEAD@1                                            : Expert's Tombhammer
5945: T5_2H_HAMMER_UNDEAD@2                                            : Expert's Tombhammer
5946: T5_2H_HAMMER_UNDEAD@3                                            : Expert's Tombhammer
5947: T6_2H_HAMMER_UNDEAD                                              : Master's Tombhammer
5948: T6_2H_HAMMER_UNDEAD@1                                            : Master's Tombhammer
5949: T6_2H_HAMMER_UNDEAD@2                                            : Master's Tombhammer
5950: T6_2H_HAMMER_UNDEAD@3                                            : Master's Tombhammer
5951: T7_2H_HAMMER_UNDEAD                                              : Grandmaster's Tombhammer
5952: T7_2H_HAMMER_UNDEAD@1                                            : Grandmaster's Tombhammer
5953: T7_2H_HAMMER_UNDEAD@2                                            : Grandmaster's Tombhammer
5954: T7_2H_HAMMER_UNDEAD@3                                            : Grandmaster's Tombhammer
5955: T8_2H_HAMMER_UNDEAD                                              : Elder's Tombhammer
5956: T8_2H_HAMMER_UNDEAD@1                                            : Elder's Tombhammer
5957: T8_2H_HAMMER_UNDEAD@2                                            : Elder's Tombhammer
5958: T8_2H_HAMMER_UNDEAD@3                                            : Elder's Tombhammer
5959: T4_2H_DUALHAMMER_HELL                                            : Adept's Forge Hammers
5960: T4_2H_DUALHAMMER_HELL@1                                          : Adept's Forge Hammers
5961: T4_2H_DUALHAMMER_HELL@2                                          : Adept's Forge Hammers
5962: T4_2H_DUALHAMMER_HELL@3                                          : Adept's Forge Hammers
5963: T5_2H_DUALHAMMER_HELL                                            : Expert's Forge Hammers
5964: T5_2H_DUALHAMMER_HELL@1                                          : Expert's Forge Hammers
5965: T5_2H_DUALHAMMER_HELL@2                                          : Expert's Forge Hammers
5966: T5_2H_DUALHAMMER_HELL@3                                          : Expert's Forge Hammers
5967: T6_2H_DUALHAMMER_HELL                                            : Master's Forge Hammers
5968: T6_2H_DUALHAMMER_HELL@1                                          : Master's Forge Hammers
5969: T6_2H_DUALHAMMER_HELL@2                                          : Master's Forge Hammers
5970: T6_2H_DUALHAMMER_HELL@3                                          : Master's Forge Hammers
5971: T7_2H_DUALHAMMER_HELL                                            : Grandmaster's Forge Hammers
5972: T7_2H_DUALHAMMER_HELL@1                                          : Grandmaster's Forge Hammers
5973: T7_2H_DUALHAMMER_HELL@2                                          : Grandmaster's Forge Hammers
5974: T7_2H_DUALHAMMER_HELL@3                                          : Grandmaster's Forge Hammers
5975: T8_2H_DUALHAMMER_HELL                                            : Elder's Forge Hammers
5976: T8_2H_DUALHAMMER_HELL@1                                          : Elder's Forge Hammers
5977: T8_2H_DUALHAMMER_HELL@2                                          : Elder's Forge Hammers
5978: T8_2H_DUALHAMMER_HELL@3                                          : Elder's Forge Hammers
5979: T4_2H_RAM_KEEPER                                                 : Adept's Grovekeeper
5980: T4_2H_RAM_KEEPER@1                                               : Adept's Grovekeeper
5981: T4_2H_RAM_KEEPER@2                                               : Adept's Grovekeeper
5982: T4_2H_RAM_KEEPER@3                                               : Adept's Grovekeeper
5983: T5_2H_RAM_KEEPER                                                 : Expert's Grovekeeper
5984: T5_2H_RAM_KEEPER@1                                               : Expert's Grovekeeper
5985: T5_2H_RAM_KEEPER@2                                               : Expert's Grovekeeper
5986: T5_2H_RAM_KEEPER@3                                               : Expert's Grovekeeper
5987: T6_2H_RAM_KEEPER                                                 : Master's Grovekeeper
5988: T6_2H_RAM_KEEPER@1                                               : Master's Grovekeeper
5989: T6_2H_RAM_KEEPER@2                                               : Master's Grovekeeper
5990: T6_2H_RAM_KEEPER@3                                               : Master's Grovekeeper
5991: T7_2H_RAM_KEEPER                                                 : Grandmaster's Grovekeeper
5992: T7_2H_RAM_KEEPER@1                                               : Grandmaster's Grovekeeper
5993: T7_2H_RAM_KEEPER@2                                               : Grandmaster's Grovekeeper
5994: T7_2H_RAM_KEEPER@3                                               : Grandmaster's Grovekeeper
5995: T8_2H_RAM_KEEPER                                                 : Elder's Grovekeeper
5996: T8_2H_RAM_KEEPER@1                                               : Elder's Grovekeeper
5997: T8_2H_RAM_KEEPER@2                                               : Elder's Grovekeeper
5998: T8_2H_RAM_KEEPER@3                                               : Elder's Grovekeeper
5999: T3_MAIN_MACE                                                     : Journeyman's Mace
6000: T4_MAIN_MACE                                                     : Adept's Mace
6001: T4_MAIN_MACE@1                                                   : Adept's Mace
6002: T4_MAIN_MACE@2                                                   : Adept's Mace
6003: T4_MAIN_MACE@3                                                   : Adept's Mace
6004: T5_MAIN_MACE                                                     : Expert's Mace
6005: T5_MAIN_MACE@1                                                   : Expert's Mace
6006: T5_MAIN_MACE@2                                                   : Expert's Mace
6007: T5_MAIN_MACE@3                                                   : Expert's Mace
6008: T6_MAIN_MACE                                                     : Master's Mace
6009: T6_MAIN_MACE@1                                                   : Master's Mace
6010: T6_MAIN_MACE@2                                                   : Master's Mace
6011: T6_MAIN_MACE@3                                                   : Master's Mace
6012: T7_MAIN_MACE                                                     : Grandmaster's Mace
6013: T7_MAIN_MACE@1                                                   : Grandmaster's Mace
6014: T7_MAIN_MACE@2                                                   : Grandmaster's Mace
6015: T7_MAIN_MACE@3                                                   : Grandmaster's Mace
6016: T8_MAIN_MACE                                                     : Elder's Mace
6017: T8_MAIN_MACE@1                                                   : Elder's Mace
6018: T8_MAIN_MACE@2                                                   : Elder's Mace
6019: T8_MAIN_MACE@3                                                   : Elder's Mace
6020: T4_2H_MACE                                                       : Adept's Heavy Mace
6021: T4_2H_MACE@1                                                     : Adept's Heavy Mace
6022: T4_2H_MACE@2                                                     : Adept's Heavy Mace
6023: T4_2H_MACE@3                                                     : Adept's Heavy Mace
6024: T5_2H_MACE                                                       : Expert's Heavy Mace
6025: T5_2H_MACE@1                                                     : Expert's Heavy Mace
6026: T5_2H_MACE@2                                                     : Expert's Heavy Mace
6027: T5_2H_MACE@3                                                     : Expert's Heavy Mace
6028: T6_2H_MACE                                                       : Master's Heavy Mace
6029: T6_2H_MACE@1                                                     : Master's Heavy Mace
6030: T6_2H_MACE@2                                                     : Master's Heavy Mace
6031: T6_2H_MACE@3                                                     : Master's Heavy Mace
6032: T7_2H_MACE                                                       : Grandmaster's Heavy Mace
6033: T7_2H_MACE@1                                                     : Grandmaster's Heavy Mace
6034: T7_2H_MACE@2                                                     : Grandmaster's Heavy Mace
6035: T7_2H_MACE@3                                                     : Grandmaster's Heavy Mace
6036: T8_2H_MACE                                                       : Elder's Heavy Mace
6037: T8_2H_MACE@1                                                     : Elder's Heavy Mace
6038: T8_2H_MACE@2                                                     : Elder's Heavy Mace
6039: T8_2H_MACE@3                                                     : Elder's Heavy Mace
6040: T4_2H_FLAIL                                                      : Adept's Morning Star
6041: T4_2H_FLAIL@1                                                    : Adept's Morning Star
6042: T4_2H_FLAIL@2                                                    : Adept's Morning Star
6043: T4_2H_FLAIL@3                                                    : Adept's Morning Star
6044: T5_2H_FLAIL                                                      : Expert's Morning Star
6045: T5_2H_FLAIL@1                                                    : Expert's Morning Star
6046: T5_2H_FLAIL@2                                                    : Expert's Morning Star
6047: T5_2H_FLAIL@3                                                    : Expert's Morning Star
6048: T6_2H_FLAIL                                                      : Master's Morning Star
6049: T6_2H_FLAIL@1                                                    : Master's Morning Star
6050: T6_2H_FLAIL@2                                                    : Master's Morning Star
6051: T6_2H_FLAIL@3                                                    : Master's Morning Star
6052: T7_2H_FLAIL                                                      : Grandmaster's Morning Star
6053: T7_2H_FLAIL@1                                                    : Grandmaster's Morning Star
6054: T7_2H_FLAIL@2                                                    : Grandmaster's Morning Star
6055: T7_2H_FLAIL@3                                                    : Grandmaster's Morning Star
6056: T8_2H_FLAIL                                                      : Elder's Morning Star
6057: T8_2H_FLAIL@1                                                    : Elder's Morning Star
6058: T8_2H_FLAIL@2                                                    : Elder's Morning Star
6059: T8_2H_FLAIL@3                                                    : Elder's Morning Star
6060: T4_MAIN_ROCKMACE_KEEPER                                          : Adept's Bedrock Mace
6061: T4_MAIN_ROCKMACE_KEEPER@1                                        : Adept's Bedrock Mace
6062: T4_MAIN_ROCKMACE_KEEPER@2                                        : Adept's Bedrock Mace
6063: T4_MAIN_ROCKMACE_KEEPER@3                                        : Adept's Bedrock Mace
6064: T5_MAIN_ROCKMACE_KEEPER                                          : Expert's Bedrock Mace
6065: T5_MAIN_ROCKMACE_KEEPER@1                                        : Expert's Bedrock Mace
6066: T5_MAIN_ROCKMACE_KEEPER@2                                        : Expert's Bedrock Mace
6067: T5_MAIN_ROCKMACE_KEEPER@3                                        : Expert's Bedrock Mace
6068: T6_MAIN_ROCKMACE_KEEPER                                          : Master's Bedrock Mace
6069: T6_MAIN_ROCKMACE_KEEPER@1                                        : Master's Bedrock Mace
6070: T6_MAIN_ROCKMACE_KEEPER@2                                        : Master's Bedrock Mace
6071: T6_MAIN_ROCKMACE_KEEPER@3                                        : Master's Bedrock Mace
6072: T7_MAIN_ROCKMACE_KEEPER                                          : Grandmaster's Bedrock Mace
6073: T7_MAIN_ROCKMACE_KEEPER@1                                        : Grandmaster's Bedrock Mace
6074: T7_MAIN_ROCKMACE_KEEPER@2                                        : Grandmaster's Bedrock Mace
6075: T7_MAIN_ROCKMACE_KEEPER@3                                        : Grandmaster's Bedrock Mace
6076: T8_MAIN_ROCKMACE_KEEPER                                          : Elder's Bedrock Mace
6077: T8_MAIN_ROCKMACE_KEEPER@1                                        : Elder's Bedrock Mace
6078: T8_MAIN_ROCKMACE_KEEPER@2                                        : Elder's Bedrock Mace
6079: T8_MAIN_ROCKMACE_KEEPER@3                                        : Elder's Bedrock Mace
6080: T4_MAIN_MACE_HELL                                                : Adept's Incubus Mace
6081: T4_MAIN_MACE_HELL@1                                              : Adept's Incubus Mace
6082: T4_MAIN_MACE_HELL@2                                              : Adept's Incubus Mace
6083: T4_MAIN_MACE_HELL@3                                              : Adept's Incubus Mace
6084: T5_MAIN_MACE_HELL                                                : Expert's Incubus Mace
6085: T5_MAIN_MACE_HELL@1                                              : Expert's Incubus Mace
6086: T5_MAIN_MACE_HELL@2                                              : Expert's Incubus Mace
6087: T5_MAIN_MACE_HELL@3                                              : Expert's Incubus Mace
6088: T6_MAIN_MACE_HELL                                                : Master's Incubus Mace
6089: T6_MAIN_MACE_HELL@1                                              : Master's Incubus Mace
6090: T6_MAIN_MACE_HELL@2                                              : Master's Incubus Mace
6091: T6_MAIN_MACE_HELL@3                                              : Master's Incubus Mace
6092: T7_MAIN_MACE_HELL                                                : Grandmaster's Incubus Mace
6093: T7_MAIN_MACE_HELL@1                                              : Grandmaster's Incubus Mace
6094: T7_MAIN_MACE_HELL@2                                              : Grandmaster's Incubus Mace
6095: T7_MAIN_MACE_HELL@3                                              : Grandmaster's Incubus Mace
6096: T8_MAIN_MACE_HELL                                                : Elder's Incubus Mace
6097: T8_MAIN_MACE_HELL@1                                              : Elder's Incubus Mace
6098: T8_MAIN_MACE_HELL@2                                              : Elder's Incubus Mace
6099: T8_MAIN_MACE_HELL@3                                              : Elder's Incubus Mace
6100: T4_2H_MACE_MORGANA                                               : Adept's Camlann Mace
6101: T4_2H_MACE_MORGANA@1                                             : Adept's Camlann Mace
6102: T4_2H_MACE_MORGANA@2                                             : Adept's Camlann Mace
6103: T4_2H_MACE_MORGANA@3                                             : Adept's Camlann Mace
6104: T5_2H_MACE_MORGANA                                               : Expert's Camlann Mace
6105: T5_2H_MACE_MORGANA@1                                             : Expert's Camlann Mace
6106: T5_2H_MACE_MORGANA@2                                             : Expert's Camlann Mace
6107: T5_2H_MACE_MORGANA@3                                             : Expert's Camlann Mace
6108: T6_2H_MACE_MORGANA                                               : Master's Camlann Mace
6109: T6_2H_MACE_MORGANA@1                                             : Master's Camlann Mace
6110: T6_2H_MACE_MORGANA@2                                             : Master's Camlann Mace
6111: T6_2H_MACE_MORGANA@3                                             : Master's Camlann Mace
6112: T7_2H_MACE_MORGANA                                               : Grandmaster's Camlann Mace
6113: T7_2H_MACE_MORGANA@1                                             : Grandmaster's Camlann Mace
6114: T7_2H_MACE_MORGANA@2                                             : Grandmaster's Camlann Mace
6115: T7_2H_MACE_MORGANA@3                                             : Grandmaster's Camlann Mace
6116: T8_2H_MACE_MORGANA                                               : Elder's Camlann Mace
6117: T8_2H_MACE_MORGANA@1                                             : Elder's Camlann Mace
6118: T8_2H_MACE_MORGANA@2                                             : Elder's Camlann Mace
6119: T8_2H_MACE_MORGANA@3                                             : Elder's Camlann Mace
6120: T2_FURNITUREITEM_TROPHY_GENERAL                                  : Adventurer's Handbook
6121: T3_FURNITUREITEM_TROPHY_GENERAL                                  : Magical Tome
6122: T4_FURNITUREITEM_TROPHY_GENERAL                                  : Ancient Scripture
6123: T5_FURNITUREITEM_TROPHY_GENERAL                                  : Tome of Knowledge
6124: T6_FURNITUREITEM_TROPHY_GENERAL                                  : Encyclopedia of Power
6125: T7_FURNITUREITEM_TROPHY_GENERAL                                  : Occult Octavo
6126: T8_FURNITUREITEM_TROPHY_GENERAL                                  : Ledger of Truths
6127: T8_FURNITUREITEM_TROPHY_FISHING_BOSS                             : Trophy Shark
6128: T2_FURNITUREITEM_TROPHY_MERCENARY                                : Novice Mercenary's Trophy
6129: T3_FURNITUREITEM_TROPHY_MERCENARY                                : Journeyman Mercenary's Trophy
6130: T4_FURNITUREITEM_TROPHY_MERCENARY                                : Adept Mercenary's Trophy
6131: T5_FURNITUREITEM_TROPHY_MERCENARY                                : Expert Mercenary's Trophy
6132: T6_FURNITUREITEM_TROPHY_MERCENARY                                : Master Mercenary's Trophy
6133: T7_FURNITUREITEM_TROPHY_MERCENARY                                : Grandmaster Mercenary's Trophy
6134: T8_FURNITUREITEM_TROPHY_MERCENARY                                : Elder Mercenary's Trophy
6135: T2_FURNITUREITEM_TROPHY_HIDE                                     : Stuffed Fox Head
6136: T3_FURNITUREITEM_TROPHY_HIDE                                     : Stuffed Wolf Head
6137: T4_FURNITUREITEM_TROPHY_HIDE                                     : Stuffed Boar Head
6138: T5_FURNITUREITEM_TROPHY_HIDE                                     : Stuffed Bear Head
6139: T6_FURNITUREITEM_TROPHY_HIDE                                     : Stuffed Direwolf Head
6140: T7_FURNITUREITEM_TROPHY_HIDE                                     : Stuffed Direboar Head
6141: T8_FURNITUREITEM_TROPHY_HIDE                                     : Stuffed Direbear Head
6142: T2_FURNITUREITEM_TROPHY_ORE                                      : Copper Ore Sample
6143: T3_FURNITUREITEM_TROPHY_ORE                                      : Tin Ore Sample
6144: T4_FURNITUREITEM_TROPHY_ORE                                      : Iron Ore Sample
6145: T5_FURNITUREITEM_TROPHY_ORE                                      : Titanium Ore Sample
6146: T6_FURNITUREITEM_TROPHY_ORE                                      : Runite Ore Sample
6147: T7_FURNITUREITEM_TROPHY_ORE                                      : Meteorite Ore Sample
6148: T8_FURNITUREITEM_TROPHY_ORE                                      : Adamantium Ore Sample
6149: T2_FURNITUREITEM_TROPHY_FIBER                                    : Comfy Cotton Trophy
6150: T3_FURNITUREITEM_TROPHY_FIBER                                    : Fine Flax Trophy
6151: T4_FURNITUREITEM_TROPHY_FIBER                                    : Exquisite Hemp Trophy
6152: T5_FURNITUREITEM_TROPHY_FIBER                                    : Soft Skyflower Trophy
6153: T6_FURNITUREITEM_TROPHY_FIBER                                    : Comfy Redleaf Cotton Trophy
6154: T7_FURNITUREITEM_TROPHY_FIBER                                    : Fine Sunflax Trophy
6155: T8_FURNITUREITEM_TROPHY_FIBER                                    : Exquisite Ghost Hemp Trophy
6156: T2_FURNITUREITEM_TROPHY_ROCK                                     : Limestone Fragment
6157: T3_FURNITUREITEM_TROPHY_ROCK                                     : Sandstone Fragment
6158: T4_FURNITUREITEM_TROPHY_ROCK                                     : Travertine Fragment
6159: T5_FURNITUREITEM_TROPHY_ROCK                                     : Granite Fragment
6160: T6_FURNITUREITEM_TROPHY_ROCK                                     : Slate Fragment
6161: T7_FURNITUREITEM_TROPHY_ROCK                                     : Basalt Fragment
6162: T8_FURNITUREITEM_TROPHY_ROCK                                     : Marble Fragment
6163: T2_FURNITUREITEM_TROPHY_WOOD                                     : Birch Bonsai
6164: T3_FURNITUREITEM_TROPHY_WOOD                                     : Chestnut Bonsai
6165: T4_FURNITUREITEM_TROPHY_WOOD                                     : Pine Bonsai
6166: T5_FURNITUREITEM_TROPHY_WOOD                                     : Cedar Bonsai
6167: T6_FURNITUREITEM_TROPHY_WOOD                                     : Bloodoak Bonsai
6168: T7_FURNITUREITEM_TROPHY_WOOD                                     : Ashenbark Bonsai
6169: T8_FURNITUREITEM_TROPHY_WOOD                                     : Whitewood Bonsai
6170: T2_FURNITUREITEM_TROPHY_FISH                                     : Carp Trophy
6171: T3_FURNITUREITEM_TROPHY_FISH                                     : Perch Trophy
6172: T4_FURNITUREITEM_TROPHY_FISH                                     : Pike Trophy
6173: T5_FURNITUREITEM_TROPHY_FISH                                     : Trout Trophy
6174: T6_FURNITUREITEM_TROPHY_FISH                                     : Zander Trophy
6175: T7_FURNITUREITEM_TROPHY_FISH                                     : Catfish Trophy
6176: T8_FURNITUREITEM_TROPHY_FISH                                     : Swordfish Trophy
6177: UNIQUE_WEAPONMASTER_HEAD_PROTOTYPE                               
6178: UNIQUE_WEAPONMASTER_ARMOR_PROTOTYPE                              
6179: UNIQUE_WEAPONMASTER_SHOES_PROTOTYPE                              
6180: UNIQUE_WEAPONMASTER_POTION_PROTOTYPE                             
6181: UNIQUE_WEAPONMASTER_IDLE_PROTOTYPE                               
6182: UNIQUE_GVGTOKEN_GENERIC                                          : Siphoned Energy
6183: T4_CAPEITEM_FW_BRIDGEWATCH_BP                                    : Adept's Bridgewatch Crest
6184: T5_CAPEITEM_FW_BRIDGEWATCH_BP                                    : Expert's Bridgewatch Crest
6185: T6_CAPEITEM_FW_BRIDGEWATCH_BP                                    : Master's Bridgewatch Crest
6186: T7_CAPEITEM_FW_BRIDGEWATCH_BP                                    : Grandmaster's Bridgewatch Crest
6187: T8_CAPEITEM_FW_BRIDGEWATCH_BP                                    : Elder's Bridgewatch Crest
6188: T4_CAPEITEM_FW_FORTSTERLING_BP                                   : Adept's Fort Sterling Crest
6189: T5_CAPEITEM_FW_FORTSTERLING_BP                                   : Expert's Fort Sterling Crest
6190: T6_CAPEITEM_FW_FORTSTERLING_BP                                   : Master's Fort Sterling Crest
6191: T7_CAPEITEM_FW_FORTSTERLING_BP                                   : Grandmaster's Fort Sterling Crest
6192: T8_CAPEITEM_FW_FORTSTERLING_BP                                   : Elder's Fort Sterling Crest
6193: T4_CAPEITEM_FW_LYMHURST_BP                                       : Adept's Lymhurst Crest
6194: T5_CAPEITEM_FW_LYMHURST_BP                                       : Expert's Lymhurst Crest
6195: T6_CAPEITEM_FW_LYMHURST_BP                                       : Master's Lymhurst Crest
6196: T7_CAPEITEM_FW_LYMHURST_BP                                       : Grandmaster's Lymhurst Crest
6197: T8_CAPEITEM_FW_LYMHURST_BP                                       : Elder's Lymhurst Crest
6198: T4_CAPEITEM_FW_MARTLOCK_BP                                       : Adept's Martlock Crest
6199: T5_CAPEITEM_FW_MARTLOCK_BP                                       : Expert's Martlock Crest
6200: T6_CAPEITEM_FW_MARTLOCK_BP                                       : Master's Martlock Crest
6201: T7_CAPEITEM_FW_MARTLOCK_BP                                       : Grandmaster's Martlock Crest
6202: T8_CAPEITEM_FW_MARTLOCK_BP                                       : Elder's Martlock Crest
6203: T4_CAPEITEM_FW_THETFORD_BP                                       : Adept's Thetford Crest
6204: T5_CAPEITEM_FW_THETFORD_BP                                       : Expert's Thetford Crest
6205: T6_CAPEITEM_FW_THETFORD_BP                                       : Master's Thetford Crest
6206: T7_CAPEITEM_FW_THETFORD_BP                                       : Grandmaster's Thetford Crest
6207: T8_CAPEITEM_FW_THETFORD_BP                                       : Elder's Thetford Crest
6208: T4_CAPEITEM_HERETIC_BP                                           : Adept's Heretic Crest
6209: T5_CAPEITEM_HERETIC_BP                                           : Expert's Heretic Crest
6210: T6_CAPEITEM_HERETIC_BP                                           : Master's Heretic Crest
6211: T7_CAPEITEM_HERETIC_BP                                           : Grandmaster's Heretic Crest
6212: T8_CAPEITEM_HERETIC_BP                                           : Elder's Heretic Crest
6213: T4_CAPEITEM_UNDEAD_BP                                            : Adept's Undead Crest
6214: T5_CAPEITEM_UNDEAD_BP                                            : Expert's Undead Crest
6215: T6_CAPEITEM_UNDEAD_BP                                            : Master's Undead Crest
6216: T7_CAPEITEM_UNDEAD_BP                                            : Grandmaster's Undead Crest
6217: T8_CAPEITEM_UNDEAD_BP                                            : Elder's Undead Crest
6218: T4_CAPEITEM_KEEPER_BP                                            : Adept's Keeper Crest
6219: T5_CAPEITEM_KEEPER_BP                                            : Expert's Keeper Crest
6220: T6_CAPEITEM_KEEPER_BP                                            : Master's Keeper Crest
6221: T7_CAPEITEM_KEEPER_BP                                            : Grandmaster's Keeper Crest
6222: T8_CAPEITEM_KEEPER_BP                                            : Elder's Keeper Crest
6223: T4_CAPEITEM_MORGANA_BP                                           : Adept's Morgana Crest
6224: T5_CAPEITEM_MORGANA_BP                                           : Expert's Morgana Crest
6225: T6_CAPEITEM_MORGANA_BP                                           : Master's Morgana Crest
6226: T7_CAPEITEM_MORGANA_BP                                           : Grandmaster's Morgana Crest
6227: T8_CAPEITEM_MORGANA_BP                                           : Elder's Morgana Crest
6228: T4_CAPEITEM_DEMON_BP                                             : Adept's Demon Crest
6229: T5_CAPEITEM_DEMON_BP                                             : Expert's Demon Crest
6230: T6_CAPEITEM_DEMON_BP                                             : Master's Demon Crest
6231: T7_CAPEITEM_DEMON_BP                                             : Grandmaster's Demon Crest
6232: T8_CAPEITEM_DEMON_BP                                             : Elder's Demon Crest
6233: T1_FACTION_FOREST_TOKEN_1                                        : Treeheart
6234: T1_FACTION_HIGHLAND_TOKEN_1                                      : Rockheart
6235: T1_FACTION_STEPPE_TOKEN_1                                        : Beastheart
6236: T1_FACTION_MOUNTAIN_TOKEN_1                                      : Mountainheart
6237: T1_FACTION_SWAMP_TOKEN_1                                         : Vineheart
6238: T4_LOOTCHEST_CRYSTAL_LEAGUE                                      : Adept's Crystal League Chest
6239: T5_LOOTCHEST_CRYSTAL_LEAGUE                                      : Expert's Crystal League Chest
6240: T6_LOOTCHEST_CRYSTAL_LEAGUE                                      : Master's Crystal League Chest
6241: T7_LOOTCHEST_CRYSTAL_LEAGUE                                      : Grandmaster's Crystal League Chest
6242: T8_LOOTCHEST_CRYSTAL_LEAGUE                                      : Elder's Crystal League Chest
6243: UNIQUE_SKILLBOOK_ADC_GENERAL_01                                  : Adventurer's Tome
6244: UNIQUE_SILVERBAG_ADC_GENERAL_01                                  : Bag of Silver
6245: UNIQUE_REPAIRPOWDER_ADC_GENERAL_01                               : Scroll of Repair
6246: UNIQUE_FOCUSPOTION_ADC_GENERAL_01                                : Focus Restoration Potion
6247: UNIQUE_FOCUSPOTION_ADC_NONTRADABLE_01                            : Focus Restoration Potion
6248: UNIQUE_FOCUSPOTION_TUTORIAL_01                                   : Diluted Focus Restoration Potion
6249: UNIQUE_LOOTCHEST_ADC_OCT2018_01                                  : Harvest Challenge Chest
6250: UNIQUE_LOOTCHEST_ADC_NOV2018                                     : Grim Challenge Chest
6251: UNIQUE_LOOTCHEST_ADC_DEC2018                                     : Yuletide Challenge Chest
6252: UNIQUE_LOOTCHEST_ADC_JAN2019                                     : Frost Challenge Chest
6253: UNIQUE_LOOTCHEST_ADC_FEB2019                                     : Carnival Challenge Chest
6254: UNIQUE_LOOTCHEST_ADC_MAR2019                                     : Keeper Challenge Chest
6255: UNIQUE_LOOTCHEST_ADC_APR2019                                     : Hunter Challenge Chest
6256: UNIQUE_LOOTCHEST_ADC_MAY2019                                     : Morgana Challenge Chest
6257: UNIQUE_LOOTCHEST_ADC_JUN2019                                     : Knight Challenge Chest
6258: UNIQUE_LOOTCHEST_ADC_JUL2019                                     : Undead Challenge Chest
6259: UNIQUE_LOOTCHEST_ADC_AUG2019                                     : Divine Challenge Chest
6260: UNIQUE_LOOTCHEST_ADC_SEP2019                                     : Heretic Challenge Chest
6261: UNIQUE_LOOTCHEST_ADC_OCT2019                                     : Harvest Challenge Chest
6262: UNIQUE_AVATARRING_ADC_NOV2018                                    : Avatar Ring: Grim Challenge
6263: UNIQUE_AVATARRING_ADC_DEC2018                                    : Avatar Ring: Yuletide Challenge
6264: UNIQUE_AVATARRING_ADC_JAN2019                                    : Avatar Ring: Frost Challenge
6265: UNIQUE_AVATARRING_ADC_FEB2019                                    : Avatar Ring: Carnival Challenge
6266: UNIQUE_AVATARRING_ADC_MAR2019                                    : Avatar Ring: Keeper Challenge
6267: UNIQUE_AVATARRING_ADC_APR2019                                    : Avatar Ring: Hunter Challenge
6268: UNIQUE_AVATARRING_ADC_MAY2019                                    : Avatar Ring: Morgana Challenge
6269: UNIQUE_AVATARRING_ADC_JUN2019                                    : Avatar Ring: Knight Challenge
6270: UNIQUE_AVATARRING_ADC_JUL2019                                    : Avatar Ring: Undead Challenge
6271: UNIQUE_AVATARRING_ADC_AUG2019                                    : Avatar Ring: Divine Challenge
6272: UNIQUE_AVATARRING_ADC_SEP2019                                    : Avatar Ring: Heretic Challenge
6273: UNIQUE_AVATARRING_ADC_OCT2019                                    : Avatar Ring: Harvest Challenge
6274: UNIQUE_AVATARRING_ADC_TOKENLOCKED_01                             : Avatar Ring: Adventurer
6275: UNIQUE_AVATAR_ADC_TOKENLOCKED_01                                 : Avatar: Adventurer
6276: UNIQUE_AVATARRING_GVGSEASONREWARD_1ST                            : Avatar Ring: Season 1st Place
6277: UNIQUE_AVATARRING_GVGSEASONREWARD_2ND                            : Avatar Ring: Season 2nd Place
6278: UNIQUE_AVATARRING_GVGSEASONREWARD_3RD                            : Avatar Ring: Season 3rd Place
6279: UNIQUE_AVATARRING_GVGSEASONREWARD_CRYSTAL                        : Avatar Ring Set: Season Crystal Rank
6280: UNIQUE_AVATARRING_GVGSEASONREWARD_GOLD                           : Avatar Ring Set: Season Gold Rank
6281: UNIQUE_AVATARRING_GVGSEASONREWARD_SILVER                         : Avatar Ring Set: Season Silver Rank
6282: UNIQUE_AVATARRING_GVGSEASONREWARD_BRONZE                         : Avatar Ring Set: Season Bronze Rank
6283: UNIQUE_AVATARRING_GVGSEASONREWARD_IRON                           : Avatar Ring: Season Iron Rank
6284: UNIQUE_AVATARRING_GVGSEASONREWARD_AVALON_INVASION                : Avatar Ring: Avalonian Invasion
6285: UNIQUE_AVATARRING_TELLAFRIEND                                    : Avatar Ring: Recruiter
6286: UNIQUE_AVATARRING_ORIGINAL_PLAYER                                : Avatar Ring: Seasoned Adventurer
6287: UNIQUE_AVATAR_GVGSEASON_04                                       : Avatar: Guild Season 4
6288: UNIQUE_AVATAR_GVGSEASON_05                                       : Avatar: Guild Season 5
6289: UNIQUE_AVATAR_GVGSEASON_06                                       : Avatar: Guild Season 6
6290: UNIQUE_AVATAR_GVGSEASON_07                                       : Avatar: Guild Season 7
6291: UNIQUE_AVATAR_GVGSEASON_AVALON_INVASION                          : Avatar: Avalonian Invasion
6292: T6_RANDOM_DUNGEON_ELITE_TOKEN_1                                  : Master's Dungeon Map (Large Group)
6293: T7_RANDOM_DUNGEON_ELITE_TOKEN_1                                  : Grandmaster's Dungeon Map (Large Group)
6294: T8_RANDOM_DUNGEON_ELITE_TOKEN_1                                  : Elder's Dungeon Map (Large Group)
6295: T6_RANDOM_DUNGEON_ELITE_TOKEN_2@1                                : Uncommon Master's Dungeon Map (Large Group)
6296: T7_RANDOM_DUNGEON_ELITE_TOKEN_2@1                                : Uncommon Grandmaster's Dungeon Map (Large Group)
6297: T8_RANDOM_DUNGEON_ELITE_TOKEN_2@1                                : Uncommon Elder's Dungeon Map (Large Group)
6298: T6_RANDOM_DUNGEON_ELITE_TOKEN_3@2                                : Rare Master's Dungeon Map (Large Group)
6299: T7_RANDOM_DUNGEON_ELITE_TOKEN_3@2                                : Rare Grandmaster's Dungeon Map (Large Group)
6300: T8_RANDOM_DUNGEON_ELITE_TOKEN_3@2                                : Rare Elder's Dungeon Map (Large Group)
6301: T6_RANDOM_DUNGEON_ELITE_TOKEN_4@3                                : Exceptional Master's Dungeon Map (Large Group)
6302: T7_RANDOM_DUNGEON_ELITE_TOKEN_4@3                                : Exceptional Grandmaster's Dungeon Map (Large Group)
6303: T8_RANDOM_DUNGEON_ELITE_TOKEN_4@3                                : Exceptional Elder's Dungeon Map (Large Group)
6304: T4_RANDOM_DUNGEON_SOLO_TOKEN_1                                   : Adept's Dungeon Map (Solo)
6305: T5_RANDOM_DUNGEON_SOLO_TOKEN_1                                   : Expert's Dungeon Map (Solo)
6306: T6_RANDOM_DUNGEON_SOLO_TOKEN_1                                   : Master's Dungeon Map (Solo)
6307: T7_RANDOM_DUNGEON_SOLO_TOKEN_1                                   : Grandmaster's Dungeon Map (Solo)
6308: T8_RANDOM_DUNGEON_SOLO_TOKEN_1                                   : Elder's Dungeon Map (Solo)
6309: T4_RANDOM_DUNGEON_SOLO_TOKEN_2@1                                 : Uncommon Adept's Dungeon Map (Solo)
6310: T5_RANDOM_DUNGEON_SOLO_TOKEN_2@1                                 : Uncommon Expert's Dungeon Map (Solo)
6311: T6_RANDOM_DUNGEON_SOLO_TOKEN_2@1                                 : Uncommon Master's Dungeon Map (Solo)
6312: T7_RANDOM_DUNGEON_SOLO_TOKEN_2@1                                 : Uncommon Grandmaster's Dungeon Map (Solo)
6313: T8_RANDOM_DUNGEON_SOLO_TOKEN_2@1                                 : Uncommon Elder's Dungeon Map (Solo)
6314: T4_RANDOM_DUNGEON_SOLO_TOKEN_3@2                                 : Rare Adept's Dungeon Map (Solo)
6315: T5_RANDOM_DUNGEON_SOLO_TOKEN_3@2                                 : Rare Expert's Dungeon Map (Solo)
6316: T6_RANDOM_DUNGEON_SOLO_TOKEN_3@2                                 : Rare Master's Dungeon Map (Solo)
6317: T7_RANDOM_DUNGEON_SOLO_TOKEN_3@2                                 : Rare Grandmaster's Dungeon Map (Solo)
6318: T8_RANDOM_DUNGEON_SOLO_TOKEN_3@2                                 : Rare Elder's Dungeon Map (Solo)
6319: T4_RANDOM_DUNGEON_SOLO_TOKEN_4@3                                 : Exceptional Adept's Dungeon Map (Solo)
6320: T5_RANDOM_DUNGEON_SOLO_TOKEN_4@3                                 : Exceptional Expert's Dungeon Map (Solo)
6321: T6_RANDOM_DUNGEON_SOLO_TOKEN_4@3                                 : Exceptional Master's Dungeon Map (Solo)
6322: T7_RANDOM_DUNGEON_SOLO_TOKEN_4@3                                 : Exceptional Grandmaster's Dungeon Map (Solo)
6323: T8_RANDOM_DUNGEON_SOLO_TOKEN_4@3                                 : Exceptional Elder's Dungeon Map (Solo)
6324: T4_RANDOM_DUNGEON_TOKEN_1                                        : Adept's Dungeon Map (Group)
6325: T5_RANDOM_DUNGEON_TOKEN_1                                        : Expert's Dungeon Map (Group)
6326: T6_RANDOM_DUNGEON_TOKEN_1                                        : Master's Dungeon Map (Group)
6327: T7_RANDOM_DUNGEON_TOKEN_1                                        : Grandmaster's Dungeon Map (Group)
6328: T8_RANDOM_DUNGEON_TOKEN_1                                        : Elder's Dungeon Map (Group)
6329: T4_RANDOM_DUNGEON_TOKEN_2@1                                      : Uncommon Adept's Dungeon Map (Group)
6330: T5_RANDOM_DUNGEON_TOKEN_2@1                                      : Uncommon Expert's Dungeon Map (Group)
6331: T6_RANDOM_DUNGEON_TOKEN_2@1                                      : Uncommon Master's Dungeon Map (Group)
6332: T7_RANDOM_DUNGEON_TOKEN_2@1                                      : Uncommon Grandmaster's Dungeon Map (Group)
6333: T8_RANDOM_DUNGEON_TOKEN_2@1                                      : Uncommon Elder's Dungeon Map (Group)
6334: T4_RANDOM_DUNGEON_TOKEN_3@2                                      : Rare Adept's Dungeon Map (Group)
6335: T5_RANDOM_DUNGEON_TOKEN_3@2                                      : Rare Expert's Dungeon Map (Group)
6336: T6_RANDOM_DUNGEON_TOKEN_3@2                                      : Rare Master's Dungeon Map (Group)
6337: T7_RANDOM_DUNGEON_TOKEN_3@2                                      : Rare Grandmaster's Dungeon Map (Group)
6338: T8_RANDOM_DUNGEON_TOKEN_3@2                                      : Rare Elder's Dungeon Map (Group)
6339: T4_RANDOM_DUNGEON_TOKEN_4@3                                      : Exceptional Adept's Dungeon Map (Group)
6340: T5_RANDOM_DUNGEON_TOKEN_4@3                                      : Exceptional Expert's Dungeon Map (Group)
6341: T6_RANDOM_DUNGEON_TOKEN_4@3                                      : Exceptional Master's Dungeon Map (Group)
6342: T7_RANDOM_DUNGEON_TOKEN_4@3                                      : Exceptional Grandmaster's Dungeon Map (Group)
6343: T8_RANDOM_DUNGEON_TOKEN_4@3                                      : Exceptional Elder's Dungeon Map (Group)
6344: SKIN_HORSE_FOUNDER_LEGENDARY                                     : Legendary Explorer's Horse
6345: UNIQUE_UNLOCK_SKIN_HORSE_FOUNDER_LEGENDARY                       : Riding Horse Skin: Legendary Explorer
6346: SKIN_HORSE_STARTERPACK                                           : Legendary Adventurer's Horse
6347: UNIQUE_UNLOCK_SKIN_HORSE_STARTERPACK                             : Riding Horse Skin: Legendary Adventurer
6348: SKIN_HORSE_TELLAFRIEND                                           : Recruiter's Horse
6349: UNIQUE_UNLOCK_SKIN_HORSE_TELLAFRIEND                             : Riding Horse Skin: Recruiter
6350: SKIN_HORSE_PONY_TELLAFRIEND                                      : Recruiter's Pony
6351: UNIQUE_UNLOCK_SKIN_HORSE_PONY_TELLAFRIEND                        : Riding Horse Skin: Recruiter's Pony
6352: SKIN_HORSE_UNDEAD                                                : Bonehorse
6353: UNIQUE_UNLOCK_SKIN_HORSE_UNDEAD                                  : Riding Horse Skin: Bonehorse
6354: SKIN_HORSE_UNDEAD_HALLOWEEN                                      : Horse Macabre
6355: UNIQUE_UNLOCK_SKIN_HORSE_UNDEAD_HALLOWEEN                        : Riding Horse Skin: Horse Macabre
6356: SKIN_HORSE_BROWN                                                 : Brown Mare
6357: SKIN_HORSE_KEEPER                                                : Keeper Horse
6358: SKIN_HORSE_UNICORN                                               : Nightshade Unicorn
6359: SKIN_HORSE_GUILDBANNER                                           : Jousting Horse
6360: UNIQUE_UNLOCK_SKIN_HORSE_GUILDBANNER                             : Riding Horse Skin: Jousting Horse
6361: SKIN_ARMORED_HORSE_ARENA                                         : Arena Veteran's Armored Horse
6362: UNIQUE_UNLOCK_SKIN_ARMORED_HORSE_ARENA                           : Armored Horse Skin: Arena Veteran
6363: SKIN_ARMORED_HORSE_MORGANA                                       : Morgana Mare
6364: UNIQUE_UNLOCK_SKIN_ARMORED_HORSE_MORGANA                         : Armored Horse Skin: Morgana Mare
6365: SKIN_ARMORED_HORSE_UNDEAD                                        : Armored Bonehorse
6366: UNIQUE_UNLOCK_SKIN_ARMORED_HORSE_UNDEAD                          : Armored Horse Skin: Armored Bonehorse
6367: SKIN_ARMORED_HORSE_T5_MOUNT_GUILD                                : Expert's Guild Warhorse
6368: SKIN_ARMORED_HORSE_T6_MOUNT_GUILD                                : Master's Guild Warhorse
6369: SKIN_ARMORED_HORSE_T7_MOUNT_GUILD                                : Grandmaster's Guild Warhorse
6370: SKIN_ARMORED_HORSE_T8_MOUNT_GUILD                                : Elder's Guild Warhorse
6371: SKIN_OX_FOUNDER_LEGENDARY                                        : Legendary Explorer's Ox
6372: UNIQUE_UNLOCK_SKIN_OX_FOUNDER_LEGENDARY                          : Transport Ox Skin: Legendary Explorer
6373: SKIN_OX_CART_STARTERPACK                                         : Legendary Adventurer's Cart
6374: UNIQUE_UNLOCK_SKIN_OX_CART_STARTERPACK                           : Transport Ox Skin: Legendary Adventurer's Cart
6375: SKIN_OX_YAK_TELLAFRIEND                                          : Recruiter's Yak
6376: UNIQUE_UNLOCK_SKIN_OX_YAK_TELLAFRIEND                            : Transport Ox Skin: Recruiter's Yak
6377: SKIN_OX_TRANSPORT_RAM_TELLAFRIEND                                : Recruiter's Bighorn Ram
6378: UNIQUE_UNLOCK_SKIN_OX_TRANSPORT_RAM_TELLAFRIEND                  : Transport Ox Skin: Recruiter's Bighorn Ram
6379: SKIN_OX_BLACKMARKET                                              : Black Market Ox
6380: SKIN_OX_BISON_AH                                                 : Auction House Ox
6381: SKIN_OX_BISON_ROYAL                                              : Royal Ox
6382: SKIN_OX_CART_HERETIC                                             : Heretic Cart
6383: UNIQUE_UNLOCK_SKIN_OX_CART_HERETIC                               : Transport Ox Skin: Heretic Cart
6384: SKIN_DIREWOLF_WHITE                                              : Ghostwolf
6385: UNIQUE_UNLOCK_SKIN_DIREWOLF_WHITE                                : Direwolf Skin: Ghostwolf
6386: SKIN_DIREWOLF_SPECTER                                            : Specter Wolf
6387: UNIQUE_UNLOCK_SKIN_DIREWOLF_SPECTER                              : Direwolf Skin: Specter Wolf
6388: SKIN_DIREWOLF_GREY_TELLAFRIEND                                   : Recruiter's Grey Wolf
6389: UNIQUE_UNLOCK_SKIN_DIREWOLF_GREY_TELLAFRIEND                     : Direwolf Skin: Recruiter's Grey Wolf
6390: SKIN_DIREWOLF_BLOODHOUND_TELLAFRIEND                             : Recruiter's Rottweiler
6391: UNIQUE_UNLOCK_SKIN_DIREWOLF_BLOODHOUND_TELLAFRIEND               : Direwolf Skin: Recruiter's Rottweiler
6392: SKIN_DIREWOLF_BERNARD_TELLAFRIEND                                : Recruiter's Saint Bernard
6393: UNIQUE_UNLOCK_SKIN_DIREWOLF_BERNARD_TELLAFRIEND                  : Direwolf Skin: Recruiter's Saint Bernard
6394: SKIN_DIREWOLF_HUSKYSLEIGH_TELLAFRIEND                            : Recruiter's Husky Sled
6395: UNIQUE_UNLOCK_SKIN_DIREWOLF_HUSKYSLEIGH_TELLAFRIEND              : Direwolf Skin: Recruiter's Husky Sled
6396: SKIN_DIREWOLF_DIREFOX_TELLAFRIEND                                : Recruiter's Dire Fox
6397: UNIQUE_UNLOCK_SKIN_DIREWOLF_DIREFOX_TELLAFRIEND                  : Direwolf Skin: Recruiter's Dire Fox
6398: SKIN_DIREWOLF_BOBTAIL                                            : Sheepdog
6399: UNIQUE_UNLOCK_SKIN_DIREWOLF_BOBTAIL                              : Direwolf Skin: Sheepdog
6400: SKIN_GIANTSTAG_WHITE                                             : Master's Giant Stag
6401: UNIQUE_UNLOCK_SKIN_GIANTSTAG_WHITE                               : Stag Skin: Master's Giant Stag
6402: SKIN_GIANTSTAG_TELLAFRIEND                                       : Recruiter's Giant Stag
6403: UNIQUE_UNLOCK_SKIN_GIANTSTAG_TELLAFRIEND                         : Stag Skin: Recruiter's Giant Stag
6404: SKIN_GIANTSTAG_XMAS                                              : Yule Stag
6405: UNIQUE_UNLOCK_SKIN_GIANTSTAG_XMAS                                : Stag Skin: Yule Stag
6406: SKIN_GIANTSTAG_IMPALA_TELLAFRIEND                                : Recruiter's Impala
6407: UNIQUE_UNLOCK_SKIN_GIANTSTAG_IMPALA_TELLAFRIEND                  : Stag Skin: Recruiter's Impala
6408: SKIN_GIANTSTAG_DIVINE                                            : Divine Stag
6409: UNIQUE_UNLOCK_SKIN_GIANTSTAG_DIVINE                              : Stag Skin: Divine Stag
6410: SKIN_GIANTSTAG_ALPACA_TELLAFRIEND                                
6411: SKIN_COUGAR_TIGER_WHITE_TELLAFRIEND                              : Recruiter's White Tiger
6412: UNIQUE_UNLOCK_SKIN_COUGAR_TIGER_WHITE_TELLAFRIEND                : Swiftclaw Skin: Recruiter's White Tiger
6413: SKIN_COUGAR_TIGER_TELLAFRIEND                                    : Recruiter's Tiger
6414: UNIQUE_UNLOCK_SKIN_COUGAR_TIGER_TELLAFRIEND                      : Swiftclaw Skin: Recruiter's Tiger
6415: SKIN_COUGAR_ARENA                                                : Arena Veteran's Armored Sabertooth
6416: UNIQUE_UNLOCK_SKIN_COUGAR_ARENA                                  : Swiftclaw Skin: Arena Veteran's Armored Sabertooth
6417: SKIN_COUGAR_TOURNAMENT                                           : Sabertooth Rex
6418: UNIQUE_UNLOCK_SKIN_COUGAR_TOURNAMENT                             : Swiftclaw Skin: Sabertooth Rex
6419: SKIN_COUGAR_OCCULT                                               : Occult Cougar
6420: UNIQUE_UNLOCK_SKIN_COUGAR_OCCULT                                 : Swiftclaw Skin: Occult Cougar
6421: SKIN_COUGAR_ARMORED_GREY                                         : Steelplate Cougar
6422: UNIQUE_UNLOCK_SKIN_COUGAR_ARMORED_GREY                           : Swiftclaw Skin: Steelplate Cougar
6423: SKIN_DIREBOAR_HOUSEPIG                                           : Domesticated Hog
6424: UNIQUE_UNLOCK_SKIN_DIREBOAR_HOUSEPIG                             : Direboar Skin: Domesticated Hog
6425: SKIN_DIREBOAR_PIG_TELLAFRIEND                                    : Recruiter's Pig
6426: UNIQUE_UNLOCK_SKIN_DIREBOAR_PIG_TELLAFRIEND                      : Direboar Skin: Recruiter's Pig
6427: SKIN_LIZARD_SAND_SALAMANDER_TELLAFRIEND                          : Recruiter's Sand Salamander
6428: UNIQUE_UNLOCK_SKIN_LIZARD_SAND_SALAMANDER_TELLAFRIEND            : Swamp Dragon Skin: Recruiter's Sand Salamander
6429: SKIN_DONKEY_HALLOWEEN                                            : Jack o' Donkey
6430: UNIQUE_UNLOCK_SKIN_DONKEY_HALLOWEEN                              : Mule Skin: Jack o' Donkey
6431: SKIN_DONKEY_UNIQUE_TELLAFRIEND                                   : Recruiter's Donkey
6432: UNIQUE_UNLOCK_SKIN_DONKEY_UNIQUE_TELLAFRIEND                     : Mule Skin: Recruiter's Donkey
6433: UNIQUE_HEAD_VANITY_JESTER                                        : Jester Mask
6434: UNIQUE_UNLOCK_HEAD_VANITY_JESTER                                 : Wardrobe Skin: Jester Mask
6435: UNIQUE_ARMOR_VANITY_JESTER                                       : Jester Costume
6436: UNIQUE_UNLOCK_ARMOR_VANITY_JESTER                                : Wardrobe Skin: Jester Costume
6437: UNIQUE_SHOES_VANITY_JESTER                                       : Jester Shoes
6438: UNIQUE_UNLOCK_SHOES_VANITY_JESTER                                : Wardrobe Skin: Jester Shoes
6439: UNIQUE_HEAD_VANITY_DRESS_RED                                     : Red Tulip Hat
6440: UNIQUE_UNLOCK_HEAD_VANITY_DRESS_RED                              : Wardrobe Skin: Red Tulip Hat
6441: UNIQUE_ARMOR_VANITY_DRESS_RED                                    : Red Tulip Dress
6442: UNIQUE_UNLOCK_ARMOR_VANITY_DRESS_RED                             : Wardrobe Skin: Red Tulip Dress
6443: UNIQUE_SHOES_VANITY_DRESS_RED                                    : Red Tulip Shoes
6444: UNIQUE_UNLOCK_SHOES_VANITY_DRESS_RED                             : Wardrobe Skin: Red Tulip Shoes
6445: UNIQUE_HEAD_VANITY_DRESS_BLACK                                   : Noblewoman's Jewelry
6446: UNIQUE_ARMOR_VANITY_DRESS_BLACK                                  : Noblewoman's Dress
6447: UNIQUE_SHOES_VANITY_DRESS_BLACK                                  : Noblewoman's Shoes
6448: UNIQUE_HEAD_VANITY_DRESS_BLUE                                    : Blue Princess Hat
6449: UNIQUE_ARMOR_VANITY_DRESS_BLUE                                   : Blue Princess Dress
6450: UNIQUE_SHOES_VANITY_DRESS_BLUE                                   : Blue Princess Shoes
6451: UNIQUE_HEAD_VANITY_RICH_NOBLE                                    : Rich Noble's Hat
6452: UNIQUE_UNLOCK_HEAD_VANITY_RICH_NOBLE                             : Wardrobe Skin: Rich Noble's Hat
6453: UNIQUE_ARMOR_VANITY_RICH_NOBLE                                   : Rich Noble's Doublet
6454: UNIQUE_UNLOCK_ARMOR_VANITY_RICH_NOBLE                            : Wardrobe Skin: Rich Noble's Doublet
6455: UNIQUE_SHOES_VANITY_RICH_NOBLE                                   : Rich Noble's Footwear
6456: UNIQUE_UNLOCK_SHOES_VANITY_RICH_NOBLE                            : Wardrobe Skin: Rich Noble's Footwear
6457: UNIQUE_HEAD_VANITY_SANTACLAUS                                    : Yule Hat
6458: UNIQUE_UNLOCK_HEAD_VANITY_SANTACLAUS                             : Wardrobe Skin: Yule Hat
6459: UNIQUE_ARMOR_VANITY_SANTACLAUS                                   : Yule Coat
6460: UNIQUE_UNLOCK_ARMOR_VANITY_SANTACLAUS                            : Wardrobe Skin: Yule Coat
6461: UNIQUE_SHOES_VANITY_SANTACLAUS                                   : Yule Shoes
6462: UNIQUE_UNLOCK_SHOES_VANITY_SANTACLAUS                            : Wardrobe Skin: Yule Shoes
6463: UNIQUE_BACKPACK_VANITY_SANTACLAUS                                : Yule Backpack
6464: UNIQUE_UNLOCK_BACKPACK_VANITY_SANTACLAUS                         : Wardrobe Skin: Yule Backpack
6465: UNIQUE_HEAD_VANITY_WEDDING_DRESS                                 : Bridal Veil
6466: UNIQUE_UNLOCK_HEAD_VANITY_WEDDING_DRESS                          : Wardrobe Skin: Bridal Veil
6467: UNIQUE_ARMOR_VANITY_WEDDING_DRESS                                : Bridal Dress
6468: UNIQUE_UNLOCK_ARMOR_VANITY_WEDDING_DRESS                         : Wardrobe Skin: Bridal Dress
6469: UNIQUE_SHOES_VANITY_WEDDING_DRESS                                : Bridal Shoes
6470: UNIQUE_UNLOCK_SHOES_VANITY_WEDDING_DRESS                         : Wardrobe Skin: Bridal Shoes
6471: UNIQUE_OFF_VANITY_WEDDING_DRESS                                  : Bridal Bouquet
6472: UNIQUE_UNLOCK_OFF_VANITY_WEDDING_DRESS                           : Wardrobe Skin: Bridal Bouquet
6473: UNIQUE_HEAD_VANITY_WEDDING_TUXEDO                                : Groom Hat
6474: UNIQUE_UNLOCK_HEAD_VANITY_WEDDING_TUXEDO                         : Wardrobe Skin: Groom Hat
6475: UNIQUE_ARMOR_VANITY_WEDDING_TUXEDO                               : Groom Suit
6476: UNIQUE_UNLOCK_ARMOR_VANITY_WEDDING_TUXEDO                        : Wardrobe Skin: Groom Suit
6477: UNIQUE_SHOES_VANITY_WEDDING_TUXEDO                               : Groom Shoes
6478: UNIQUE_UNLOCK_SHOES_VANITY_WEDDING_TUXEDO                        : Wardrobe Skin: Groom Shoes
6479: UNIQUE_CAPE_VANITY_WEDDING_TUXEDO                                : Groom Cape
6480: UNIQUE_UNLOCK_CAPE_VANITY_WEDDING_TUXEDO                         : Wardrobe Skin: Groom Cape
6481: UNIQUE_OFF_VANITY_WEDDING_TUXEDO                                 : Wedding Ring
6482: UNIQUE_UNLOCK_OFF_VANITY_WEDDING_TUXEDO                          : Wardrobe Skin: Wedding Ring
6483: UNIQUE_HEAD_VANITY_BARD                                          : Bard's Hat
6484: UNIQUE_ARMOR_VANITY_BARD                                         : Bard's Suit
6485: UNIQUE_SHOES_VANITY_BARD                                         : Bard's Shoes
6486: UNIQUE_HEAD_VANITY_PRIEST                                        : Monk's Hood
6487: UNIQUE_ARMOR_VANITY_PRIEST                                       : Monk's Robe
6488: UNIQUE_SHOES_VANITY_PRIEST                                       : Monk's Sandals
6489: UNIQUE_OFF_VANITY_PRIEST                                         : Monk's Walking Staff
6490: UNIQUE_HEAD_VANITY_INNKEEPER                                     : Innkeeper's Hat
6491: UNIQUE_ARMOR_VANITY_INNKEEPER                                    : Innkeeper's Shirt
6492: UNIQUE_SHOES_VANITY_INNKEEPER                                    : Innkeeper's Shoes
6493: UNIQUE_OFF_VANITY_INNKEEPER                                      : Innkeeper's Beer Mug
6494: UNIQUE_HEAD_VANITY_PIRATE                                        : Navigator's Hat
6495: UNIQUE_ARMOR_VANITY_PIRATE                                       : Navigator's Coat
6496: UNIQUE_SHOES_VANITY_PIRATE                                       : Navigator's Boots
6497: UNIQUE_OFF_VANITY_PIRATE                                         : Navigator's Parrot Cage
6498: UNIQUE_HEAD_VANITY_ARENA_SET_01                                  : Arena Veteran's Circlet
6499: UNIQUE_UNLOCK_HEAD_VANITY_ARENA_SET_01                           : Wardrobe Skin: Arena Veteran's Circlet
6500: UNIQUE_ARMOR_VANITY_ARENA_SET_01                                 : Arena Veteran's Cloak
6501: UNIQUE_UNLOCK_ARMOR_VANITY_ARENA_SET_01                          : Wardrobe Skin: Arena Veteran's Cloak
6502: UNIQUE_SHOES_VANITY_ARENA_SET_01                                 : Arena Veteran's Boots
6503: UNIQUE_UNLOCK_SHOES_VANITY_ARENA_SET_01                          : Wardrobe Skin: Arena Veteran's Boots
6504: UNIQUE_CAPE_VANITY_ARENA_SET_01                                  : Arena Veteran's Cape
6505: UNIQUE_UNLOCK_CAPE_VANITY_ARENA_SET_01                           : Wardrobe Skin: Arena Veteran's Cape
6506: UNIQUE_HEAD_VANITY_ARENA_EYEPATCH                                : Arena Veteran's Eyepatch
6507: UNIQUE_UNLOCK_HEAD_VANITY_ARENA_EYEPATCH                         : Wardrobe Skin: Arena Veteran's Eyepatch
6508: T4_CAPE_ARENA_BANNER                                             : Arena Veteran's Small Banner
6509: UNIQUE_UNLOCK_T4_CAPE_ARENA_BANNER                               : Wardrobe Skin: Arena Veteran's Small Banner
6510: T6_CAPE_ARENA_BANNER                                             : Arena Veteran's Medium Banner
6511: UNIQUE_UNLOCK_T6_CAPE_ARENA_BANNER                               : Wardrobe Skin: Arena Veteran's Medium Banner
6512: T8_CAPE_ARENA_BANNER                                             : Arena Veteran's Large Banner
6513: UNIQUE_UNLOCK_T8_CAPE_ARENA_BANNER                               : Wardrobe Skin: Arena Veteran's Large Banner
6514: UNIQUE_HEAD_TELLAFRIEND_BATRIDER                                 : Master of Bats Helmet
6515: UNIQUE_UNLOCK_HEAD_TELLAFRIEND_BATRIDER                          : Wardrobe Skin: Master of Bats Helmet
6516: UNIQUE_HEAD_VANITY_EASTER_WHITE@1                                : Snow Bunny Stalker Hat
6517: UNIQUE_UNLOCK_HEAD_VANITY_EASTER_WHITE                           : Wardrobe Skin: Snow Bunny Stalker Hat
6518: UNIQUE_HEAD_VANITY_EASTER_BROWN                                  : Bunny Stalker Hat
6519: UNIQUE_UNLOCK_HEAD_VANITY_EASTER_BROWN                           : Wardrobe Skin: Bunny Stalker Hat
6520: UNIQUE_ARMOR_VANITY_EASTER                                       : Bunny Stalker Overalls
6521: UNIQUE_UNLOCK_ARMOR_VANITY_EASTER                                : Wardrobe Skin: Bunny Stalker Overalls
6522: UNIQUE_SHOES_VANITY_EASTER                                       : Bunny Stalker Shoes
6523: UNIQUE_UNLOCK_SHOES_VANITY_EASTER                                : Wardrobe Skin: Bunny Stalker Shoes
6524: UNIQUE_BACKPACK_VANITY_EASTER                                    : Bunny Stalker Basket
6525: UNIQUE_UNLOCK_BACKPACK_VANITY_EASTER                             : Wardrobe Skin: Bunny Stalker Basket
6526: UNIQUE_HEAD_VANITY_PLAGUEDOC                                     : Hygienic Mask
6527: UNIQUE_UNLOCK_HEAD_VANITY_PLAGUEDOC                              : Wardrobe Skin: Hygienic Mask
6528: UNIQUE_ARMOR_VANITY_PLAGUEDOC                                    : Hygienic Coat
6529: UNIQUE_UNLOCK_ARMOR_VANITY_PLAGUEDOC                             : Wardrobe Skin: Hygienic Coat
6530: UNIQUE_SHOES_VANITY_PLAGUEDOC                                    : Hygienic Boots
6531: UNIQUE_UNLOCK_SHOES_VANITY_PLAGUEDOC                             : Wardrobe Skin: Hygienic Boots
6532: UNIQUE_HEAD_VANITY_SKELETON                                      : Laughing Skull
6533: UNIQUE_UNLOCK_HEAD_VANITY_SKELETON                               : Wardrobe Skin: Laughing Skull
6534: UNIQUE_ARMOR_VANITY_SKELETON                                     : Ribcage
6535: UNIQUE_UNLOCK_ARMOR_VANITY_SKELETON                              : Wardrobe Skin: Ribcage
6536: UNIQUE_SHOES_VANITY_SKELETON                                     : Legbones
6537: UNIQUE_UNLOCK_SHOES_VANITY_SKELETON                              : Wardrobe Skin: Legbones
6538: UNIQUE_CAPE_VANITY_SKELETON                                      : Ragged Cape
6539: UNIQUE_UNLOCK_CAPE_VANITY_SKELETON                               : Wardrobe Skin: Ragged Cape
6540: UNIQUE_HEAD_VANITY_PUMPKIN_01                                    : Grinning Pumpkin Head
6541: UNIQUE_UNLOCK_HEAD_VANITY_PUMPKIN_01                             : Wardrobe Skin: Grinning Pumpkin Head
6542: UNIQUE_HEAD_VANITY_PUMPKIN_02                                    : Sad Pumpkin Head
6543: UNIQUE_UNLOCK_HEAD_VANITY_PUMPKIN_02                             : Wardrobe Skin: Sad Pumpkin Head
6544: UNIQUE_HEAD_VANITY_PUMPKIN_03                                    : Angry Pumpkin Head
6545: UNIQUE_UNLOCK_HEAD_VANITY_PUMPKIN_03                             : Wardrobe Skin: Angry Pumpkin Head
6546: UNIQUE_HEAD_XMAS                                                 : Uncle Frost's Hat
6547: UNIQUE_UNLOCK_HEAD_XMAS                                          : Wardrobe Skin: Uncle Frost's Hat
6548: UNIQUE_VANITY_2H_PORTALGUN_TELLAFRIEND                           : Recruiter's Portal Cannon
6549: UNIQUE_UNLOCK_VANITY_2H_PORTALGUN_TELLAFRIEND                    : Wardrobe Skin: Recruiter's Portal Cannon
6550: UNIQUE_VANITY_MAIN_BEERMUG_TELLAFRIEND                           : Recruiter's Beer Mug
6551: UNIQUE_UNLOCK_VANITY_MAIN_BEERMUG_TELLAFRIEND                    : Wardrobe Skin: Recruiter's Beer Mug
6552: UNIQUE_VANITY_MAIN_HORN_TELLAFRIEND                              : Recruiter's Hunter Horn
6553: UNIQUE_UNLOCK_VANITY_MAIN_HORN_TELLAFRIEND                       : Wardrobe Skin: Recruiter's Hunter Horn
6554: UNIQUE_VANITY_MAIN_FOXCROP_TELLAFRIEND                           : Recruiter's Fox Crop
6555: UNIQUE_UNLOCK_VANITY_MAIN_FOXCROP_TELLAFRIEND                    : Wardrobe Skin: Recruiter's Fox Crop
6556: UNIQUE_VANITY_MAIN_TRUMPET_TELLAFRIEND                           : Recruiter's Trumpet
6557: UNIQUE_UNLOCK_VANITY_MAIN_TRUMPET_TELLAFRIEND                    : Wardrobe Skin: Recruiter's Trumpet
6558: UNIQUE_VANITY_MAIN_BEERMUG_02_TELLAFRIEND                        : Recruiter's Ale Mug
6559: UNIQUE_UNLOCK_VANITY_MAIN_BEERMUG_02_TELLAFRIEND                 : Wardrobe Skin: Recruiter's Ale Mug
6560: UNIQUE_CAPE_FOUNDER_LEGENDARY                                    : Legendary Explorer's Cloak
6561: UNIQUE_UNLOCK_CAPE_FOUNDER_LEGENDARY                             : Wardrobe Skin: Legendary Explorer's Cloak
6562: UNIQUE_HEAD_FOUNDER_LEGENDARY                                    : Legendary Explorer's Hat
6563: UNIQUE_UNLOCK_HEAD_FOUNDER_LEGENDARY                             : Wardrobe Skin: Legendary Explorer's Hat
6564: UNIQUE_ARMOR_FOUNDER_LEGENDARY                                   : Legendary Explorer's Armor
6565: UNIQUE_UNLOCK_ARMOR_FOUNDER_LEGENDARY                            : Wardrobe Skin: Legendary Explorer's Armor
6566: UNIQUE_SHOES_FOUNDER_LEGENDARY                                   : Legendary Explorer's Boots
6567: UNIQUE_UNLOCK_SHOES_FOUNDER_LEGENDARY                            : Wardrobe Skin: Legendary Explorer's Boots
6568: UNIQUE_HEAD_FOUNDER_ELITE                                        : Explorer's Hat
6569: UNIQUE_UNLOCK_HEAD_FOUNDER_ELITE                                 : Wardrobe Skin: Explorer's Hat
6570: UNIQUE_ARMOR_FOUNDER_ELITE                                       : Explorer's Armor
6571: UNIQUE_UNLOCK_ARMOR_FOUNDER_ELITE                                : Wardrobe Skin: Explorer's Armor
6572: UNIQUE_SHOES_FOUNDER_ELITE                                       : Explorer's Boots
6573: UNIQUE_UNLOCK_SHOES_FOUNDER_ELITE                                : Wardrobe Skin: Explorer's Boots
6574: UNIQUE_CAPE_STARTERPACK_LEGENDARY                                : Legendary Adventurer's Cloak
6575: UNIQUE_UNLOCK_CAPE_STARTERPACK_LEGENDARY                         : Wardrobe Skin: Legendary Adventurer's Cloak
6576: UNIQUE_HEAD_STARTERPACK_LEGENDARY                                : Legendary Adventurer's Hat
6577: UNIQUE_UNLOCK_HEAD_STARTERPACK_LEGENDARY                         : Wardrobe Skin: Legendary Adventurer's Hat
6578: UNIQUE_ARMOR_STARTERPACK_LEGENDARY                               : Legendary Adventurer's Armor
6579: UNIQUE_UNLOCK_ARMOR_STARTERPACK_LEGENDARY                        : Wardrobe Skin: Legendary Adventurer's Armor
6580: UNIQUE_SHOES_STARTERPACK_LEGENDARY                               : Legendary Adventurer's Boots
6581: UNIQUE_UNLOCK_SHOES_STARTERPACK_LEGENDARY                        : Wardrobe Skin: Legendary Adventurer's Boots
6582: UNIQUE_HEAD_STARTERPACK_ELITE                                    : Adventurer's Helmet
6583: UNIQUE_UNLOCK_HEAD_STARTERPACK_ELITE                             : Wardrobe Skin: Adventurer's Helmet
6584: UNIQUE_ARMOR_STARTERPACK_ELITE                                   : Adventurer's Jacket
6585: UNIQUE_UNLOCK_ARMOR_STARTERPACK_ELITE                            : Wardrobe Skin: Adventurer's Jacket
6586: UNIQUE_SHOES_STARTERPACK_ELITE                                   : Adventurer's Shoes
6587: UNIQUE_UNLOCK_SHOES_STARTERPACK_ELITE                            : Wardrobe Skin: Adventurer's Shoes
6588: UNIQUE_HEAD_VANITY_SKELETON_UNDEAD                               : Undead Skull
6589: UNIQUE_UNLOCK_HEAD_VANITY_SKELETON_UNDEAD                        : Wardrobe Skin: Undead Skull
6590: UNIQUE_ARMOR_VANITY_SKELETON_UNDEAD                              : Undead Ribcage
6591: UNIQUE_UNLOCK_ARMOR_VANITY_SKELETON_UNDEAD                       : Wardrobe Skin: Undead Ribcage
6592: UNIQUE_SHOES_VANITY_SKELETON_UNDEAD                              : Undead Legs
6593: UNIQUE_UNLOCK_SHOES_VANITY_SKELETON_UNDEAD                       : Wardrobe Skin: Undead Legs
6594: UNIQUE_CAPE_VANITY_SKELETON_UNDEAD                               : Ragged Undead Cape
6595: UNIQUE_UNLOCK_CAPE_VANITY_SKELETON_UNDEAD                        : Wardrobe Skin: Ragged Undead Cape
6596: UNIQUE_CAPE_TELLAFRIEND                                          : Recruiter's Cape
6597: UNIQUE_UNLOCK_CAPE_TELLAFRIEND                                   : Wardrobe Skin: Recruiter's Cape
6598: UNIQUE_CAPE_TELLAFRIEND_02                                       : Riuros Cape
6599: UNIQUE_UNLOCK_CAPE_TELLAFRIEND_02                                : Wardrobe Skin: Riuros Cape
6600: UNIQUE_CAPE_TELLAFRIEND_BATRIDER                                 : Master of Bats Cape
6601: UNIQUE_UNLOCK_CAPE_TELLAFRIEND_BATRIDER                          : Wardrobe Skin: Master of Bats Cape
6602: UNIQUE_CAPE_TELLAFRIEND_BANNER                                   : Recruiter's Banner
6603: UNIQUE_UNLOCK_CAPE_TELLAFRIEND_BANNER                            : Wardrobe Skin: Recruiter's Banner
6604: UNIQUE_CAPE_TELLAFRIEND_BANNER_02                                : Ogronios Banner
6605: UNIQUE_UNLOCK_CAPE_TELLAFRIEND_BANNER_02                         : Wardrobe Skin: Ogronios Banner
6606: UNIQUE_CAPE_TOAD_TELLAFRIEND                                     : Recruiter's Cape - Toad
6607: UNIQUE_UNLOCK_CAPE_TOAD_TELLAFRIEND                              : Wardrobe Skin: Recruiter's Cape - Toad
6608: UNIQUE_CAPE_BLOODHOUND_TELLAFRIEND                               : Recruiter's Cape - Rottweiler
6609: UNIQUE_UNLOCK_CAPE_BLOODHOUND_TELLAFRIEND                        : Wardrobe Skin: Recruiter's Cape - Rottweiler
6610: UNIQUE_CAPE_TIGER_TELLAFRIEND                                    : Recruiter's Tiger Cape
6611: UNIQUE_UNLOCK_CAPE_TIGER_TELLAFRIEND                             : Wardrobe Skin: Recruiter's Tiger Cape
6612: UNIQUE_CAPE_RAM_TELLAFRIEND                                      : Recruiter's Fur Cape
6613: UNIQUE_UNLOCK_CAPE_RAM_TELLAFRIEND                               : Wardrobe Skin: Recruiter's Fur Cape
6614: UNIQUE_CAPE_WOLF_GREY_TELLAFRIEND                                : Recruiter's Grey Wolf Cape
6615: UNIQUE_UNLOCK_CAPE_WOLF_GREY_TELLAFRIEND                         : Wardrobe Skin: Recruiter's Grey Wolf Cape
6616: T6_CAPE_PLATE_UNDEAD                                             : Decorative Undead Platemail Cape
6617: UNIQUE_UNLOCK_T6_CAPE_PLATE_UNDEAD                               : Wardrobe Skin: Decorative Undead Platemail Cape
6618: T6_CAPE_LEATHER_UNDEAD                                           : Decorative Undead Leather Cape
6619: UNIQUE_UNLOCK_T6_CAPE_LEATHER_UNDEAD                             : Wardrobe Skin: Decorative Undead Leather Cape
6620: T6_CAPE_CLOTH_UNDEAD                                             : Decorative Undead Cloth Cape
6621: UNIQUE_UNLOCK_T6_CAPE_CLOTH_UNDEAD                               : Wardrobe Skin: Decorative Undead Cloth Cape
6622: T6_CAPE_PLATE_KEEPER                                             : Decorative Keeper Platemail Cape
6623: UNIQUE_UNLOCK_T6_CAPE_PLATE_KEEPER                               : Wardrobe Skin: Decorative Keeper Platemail Cape
6624: T6_CAPE_LEATHER_KEEPER                                           : Decorative Keeper Leather Cape
6625: UNIQUE_UNLOCK_T6_CAPE_LEATHER_KEEPER                             : Wardrobe Skin: Decorative Keeper Leather Cape
6626: T6_CAPE_CLOTH_KEEPER                                             : Decorative Keeper Cloth Cape
6627: UNIQUE_UNLOCK_T6_CAPE_CLOTH_KEEPER                               : Wardrobe Skin: Decorative Keeper Cloth Cape
6628: T6_CAPE_PLATE_MORGANA                                            : Decorative Morgana Platemail Cape
6629: UNIQUE_UNLOCK_T6_CAPE_PLATE_MORGANA                              : Wardrobe Skin: Decorative Morgana Platemail Cape
6630: T6_CAPE_LEATHER_MORGANA                                          : Decorative Morgana Leather Cape
6631: UNIQUE_UNLOCK_T6_CAPE_LEATHER_MORGANA                            : Wardrobe Skin: Decorative Morgana Leather Cape
6632: T6_CAPE_CLOTH_MORGANA                                            : Decorative Morgana Cloth Cape
6633: UNIQUE_UNLOCK_T6_CAPE_CLOTH_MORGANA                              : Wardrobe Skin: Decorative Morgana Cloth Cape
6634: T7_MAIN_SUMMONERSTAFF_PROTOTYPE                                  
6635: T7_MAIN_SUMMONERSTAFF_PROTOTYPE@1                                
6636: T7_MAIN_SUMMONERSTAFF_PROTOTYPE@2                                
6637: T7_MAIN_SUMMONERSTAFF_PROTOTYPE@3                                
6638: UNIQUE_TEST_DUNGEONMAP_PROTOTYPE                                 
6639: T4_TOKEN_CRYSTALLEAGUE_DEBUG_LVL_01                              
6640: T4_TOKEN_CRYSTALLEAGUE_DEBUG_LVL_02                              
6641: T4_TOKEN_CRYSTALLEAGUE_DEBUG_LVL_03                              
6642: T4_TOKEN_CRYSTALLEAGUE_LVL_01                                    
6643: T4_TOKEN_CRYSTALLEAGUE_LVL_02                                    
6644: T4_TOKEN_CRYSTALLEAGUE_LVL_03                                    
6645: T4_TOKEN_CRYSTALLEAGUE_LVL_04                                    
6646: T4_TOKEN_CRYSTALLEAGUE_LVL_05                                    
6647: T4_TOKEN_CRYSTALLEAGUE_LVL_06                                    
6648: T4_TOKEN_CRYSTALLEAGUE_LVL_07                                    
6649: T4_TOKEN_CRYSTALLEAGUE_LVL_08                                    
6650: T4_TOKEN_CRYSTALLEAGUE_LVL_09                                    
6651: T2_JOURNAL_WOOD_EMPTY                                            : Novice Lumberjack's Journal (Empty)
6652: T2_JOURNAL_WOOD_FULL                                             : Novice Lumberjack's Journal (Full)
6653: T3_JOURNAL_WOOD_EMPTY                                            : Journeyman Lumberjack's Journal (Empty)
6654: T3_JOURNAL_WOOD_FULL                                             : Journeyman Lumberjack's Journal (Full)
6655: T4_JOURNAL_WOOD_EMPTY                                            : Adept Lumberjack's Journal (Empty)
6656: T4_JOURNAL_WOOD_FULL                                             : Adept Lumberjack's Journal (Full)
6657: T5_JOURNAL_WOOD_EMPTY                                            : Expert Lumberjack's Journal (Empty)
6658: T5_JOURNAL_WOOD_FULL                                             : Expert Lumberjack's Journal (Full)
6659: T6_JOURNAL_WOOD_EMPTY                                            : Master Lumberjack's Journal (Empty)
6660: T6_JOURNAL_WOOD_FULL                                             : Master Lumberjack's Journal (Full)
6661: T7_JOURNAL_WOOD_EMPTY                                            : Grandmaster Lumberjack's Journal (Empty)
6662: T7_JOURNAL_WOOD_FULL                                             : Grandmaster Lumberjack's Journal (Full)
6663: T8_JOURNAL_WOOD_EMPTY                                            : Elder Lumberjack's Journal (Empty)
6664: T8_JOURNAL_WOOD_FULL                                             : Elder Lumberjack's Journal (Full)
6665: T2_JOURNAL_STONE_EMPTY                                           : Novice Stonecutter's Journal (Empty)
6666: T2_JOURNAL_STONE_FULL                                            : Novice Stonecutter's Journal (Full)
6667: T3_JOURNAL_STONE_EMPTY                                           : Journeyman Stonecutter's Journal (Empty)
6668: T3_JOURNAL_STONE_FULL                                            : Journeyman Stonecutter's Journal (Full)
6669: T4_JOURNAL_STONE_EMPTY                                           : Adept Stonecutter's Journal (Empty)
6670: T4_JOURNAL_STONE_FULL                                            : Adept Stonecutter's Journal (Full)
6671: T5_JOURNAL_STONE_EMPTY                                           : Expert Stonecutter's Journal (Empty)
6672: T5_JOURNAL_STONE_FULL                                            : Expert Stonecutter's Journal (Full)
6673: T6_JOURNAL_STONE_EMPTY                                           : Master Stonecutter's Journal (Empty)
6674: T6_JOURNAL_STONE_FULL                                            : Master Stonecutter's Journal (Full)
6675: T7_JOURNAL_STONE_EMPTY                                           : Grandmaster Stonecutter's Journal (Empty)
6676: T7_JOURNAL_STONE_FULL                                            : Grandmaster Stonecutter's Journal (Full)
6677: T8_JOURNAL_STONE_EMPTY                                           : Elder Stonecutter's Journal (Empty)
6678: T8_JOURNAL_STONE_FULL                                            : Elder Stonecutter's Journal (Full)
6679: T2_JOURNAL_ORE_EMPTY                                             : Novice Prospector's Journal (Empty)
6680: T2_JOURNAL_ORE_FULL                                              : Novice Prospector's Journal (Full)
6681: T3_JOURNAL_ORE_EMPTY                                             : Journeyman Prospector's Journal (Empty)
6682: T3_JOURNAL_ORE_FULL                                              : Journeyman Prospector's Journal (Full)
6683: T4_JOURNAL_ORE_EMPTY                                             : Adept Prospector's Journal (Empty)
6684: T4_JOURNAL_ORE_FULL                                              : Adept Prospector's Journal (Full)
6685: T5_JOURNAL_ORE_EMPTY                                             : Expert Prospector's Journal (Empty)
6686: T5_JOURNAL_ORE_FULL                                              : Expert Prospector's Journal (Full)
6687: T6_JOURNAL_ORE_EMPTY                                             : Master Prospector's Journal (Empty)
6688: T6_JOURNAL_ORE_FULL                                              : Master Prospector's Journal (Full)
6689: T7_JOURNAL_ORE_EMPTY                                             : Grandmaster Prospector's Journal (Empty)
6690: T7_JOURNAL_ORE_FULL                                              : Grandmaster Prospector's Journal (Full)
6691: T8_JOURNAL_ORE_EMPTY                                             : Elder Prospector's Journal (Empty)
6692: T8_JOURNAL_ORE_FULL                                              : Elder Prospector's Journal (Full)
6693: T2_JOURNAL_FIBER_EMPTY                                           : Novice Cropper's Journal (Empty)
6694: T2_JOURNAL_FIBER_FULL                                            : Novice Cropper's Journal (Full)
6695: T3_JOURNAL_FIBER_EMPTY                                           : Journeyman Cropper's Journal (Empty)
6696: T3_JOURNAL_FIBER_FULL                                            : Journeyman Cropper's Journal (Full)
6697: T4_JOURNAL_FIBER_EMPTY                                           : Adept Cropper's Journal (Empty)
6698: T4_JOURNAL_FIBER_FULL                                            : Adept Cropper's Journal (Full)
6699: T5_JOURNAL_FIBER_EMPTY                                           : Expert Cropper's Journal (Empty)
6700: T5_JOURNAL_FIBER_FULL                                            : Expert Cropper's Journal (Full)
6701: T6_JOURNAL_FIBER_EMPTY                                           : Master Cropper's Journal (Empty)
6702: T6_JOURNAL_FIBER_FULL                                            : Master Cropper's Journal (Full)
6703: T7_JOURNAL_FIBER_EMPTY                                           : Grandmaster Cropper's Journal (Empty)
6704: T7_JOURNAL_FIBER_FULL                                            : Grandmaster Cropper's Journal (Full)
6705: T8_JOURNAL_FIBER_EMPTY                                           : Elder Cropper's Journal (Empty)
6706: T8_JOURNAL_FIBER_FULL                                            : Elder Cropper's Journal (Full)
6707: T2_JOURNAL_HIDE_EMPTY                                            : Novice Gamekeeper's Journal (Empty)
6708: T2_JOURNAL_HIDE_FULL                                             : Novice Gamekeeper's Journal (Full)
6709: T3_JOURNAL_HIDE_EMPTY                                            : Journeyman Gamekeeper's Journal (Empty)
6710: T3_JOURNAL_HIDE_FULL                                             : Journeyman Gamekeeper's Journal (Full)
6711: T4_JOURNAL_HIDE_EMPTY                                            : Adept Gamekeeper's Journal (Empty)
6712: T4_JOURNAL_HIDE_FULL                                             : Adept Gamekeeper's Journal (Full)
6713: T5_JOURNAL_HIDE_EMPTY                                            : Expert Gamekeeper's Journal (Empty)
6714: T5_JOURNAL_HIDE_FULL                                             : Expert Gamekeeper's Journal (Full)
6715: T6_JOURNAL_HIDE_EMPTY                                            : Master Gamekeeper's Journal (Empty)
6716: T6_JOURNAL_HIDE_FULL                                             : Master Gamekeeper's Journal (Full)
6717: T7_JOURNAL_HIDE_EMPTY                                            : Grandmaster Gamekeeper's Journal (Empty)
6718: T7_JOURNAL_HIDE_FULL                                             : Grandmaster Gamekeeper's Journal (Full)
6719: T8_JOURNAL_HIDE_EMPTY                                            : Elder Gamekeeper's Journal (Empty)
6720: T8_JOURNAL_HIDE_FULL                                             : Elder Gamekeeper's Journal (Full)
6721: T2_JOURNAL_WARRIOR_EMPTY                                         : Novice Blacksmith's Journal (Empty)
6722: T2_JOURNAL_WARRIOR_FULL                                          : Novice Blacksmith's Journal (Full)
6723: T3_JOURNAL_WARRIOR_EMPTY                                         : Journeyman Blacksmith's Journal (Empty)
6724: T3_JOURNAL_WARRIOR_FULL                                          : Journeyman Blacksmith's Journal (Full)
6725: T4_JOURNAL_WARRIOR_EMPTY                                         : Adept Blacksmith's Journal (Empty)
6726: T4_JOURNAL_WARRIOR_FULL                                          : Adept Blacksmith's Journal (Full)
6727: T5_JOURNAL_WARRIOR_EMPTY                                         : Expert Blacksmith's Journal (Empty)
6728: T5_JOURNAL_WARRIOR_FULL                                          : Expert Blacksmith's Journal (Full)
6729: T6_JOURNAL_WARRIOR_EMPTY                                         : Master Blacksmith's Journal (Empty)
6730: T6_JOURNAL_WARRIOR_FULL                                          : Master Blacksmith's Journal (Full)
6731: T7_JOURNAL_WARRIOR_EMPTY                                         : Grandmaster Blacksmith's Journal (Empty)
6732: T7_JOURNAL_WARRIOR_FULL                                          : Grandmaster Blacksmith's Journal (Full)
6733: T8_JOURNAL_WARRIOR_EMPTY                                         : Elder Blacksmith's Journal (Empty)
6734: T8_JOURNAL_WARRIOR_FULL                                          : Elder Blacksmith's Journal (Full)
6735: T2_JOURNAL_HUNTER_EMPTY                                          : Novice Fletcher's Journal (Empty)
6736: T2_JOURNAL_HUNTER_FULL                                           : Novice Fletcher's Journal (Full)
6737: T3_JOURNAL_HUNTER_EMPTY                                          : Journeyman Fletcher's Journal (Empty)
6738: T3_JOURNAL_HUNTER_FULL                                           : Journeyman Fletcher's Journal (Full)
6739: T4_JOURNAL_HUNTER_EMPTY                                          : Adept Fletcher's Journal (Empty)
6740: T4_JOURNAL_HUNTER_FULL                                           : Adept Fletcher's Journal (Full)
6741: T5_JOURNAL_HUNTER_EMPTY                                          : Expert Fletcher's Journal (Empty)
6742: T5_JOURNAL_HUNTER_FULL                                           : Expert Fletcher's Journal (Full)
6743: T6_JOURNAL_HUNTER_EMPTY                                          : Master Fletcher's Journal (Empty)
6744: T6_JOURNAL_HUNTER_FULL                                           : Master Fletcher's Journal (Full)
6745: T7_JOURNAL_HUNTER_EMPTY                                          : Grandmaster Fletcher's Journal (Empty)
6746: T7_JOURNAL_HUNTER_FULL                                           : Grandmaster Fletcher's Journal (Full)
6747: T8_JOURNAL_HUNTER_EMPTY                                          : Elder Fletcher's Journal (Empty)
6748: T8_JOURNAL_HUNTER_FULL                                           : Elder Fletcher's Journal (Full)
6749: T2_JOURNAL_MAGE_EMPTY                                            : Novice Imbuer's Journal (Empty)
6750: T2_JOURNAL_MAGE_FULL                                             : Novice Imbuer's Journal (Full)
6751: T3_JOURNAL_MAGE_EMPTY                                            : Journeyman Imbuer's Journal (Empty)
6752: T3_JOURNAL_MAGE_FULL                                             : Journeyman Imbuer's Journal (Full)
6753: T4_JOURNAL_MAGE_EMPTY                                            : Adept Imbuer's Journal (Empty)
6754: T4_JOURNAL_MAGE_FULL                                             : Adept Imbuer's Journal (Full)
6755: T5_JOURNAL_MAGE_EMPTY                                            : Expert Imbuer's Journal (Empty)
6756: T5_JOURNAL_MAGE_FULL                                             : Expert Imbuer's Journal (Full)
6757: T6_JOURNAL_MAGE_EMPTY                                            : Master Imbuer's Journal (Empty)
6758: T6_JOURNAL_MAGE_FULL                                             : Master Imbuer's Journal (Full)
6759: T7_JOURNAL_MAGE_EMPTY                                            : Grandmaster Imbuer's Journal (Empty)
6760: T7_JOURNAL_MAGE_FULL                                             : Grandmaster Imbuer's Journal (Full)
6761: T8_JOURNAL_MAGE_EMPTY                                            : Elder Imbuer's Journal (Empty)
6762: T8_JOURNAL_MAGE_FULL                                             : Elder Imbuer's Journal (Full)
6763: T2_JOURNAL_TOOLMAKER_EMPTY                                       : Novice Tinker's Journal (Empty)
6764: T2_JOURNAL_TOOLMAKER_FULL                                        : Novice Tinker's Journal (Full)
6765: T3_JOURNAL_TOOLMAKER_EMPTY                                       : Journeyman Tinker's Journal (Empty)
6766: T3_JOURNAL_TOOLMAKER_FULL                                        : Journeyman Tinker's Journal (Full)
6767: T4_JOURNAL_TOOLMAKER_EMPTY                                       : Adept Tinker's Journal (Empty)
6768: T4_JOURNAL_TOOLMAKER_FULL                                        : Adept Tinker's Journal (Full)
6769: T5_JOURNAL_TOOLMAKER_EMPTY                                       : Expert Tinker's Journal (Empty)
6770: T5_JOURNAL_TOOLMAKER_FULL                                        : Expert Tinker's Journal (Full)
6771: T6_JOURNAL_TOOLMAKER_EMPTY                                       : Master Tinker's Journal (Empty)
6772: T6_JOURNAL_TOOLMAKER_FULL                                        : Master Tinker's Journal (Full)
6773: T7_JOURNAL_TOOLMAKER_EMPTY                                       : Grandmaster Tinker's Journal (Empty)
6774: T7_JOURNAL_TOOLMAKER_FULL                                        : Grandmaster Tinker's Journal (Full)
6775: T8_JOURNAL_TOOLMAKER_EMPTY                                       : Elder Tinker's Journal (Empty)
6776: T8_JOURNAL_TOOLMAKER_FULL                                        : Elder Tinker's Journal (Full)
6777: T2_JOURNAL_MERCENARY_EMPTY                                       : Novice Mercenary's Journal (Empty)
6778: T2_JOURNAL_MERCENARY_FULL                                        : Novice Mercenary's Journal (Full)
6779: T3_JOURNAL_MERCENARY_EMPTY                                       : Journeyman Mercenary's Journal (Empty)
6780: T3_JOURNAL_MERCENARY_FULL                                        : Journeyman Mercenary's Journal (Full)
6781: T4_JOURNAL_MERCENARY_EMPTY                                       : Adept Mercenary's Journal (Empty)
6782: T4_JOURNAL_MERCENARY_FULL                                        : Adept Mercenary's Journal (Full)
6783: T5_JOURNAL_MERCENARY_EMPTY                                       : Expert Mercenary's Journal (Empty)
6784: T5_JOURNAL_MERCENARY_FULL                                        : Expert Mercenary's Journal (Full)
6785: T6_JOURNAL_MERCENARY_EMPTY                                       : Master Mercenary's Journal (Empty)
6786: T6_JOURNAL_MERCENARY_FULL                                        : Master Mercenary's Journal (Full)
6787: T7_JOURNAL_MERCENARY_EMPTY                                       : Grandmaster Mercenary's Journal (Empty)
6788: T7_JOURNAL_MERCENARY_FULL                                        : Grandmaster Mercenary's Journal (Full)
6789: T8_JOURNAL_MERCENARY_EMPTY                                       : Elder Mercenary's Journal (Empty)
6790: T8_JOURNAL_MERCENARY_FULL                                        : Elder Mercenary's Journal (Full)
6791: T2_JOURNAL_TROPHY_GENERAL_EMPTY                                  : Novice's Generalist Trophy Journal (Empty)
6792: T2_JOURNAL_TROPHY_GENERAL_FULL                                   : Novice's Generalist Trophy Journal (Full)
6793: T3_JOURNAL_TROPHY_GENERAL_EMPTY                                  : Journeyman's Generalist Trophy Journal (Empty)
6794: T3_JOURNAL_TROPHY_GENERAL_FULL                                   : Journeyman's Generalist Trophy Journal (Full)
6795: T4_JOURNAL_TROPHY_GENERAL_EMPTY                                  : Adept's Generalist Trophy Journal (Empty)
6796: T4_JOURNAL_TROPHY_GENERAL_FULL                                   : Adept's Generalist Trophy Journal (Full)
6797: T5_JOURNAL_TROPHY_GENERAL_EMPTY                                  : Expert's Generalist Trophy Journal (Empty)
6798: T5_JOURNAL_TROPHY_GENERAL_FULL                                   : Expert's Generalist Trophy Journal (Full)
6799: T6_JOURNAL_TROPHY_GENERAL_EMPTY                                  : Master's Generalist Trophy Journal (Empty)
6800: T6_JOURNAL_TROPHY_GENERAL_FULL                                   : Master's Generalist Trophy Journal (Full)
6801: T7_JOURNAL_TROPHY_GENERAL_EMPTY                                  : Grandmaster's Generalist Trophy Journal (Empty)
6802: T7_JOURNAL_TROPHY_GENERAL_FULL                                   : Grandmaster's Generalist Trophy Journal (Full)
6803: T8_JOURNAL_TROPHY_GENERAL_EMPTY                                  : Elder's Generalist Trophy Journal (Empty)
6804: T8_JOURNAL_TROPHY_GENERAL_FULL                                   : Elder's Generalist Trophy Journal (Full)
6805: T2_JOURNAL_TROPHY_MERCENARY_EMPTY                                : Novice Mercenary's Trophy Journal (Empty)
6806: T2_JOURNAL_TROPHY_MERCENARY_FULL                                 : Novice Mercenary's Trophy Journal (Full)
6807: T3_JOURNAL_TROPHY_MERCENARY_EMPTY                                : Journeyman Mercenary's Trophy Journal (Empty)
6808: T3_JOURNAL_TROPHY_MERCENARY_FULL                                 : Journeyman Mercenary's Trophy Journal (Full)
6809: T4_JOURNAL_TROPHY_MERCENARY_EMPTY                                : Adept Mercenary's Trophy Journal (Empty)
6810: T4_JOURNAL_TROPHY_MERCENARY_FULL                                 : Adept Mercenary's Trophy Journal (Full)
6811: T5_JOURNAL_TROPHY_MERCENARY_EMPTY                                : Expert Mercenary's Trophy Journal (Empty)
6812: T5_JOURNAL_TROPHY_MERCENARY_FULL                                 : Expert Mercenary's Trophy Journal (Full)
6813: T6_JOURNAL_TROPHY_MERCENARY_EMPTY                                : Master Mercenary's Trophy Journal (Empty)
6814: T6_JOURNAL_TROPHY_MERCENARY_FULL                                 : Master Mercenary's Trophy Journal (Full)
6815: T7_JOURNAL_TROPHY_MERCENARY_EMPTY                                : Grandmaster Mercenary's Trophy Journal (Empty)
6816: T7_JOURNAL_TROPHY_MERCENARY_FULL                                 : Grandmaster Mercenary's Trophy Journal (Full)
6817: T8_JOURNAL_TROPHY_MERCENARY_EMPTY                                : Elder Mercenary's Trophy Journal (Empty)
6818: T8_JOURNAL_TROPHY_MERCENARY_FULL                                 : Elder Mercenary's Trophy Journal (Full)
6819: T2_JOURNAL_TROPHY_HIDE_EMPTY                                     : Novice Gamekeeper's Trophy Journal (Empty)
6820: T2_JOURNAL_TROPHY_HIDE_FULL                                      : Novice Gamekeeper's Trophy Journal (Full)
6821: T3_JOURNAL_TROPHY_HIDE_EMPTY                                     : Journeyman Gamekeeper's Trophy Journal (Empty)
6822: T3_JOURNAL_TROPHY_HIDE_FULL                                      : Journeyman Gamekeeper's Trophy Journal (Full)
6823: T4_JOURNAL_TROPHY_HIDE_EMPTY                                     : Adept Gamekeeper's Trophy Journal (Empty)
6824: T4_JOURNAL_TROPHY_HIDE_FULL                                      : Adept Gamekeeper's Trophy Journal (Full)
6825: T5_JOURNAL_TROPHY_HIDE_EMPTY                                     : Expert Gamekeeper's Trophy Journal (Empty)
6826: T5_JOURNAL_TROPHY_HIDE_FULL                                      : Expert Gamekeeper's Trophy Journal (Full)
6827: T6_JOURNAL_TROPHY_HIDE_EMPTY                                     : Master Gamekeeper's Trophy Journal (Empty)
6828: T6_JOURNAL_TROPHY_HIDE_FULL                                      : Master Gamekeeper's Trophy Journal (Full)
6829: T7_JOURNAL_TROPHY_HIDE_EMPTY                                     : Grandmaster Gamekeeper's Trophy Journal (Empty)
6830: T7_JOURNAL_TROPHY_HIDE_FULL                                      : Grandmaster Gamekeeper's Trophy Journal (Full)
6831: T8_JOURNAL_TROPHY_HIDE_EMPTY                                     : Elder Gamekeeper's Trophy Journal (Empty)
6832: T8_JOURNAL_TROPHY_HIDE_FULL                                      : Elder Gamekeeper's Trophy Journal (Full)
6833: T2_JOURNAL_TROPHY_WOOD_EMPTY                                     : Novice Lumberjack's Trophy Journal (Empty)
6834: T2_JOURNAL_TROPHY_WOOD_FULL                                      : Novice Lumberjack's Trophy Journal (Full)
6835: T3_JOURNAL_TROPHY_WOOD_EMPTY                                     : Journeyman Lumberjack's Trophy Journal (Empty)
6836: T3_JOURNAL_TROPHY_WOOD_FULL                                      : Journeyman Lumberjack's Trophy Journal (Full)
6837: T4_JOURNAL_TROPHY_WOOD_EMPTY                                     : Adept Lumberjack's Trophy Journal (Empty)
6838: T4_JOURNAL_TROPHY_WOOD_FULL                                      : Adept Lumberjack's Trophy Journal (Full)
6839: T5_JOURNAL_TROPHY_WOOD_EMPTY                                     : Expert Lumberjack's Trophy Journal (Empty)
6840: T5_JOURNAL_TROPHY_WOOD_FULL                                      : Expert Lumberjack's Trophy Journal (Full)
6841: T6_JOURNAL_TROPHY_WOOD_EMPTY                                     : Master Lumberjack's Trophy Journal (Empty)
6842: T6_JOURNAL_TROPHY_WOOD_FULL                                      : Master Lumberjack's Trophy Journal (Full)
6843: T7_JOURNAL_TROPHY_WOOD_EMPTY                                     : Grandmaster Lumberjack's Trophy Journal (Empty)
6844: T7_JOURNAL_TROPHY_WOOD_FULL                                      : Grandmaster Lumberjack's Trophy Journal (Full)
6845: T8_JOURNAL_TROPHY_WOOD_EMPTY                                     : Elder Lumberjack's Trophy Journal (Empty)
6846: T8_JOURNAL_TROPHY_WOOD_FULL                                      : Elder Lumberjack's Trophy Journal (Full)
6847: T2_JOURNAL_TROPHY_STONE_EMPTY                                    : Novice Stonecutter's Trophy Journal (Empty)
6848: T2_JOURNAL_TROPHY_STONE_FULL                                     : Novice Stonecutter's Trophy Journal (Full)
6849: T3_JOURNAL_TROPHY_STONE_EMPTY                                    : Journeyman Stonecutter's Trophy Journal (Empty)
6850: T3_JOURNAL_TROPHY_STONE_FULL                                     : Journeyman Stonecutter's Trophy Journal (Full)
6851: T4_JOURNAL_TROPHY_STONE_EMPTY                                    : Adept Stonecutter's Trophy Journal (Empty)
6852: T4_JOURNAL_TROPHY_STONE_FULL                                     : Adept Stonecutter's Trophy Journal (Full)
6853: T5_JOURNAL_TROPHY_STONE_EMPTY                                    : Expert Stonecutter's Trophy Journal (Empty)
6854: T5_JOURNAL_TROPHY_STONE_FULL                                     : Expert Stonecutter's Trophy Journal (Full)
6855: T6_JOURNAL_TROPHY_STONE_EMPTY                                    : Master Stonecutter's Trophy Journal (Empty)
6856: T6_JOURNAL_TROPHY_STONE_FULL                                     : Master Stonecutter's Trophy Journal (Full)
6857: T7_JOURNAL_TROPHY_STONE_EMPTY                                    : Grandmaster Stonecutter's Trophy Journal (Empty)
6858: T7_JOURNAL_TROPHY_STONE_FULL                                     : Grandmaster Stonecutter's Trophy Journal (Full)
6859: T8_JOURNAL_TROPHY_STONE_EMPTY                                    : Elder Stonecutter's Trophy Journal (Empty)
6860: T8_JOURNAL_TROPHY_STONE_FULL                                     : Elder Stonecutter's Trophy Journal (Full)
6861: T2_JOURNAL_TROPHY_ORE_EMPTY                                      : Novice Prospector's Trophy Journal (Empty)
6862: T2_JOURNAL_TROPHY_ORE_FULL                                       : Novice Prospector's Trophy Journal (Full)
6863: T3_JOURNAL_TROPHY_ORE_EMPTY                                      : Journeyman Prospector's Trophy Journal (Empty)
6864: T3_JOURNAL_TROPHY_ORE_FULL                                       : Journeyman Prospector's Trophy Journal (Full)
6865: T4_JOURNAL_TROPHY_ORE_EMPTY                                      : Adept Prospector's Trophy Journal (Empty)
6866: T4_JOURNAL_TROPHY_ORE_FULL                                       : Adept Prospector's Trophy Journal (Full)
6867: T5_JOURNAL_TROPHY_ORE_EMPTY                                      : Expert Prospector's Trophy Journal (Empty)
6868: T5_JOURNAL_TROPHY_ORE_FULL                                       : Expert Prospector's Trophy Journal (Full)
6869: T6_JOURNAL_TROPHY_ORE_EMPTY                                      : Master Prospector's Trophy Journal (Empty)
6870: T6_JOURNAL_TROPHY_ORE_FULL                                       : Master Prospector's Trophy Journal (Full)
6871: T7_JOURNAL_TROPHY_ORE_EMPTY                                      : Grandmaster Prospector's Trophy Journal (Empty)
6872: T7_JOURNAL_TROPHY_ORE_FULL                                       : Grandmaster Prospector's Trophy Journal (Full)
6873: T8_JOURNAL_TROPHY_ORE_EMPTY                                      : Elder Prospector's Trophy Journal (Empty)
6874: T8_JOURNAL_TROPHY_ORE_FULL                                       : Elder Prospector's Trophy Journal (Full)
6875: T2_JOURNAL_TROPHY_FIBER_EMPTY                                    : Novice Cropper's Trophy Journal (Empty)
6876: T2_JOURNAL_TROPHY_FIBER_FULL                                     : Novice Cropper's Trophy Journal (Full)
6877: T3_JOURNAL_TROPHY_FIBER_EMPTY                                    : Journeyman Cropper's Trophy Journal (Empty)
6878: T3_JOURNAL_TROPHY_FIBER_FULL                                     : Journeyman Cropper's Trophy Journal (Full)
6879: T4_JOURNAL_TROPHY_FIBER_EMPTY                                    : Adept Cropper's Trophy Journal (Empty)
6880: T4_JOURNAL_TROPHY_FIBER_FULL                                     : Adept Cropper's Trophy Journal (Full)
6881: T5_JOURNAL_TROPHY_FIBER_EMPTY                                    : Expert Cropper's Trophy Journal (Empty)
6882: T5_JOURNAL_TROPHY_FIBER_FULL                                     : Expert Cropper's Trophy Journal (Full)
6883: T6_JOURNAL_TROPHY_FIBER_EMPTY                                    : Master Cropper's Trophy Journal (Empty)
6884: T6_JOURNAL_TROPHY_FIBER_FULL                                     : Master Cropper's Trophy Journal (Full)
6885: T7_JOURNAL_TROPHY_FIBER_EMPTY                                    : Grandmaster Cropper's Trophy Journal (Empty)
6886: T7_JOURNAL_TROPHY_FIBER_FULL                                     : Grandmaster Cropper's Trophy Journal (Full)
6887: T8_JOURNAL_TROPHY_FIBER_EMPTY                                    : Elder Cropper's Trophy Journal (Empty)
6888: T8_JOURNAL_TROPHY_FIBER_FULL                                     : Elder Cropper's Trophy Journal (Full)
6889: T2_JOURNAL_TROPHY_FISHING_EMPTY                                  : Novice Fisherman's Trophy Journal (Empty)
6890: T2_JOURNAL_TROPHY_FISHING_FULL                                   : Novice Fisherman's Trophy Journal (Full)
6891: T3_JOURNAL_TROPHY_FISHING_EMPTY                                  : Journeyman Fisherman's Trophy Journal (Empty)
6892: T3_JOURNAL_TROPHY_FISHING_FULL                                   : Journeyman Fisherman's Trophy Journal (Full)
6893: T4_JOURNAL_TROPHY_FISHING_EMPTY                                  : Adept Fisherman's Trophy Journal (Empty)
6894: T4_JOURNAL_TROPHY_FISHING_FULL                                   : Adept Fisherman's Trophy Journal (Full)
6895: T5_JOURNAL_TROPHY_FISHING_EMPTY                                  : Expert Fisherman's Trophy Journal (Empty)
6896: T5_JOURNAL_TROPHY_FISHING_FULL                                   : Expert Fisherman's Trophy Journal (Full)
6897: T6_JOURNAL_TROPHY_FISHING_EMPTY                                  : Master Fisherman's Trophy Journal (Empty)
6898: T6_JOURNAL_TROPHY_FISHING_FULL                                   : Master Fisherman's Trophy Journal (Full)
6899: T7_JOURNAL_TROPHY_FISHING_EMPTY                                  : Grandmaster Fisherman's Trophy Journal (Empty)
6900: T7_JOURNAL_TROPHY_FISHING_FULL                                   : Grandmaster Fisherman's Trophy Journal (Full)
6901: T8_JOURNAL_TROPHY_FISHING_EMPTY                                  : Elder Fisherman's Trophy Journal (Empty)
6902: T8_JOURNAL_TROPHY_FISHING_FULL                                   : Elder Fisherman's Trophy Journal (Full)
6903: T2_JOURNAL_FISHING_EMPTY                                         : Novice Fisherman's Journal (Empty)
6904: T2_JOURNAL_FISHING_FULL                                          : Novice Fisherman's Journal (Full)
6905: T3_JOURNAL_FISHING_EMPTY                                         : Journeyman Fisherman's Journal (Empty)
6906: T3_JOURNAL_FISHING_FULL                                          : Journeyman Fisherman's Journal (Full)
6907: T4_JOURNAL_FISHING_EMPTY                                         : Adept Fisherman's Journal (Empty)
6908: T4_JOURNAL_FISHING_FULL                                          : Adept Fisherman's Journal (Full)
6909: T5_JOURNAL_FISHING_EMPTY                                         : Expert Fisherman's Journal (Empty)
6910: T5_JOURNAL_FISHING_FULL                                          : Expert Fisherman's Journal (Full)
6911: T6_JOURNAL_FISHING_EMPTY                                         : Master Fisherman's Journal (Empty)
6912: T6_JOURNAL_FISHING_FULL                                          : Master Fisherman's Journal (Full)
6913: T7_JOURNAL_FISHING_EMPTY                                         : Grandmaster Fisherman's Journal (Empty)
6914: T7_JOURNAL_FISHING_FULL                                          : Grandmaster Fisherman's Journal (Full)
6915: T8_JOURNAL_FISHING_EMPTY                                         : Elder Fisherman's Journal (Empty)
6916: T8_JOURNAL_FISHING_FULL                                          : Elder Fisherman's Journal (Full)
END;
}
