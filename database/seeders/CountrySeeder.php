<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {


    $itens = array(
      0 =>
      array(
        'gentilico' => 'cabo-verdiana',
        'nome_pais' => 'Cabo Verde',
        'nome_pais_int' => 'Cape Verde',
        'sigla' => 'CV',
      ),
      1 =>
      array(
        'gentilico' => 'sul-africana',
        'nome_pais' => 'África do Sul',
        'nome_pais_int' => 'South Africa',
        'sigla' => 'ZA',
      ),
      2 =>
      array(
        'gentilico' => 'albanesa',
        'nome_pais' => 'Albânia',
        'nome_pais_int' => 'Albania',
        'sigla' => 'AL',
      ),
      3 =>
      array(
        'gentilico' => 'alemã',
        'nome_pais' => 'Alemanha',
        'nome_pais_int' => 'Germany',
        'sigla' => 'DE',
      ),
      4 =>
      array(
        'gentilico' => 'andorrana',
        'nome_pais' => 'Andorra',
        'nome_pais_int' => 'Andorra',
        'sigla' => 'AD',
      ),
      5 =>
      array(
        'gentilico' => 'angolana',
        'nome_pais' => 'Angola',
        'nome_pais_int' => 'Angola',
        'sigla' => 'AO',
      ),
      6 =>
      array(
        'gentilico' => 'anguillana',
        'nome_pais' => 'Anguilla',
        'nome_pais_int' => 'Anguilla',
        'sigla' => 'AI',
      ),
      7 =>
      array(
        'gentilico' => 'de antártida',
        'nome_pais' => 'Antártida',
        'nome_pais_int' => 'Antarctica',
        'sigla' => 'AQ',
      ),
      8 =>
      array(
        'gentilico' => 'antiguana',
        'nome_pais' => 'Antígua e Barbuda',
        'nome_pais_int' => 'Antigua & Barbuda',
        'sigla' => 'AG',
      ),
      9 =>
      array(
        'gentilico' => 'saudita',
        'nome_pais' => 'Arábia Saudita',
        'nome_pais_int' => 'Saudi Arabia',
        'sigla' => 'SA',
      ),
      10 =>
      array(
        'gentilico' => 'argelina',
        'nome_pais' => 'Argélia',
        'nome_pais_int' => 'Algeria',
        'sigla' => 'DZ',
      ),
      11 =>
      array(
        'gentilico' => 'argentina',
        'nome_pais' => 'Argentina',
        'nome_pais_int' => 'Argentina',
        'sigla' => 'AR',
      ),
      12 =>
      array(
        'gentilico' => 'armênia',
        'nome_pais' => 'Armênia',
        'nome_pais_int' => 'Armenia',
        'sigla' => 'AM',
      ),
      13 =>
      array(
        'gentilico' => 'arubana',
        'nome_pais' => 'Aruba',
        'nome_pais_int' => 'Aruba',
        'sigla' => 'AW',
      ),
      14 =>
      array(
        'gentilico' => 'australiana',
        'nome_pais' => 'Austrália',
        'nome_pais_int' => 'Australia',
        'sigla' => 'AU',
      ),
      15 =>
      array(
        'gentilico' => 'austríaca',
        'nome_pais' => 'Áustria',
        'nome_pais_int' => 'Austria',
        'sigla' => 'AT',
      ),
      16 =>
      array(
        'gentilico' => 'azerbaijano',
        'nome_pais' => 'Azerbaijão',
        'nome_pais_int' => 'Azerbaijan',
        'sigla' => 'AZ',
      ),
      17 =>
      array(
        'gentilico' => 'bahamense',
        'nome_pais' => 'Bahamas',
        'nome_pais_int' => 'Bahamas',
        'sigla' => 'BS',
      ),
      18 =>
      array(
        'gentilico' => 'barenita',
        'nome_pais' => 'Bahrein',
        'nome_pais_int' => 'Bahrain',
        'sigla' => 'BH',
      ),
      19 =>
      array(
        'gentilico' => 'bengali',
        'nome_pais' => 'Bangladesh',
        'nome_pais_int' => 'Bangladesh',
        'sigla' => 'BD',
      ),
      20 =>
      array(
        'gentilico' => 'barbadiana',
        'nome_pais' => 'Barbados',
        'nome_pais_int' => 'Barbados',
        'sigla' => 'BB',
      ),
      21 =>
      array(
        'gentilico' => 'bielo-russa',
        'nome_pais' => 'Belarus',
        'nome_pais_int' => 'Belarus',
        'sigla' => 'BY',
      ),
      22 =>
      array(
        'gentilico' => 'belga',
        'nome_pais' => 'Bélgica',
        'nome_pais_int' => 'Belgium',
        'sigla' => 'BE',
      ),
      23 =>
      array(
        'gentilico' => 'belizenha',
        'nome_pais' => 'Belize',
        'nome_pais_int' => 'Belize',
        'sigla' => 'BZ',
      ),
      24 =>
      array(
        'gentilico' => 'beninense',
        'nome_pais' => 'Benin',
        'nome_pais_int' => 'Benin',
        'sigla' => 'BJ',
      ),
      25 =>
      array(
        'gentilico' => 'bermudiana',
        'nome_pais' => 'Bermudas',
        'nome_pais_int' => 'Bermuda',
        'sigla' => 'BM',
      ),
      26 =>
      array(
        'gentilico' => 'boliviana',
        'nome_pais' => 'Bolívia',
        'nome_pais_int' => 'Bolivia',
        'sigla' => 'BO',
      ),
      27 =>
      array(
        'gentilico' => 'bósnia',
        'nome_pais' => 'Bósnia-Herzegóvina',
        'nome_pais_int' => 'Bosnia & Herzegovina',
        'sigla' => 'BA',
      ),
      28 =>
      array(
        'gentilico' => 'betchuana',
        'nome_pais' => 'Botsuana',
        'nome_pais_int' => 'Botswana',
        'sigla' => 'BW',
      ),
      29 =>
      array(
        'gentilico' => 'afegãne',
        'nome_pais' => 'Afeganistão',
        'nome_pais_int' => 'Afghanistan',
        'sigla' => 'AF',
      ),
      30 =>
      array(
        'gentilico' => 'bruneiana',
        'nome_pais' => 'Brunei',
        'nome_pais_int' => 'Brunei',
        'sigla' => 'BN',
      ),
      31 =>
      array(
        'gentilico' => 'búlgara',
        'nome_pais' => 'Bulgária',
        'nome_pais_int' => 'Bulgaria',
        'sigla' => 'BG',
      ),
      32 =>
      array(
        'gentilico' => 'burquinês',
        'nome_pais' => 'Burkina Fasso',
        'nome_pais_int' => 'Burkina Faso',
        'sigla' => 'BF',
      ),
      33 =>
      array(
        'gentilico' => 'burundinesa',
        'nome_pais' => 'Burundi',
        'nome_pais_int' => 'Burundi',
        'sigla' => 'BI',
      ),
      34 =>
      array(
        'gentilico' => 'butanesa',
        'nome_pais' => 'Butão',
        'nome_pais_int' => 'Bhutan',
        'sigla' => 'BT',
      ),
      35 =>
      array(
        'gentilico' => 'brasileira',
        'nome_pais' => 'Brasil',
        'nome_pais_int' => 'Brazil',
        'sigla' => 'BR',
      ),
      36 =>
      array(
        'gentilico' => 'camaronesa',
        'nome_pais' => 'Camarões',
        'nome_pais_int' => 'Cameroon',
        'sigla' => 'CM',
      ),
      37 =>
      array(
        'gentilico' => 'cambojana',
        'nome_pais' => 'Camboja',
        'nome_pais_int' => 'Cambodia',
        'sigla' => 'KH',
      ),
      38 =>
      array(
        'gentilico' => 'canadense',
        'nome_pais' => 'Canadá',
        'nome_pais_int' => 'Canada',
        'sigla' => 'CA',
      ),
      39 =>
      array(
        'gentilico' => 'canário',
        'nome_pais' => 'Canárias',
        'nome_pais_int' => 'Canary Islands',
        'sigla' => 'IC',
      ),
      40 =>
      array(
        'gentilico' => 'cazaque',
        'nome_pais' => 'Cazaquistão',
        'nome_pais_int' => 'Kazakhstan',
        'sigla' => 'KZ',
      ),
      41 =>
      array(
        'gentilico' => 'de ceuta e melilla',
        'nome_pais' => 'Ceuta e Melilla',
        'nome_pais_int' => 'Ceuta & Melilla',
        'sigla' => 'EA',
      ),
      42 =>
      array(
        'gentilico' => 'chadiana',
        'nome_pais' => 'Chade',
        'nome_pais_int' => 'Chad',
        'sigla' => 'TD',
      ),
      43 =>
      array(
        'gentilico' => 'chilena',
        'nome_pais' => 'Chile',
        'nome_pais_int' => 'Chile',
        'sigla' => 'CL',
      ),
      44 =>
      array(
        'gentilico' => 'chinesa',
        'nome_pais' => 'China',
        'nome_pais_int' => 'China',
        'sigla' => 'CN',
      ),
      45 =>
      array(
        'gentilico' => 'cipriota',
        'nome_pais' => 'Chipre',
        'nome_pais_int' => 'Cyprus',
        'sigla' => 'CY',
      ),
      46 =>
      array(
        'gentilico' => 'cingapuriana',
        'nome_pais' => 'Cingapura',
        'nome_pais_int' => 'Singapore',
        'sigla' => 'SG',
      ),
      47 =>
      array(
        'gentilico' => 'colombiana',
        'nome_pais' => 'Colômbia',
        'nome_pais_int' => 'Colombia',
        'sigla' => 'CO',
      ),
      48 =>
      array(
        'gentilico' => 'comorense',
        'nome_pais' => 'Comores',
        'nome_pais_int' => 'Comoros',
        'sigla' => 'KM',
      ),
      49 =>
      array(
        'gentilico' => 'congolesa',
        'nome_pais' => 'Congo',
        'nome_pais_int' => 'Congo (Republic)',
        'sigla' => 'CG',
      ),
      50 =>
      array(
        'gentilico' => 'norte-coreano',
        'nome_pais' => 'Coréia do Norte',
        'nome_pais_int' => 'North Korea',
        'sigla' => 'KP',
      ),
      51 =>
      array(
        'gentilico' => 'norte-coreana',
        'nome_pais' => 'Coréia do Sul',
        'nome_pais_int' => 'South Korea',
        'sigla' => 'KR',
      ),
      52 =>
      array(
        'gentilico' => 'marfinense',
        'nome_pais' => 'Costa do Marfim',
        'nome_pais_int' => 'Côte d¿Ivoire',
        'sigla' => 'CI',
      ),
      53 =>
      array(
        'gentilico' => 'costarriquenha',
        'nome_pais' => 'Costa Rica',
        'nome_pais_int' => 'Costa Rica',
        'sigla' => 'CR',
      ),
      54 =>
      array(
        'gentilico' => 'croata',
        'nome_pais' => 'Croácia',
        'nome_pais_int' => 'Croatia',
        'sigla' => 'HR',
      ),
      55 =>
      array(
        'gentilico' => 'cubana',
        'nome_pais' => 'Cuba',
        'nome_pais_int' => 'Cuba',
        'sigla' => 'CU',
      ),
      56 =>
      array(
        'gentilico' => 'curaçauense',
        'nome_pais' => 'Curaçao',
        'nome_pais_int' => 'Curaçao',
        'sigla' => 'CW',
      ),
      57 =>
      array(
        'gentilico' => 'chagositano',
        'nome_pais' => 'Diego Garcia',
        'nome_pais_int' => 'Diego Garcia',
        'sigla' => 'DG',
      ),
      58 =>
      array(
        'gentilico' => 'dinamarquesa',
        'nome_pais' => 'Dinamarca',
        'nome_pais_int' => 'Denmark',
        'sigla' => 'DK',
      ),
      59 =>
      array(
        'gentilico' => 'djibutiana',
        'nome_pais' => 'Djibuti',
        'nome_pais_int' => 'Djibouti',
        'sigla' => 'DJ',
      ),
      60 =>
      array(
        'gentilico' => 'dominiquense',
        'nome_pais' => 'Dominica',
        'nome_pais_int' => 'Dominica',
        'sigla' => 'DM',
      ),
      61 =>
      array(
        'gentilico' => 'egípcia',
        'nome_pais' => 'Egito',
        'nome_pais_int' => 'Egypt',
        'sigla' => 'EG',
      ),
      62 =>
      array(
        'gentilico' => 'salvadorenha',
        'nome_pais' => 'El Salvador',
        'nome_pais_int' => 'El Salvador',
        'sigla' => 'SV',
      ),
      63 =>
      array(
        'gentilico' => 'árabe',
        'nome_pais' => 'Emirados Árabes Unidos',
        'nome_pais_int' => 'United Arab Emirates',
        'sigla' => 'AE',
      ),
      64 =>
      array(
        'gentilico' => 'equatoriana',
        'nome_pais' => 'Equador',
        'nome_pais_int' => 'Ecuador',
        'sigla' => 'EC',
      ),
      65 =>
      array(
        'gentilico' => 'eritreia',
        'nome_pais' => 'Eritréia',
        'nome_pais_int' => 'Eritrea',
        'sigla' => 'ER',
      ),
      66 =>
      array(
        'gentilico' => 'eslovaco',
        'nome_pais' => 'Eslováquia',
        'nome_pais_int' => 'Slovakia',
        'sigla' => 'SK',
      ),
      67 =>
      array(
        'gentilico' => 'esloveno',
        'nome_pais' => 'Eslovênia',
        'nome_pais_int' => 'Slovenia',
        'sigla' => 'SI',
      ),
      68 =>
      array(
        'gentilico' => 'espanhola',
        'nome_pais' => 'Espanha',
        'nome_pais_int' => 'Spain',
        'sigla' => 'ES',
      ),
      69 =>
      array(
        'gentilico' => 'norte-americana',
        'nome_pais' => 'Estados Unidos',
        'nome_pais_int' => 'United States',
        'sigla' => 'US',
      ),
      70 =>
      array(
        'gentilico' => 'estoniana',
        'nome_pais' => 'Estônia',
        'nome_pais_int' => 'Estonia',
        'sigla' => 'EE',
      ),
      71 =>
      array(
        'gentilico' => 'etíope',
        'nome_pais' => 'Etiópia',
        'nome_pais_int' => 'Ethiopia',
        'sigla' => 'ET',
      ),
      72 =>
      array(
        'gentilico' => 'fijiana',
        'nome_pais' => 'Fiji',
        'nome_pais_int' => 'Fiji',
        'sigla' => 'FJ',
      ),
      73 =>
      array(
        'gentilico' => 'filipina',
        'nome_pais' => 'Filipinas',
        'nome_pais_int' => 'Philippines',
        'sigla' => 'PH',
      ),
      74 =>
      array(
        'gentilico' => 'finlandesa',
        'nome_pais' => 'Finlândia',
        'nome_pais_int' => 'Finland',
        'sigla' => 'FI',
      ),
      75 =>
      array(
        'gentilico' => 'francesa',
        'nome_pais' => 'França',
        'nome_pais_int' => 'France',
        'sigla' => 'FR',
      ),
      76 =>
      array(
        'gentilico' => 'gabonesa',
        'nome_pais' => 'Gabão',
        'nome_pais_int' => 'Gabon',
        'sigla' => 'GA',
      ),
      77 =>
      array(
        'gentilico' => 'gambiana',
        'nome_pais' => 'Gâmbia',
        'nome_pais_int' => 'Gambia',
        'sigla' => 'GM',
      ),
      78 =>
      array(
        'gentilico' => 'ganense',
        'nome_pais' => 'Gana',
        'nome_pais_int' => 'Ghana',
        'sigla' => 'GH',
      ),
      79 =>
      array(
        'gentilico' => 'georgiana',
        'nome_pais' => 'Geórgia',
        'nome_pais_int' => 'Georgia',
        'sigla' => 'GE',
      ),
      80 =>
      array(
        'gentilico' => 'gibraltariana',
        'nome_pais' => 'Gibraltar',
        'nome_pais_int' => 'Gibraltar',
        'sigla' => 'GI',
      ),
      81 =>
      array(
        'gentilico' => 'inglesa',
        'nome_pais' => 'Grã-Bretanha (Reino Unido, UK)',
        'nome_pais_int' => 'United Kingdom',
        'sigla' => 'GB',
      ),
      82 =>
      array(
        'gentilico' => 'granadina',
        'nome_pais' => 'Granada',
        'nome_pais_int' => 'Grenada',
        'sigla' => 'GD',
      ),
      83 =>
      array(
        'gentilico' => 'grega',
        'nome_pais' => 'Grécia',
        'nome_pais_int' => 'Greece',
        'sigla' => 'GR',
      ),
      84 =>
      array(
        'gentilico' => 'groenlandesa',
        'nome_pais' => 'Groelândia',
        'nome_pais_int' => 'Greenland',
        'sigla' => 'GL',
      ),
      85 =>
      array(
        'gentilico' => 'guadalupense',
        'nome_pais' => 'Guadalupe',
        'nome_pais_int' => 'Guadeloupe',
        'sigla' => 'GP',
      ),
      86 =>
      array(
        'gentilico' => 'guamês',
        'nome_pais' => 'Guam (Território dos Estados Unidos)',
        'nome_pais_int' => 'Guam',
        'sigla' => 'GU',
      ),
      87 =>
      array(
        'gentilico' => 'guatemalteca',
        'nome_pais' => 'Guatemala',
        'nome_pais_int' => 'Guatemala',
        'sigla' => 'GT',
      ),
      88 =>
      array(
        'gentilico' => 'guernesiano',
        'nome_pais' => 'Guernsey',
        'nome_pais_int' => 'Guernsey',
        'sigla' => 'GG',
      ),
      89 =>
      array(
        'gentilico' => 'guianense',
        'nome_pais' => 'Guiana',
        'nome_pais_int' => 'Guyana',
        'sigla' => 'GY',
      ),
      90 =>
      array(
        'gentilico' => 'franco-guianense',
        'nome_pais' => 'Guiana Francesa',
        'nome_pais_int' => 'French Guiana',
        'sigla' => 'GF',
      ),
      91 =>
      array(
        'gentilico' => 'guinéu-equatoriano ou equatoguineana',
        'nome_pais' => 'Guiné',
        'nome_pais_int' => 'Guinea',
        'sigla' => 'GN',
      ),
      92 =>
      array(
        'gentilico' => 'guinéu-equatoriano',
        'nome_pais' => 'Guiné Equatorial',
        'nome_pais_int' => 'Equatorial Guinea',
        'sigla' => 'GQ',
      ),
      93 =>
      array(
        'gentilico' => 'guineense',
        'nome_pais' => 'Guiné-Bissau',
        'nome_pais_int' => 'Guinea-Bissau',
        'sigla' => 'GW',
      ),
      94 =>
      array(
        'gentilico' => 'haitiana',
        'nome_pais' => 'Haiti',
        'nome_pais_int' => 'Haiti',
        'sigla' => 'HT',
      ),
      95 =>
      array(
        'gentilico' => 'holandês',
        'nome_pais' => 'Holanda',
        'nome_pais_int' => 'Netherlands',
        'sigla' => 'NL',
      ),
      96 =>
      array(
        'gentilico' => 'hondurenha',
        'nome_pais' => 'Honduras',
        'nome_pais_int' => 'Honduras',
        'sigla' => 'HN',
      ),
      97 =>
      array(
        'gentilico' => 'hong-konguiana ou chinesa',
        'nome_pais' => 'Hong Kong',
        'nome_pais_int' => 'Hong Kong',
        'sigla' => 'HK',
      ),
      98 =>
      array(
        'gentilico' => 'húngara',
        'nome_pais' => 'Hungria',
        'nome_pais_int' => 'Hungary',
        'sigla' => 'HU',
      ),
      99 =>
      array(
        'gentilico' => 'iemenita',
        'nome_pais' => 'Iêmen',
        'nome_pais_int' => 'Yemen',
        'sigla' => 'YE',
      ),
      100 =>
      array(
        'gentilico' => 'da ilha bouvet',
        'nome_pais' => 'Ilha Bouvet',
        'nome_pais_int' => 'Bouvet Island',
        'sigla' => 'BV',
      ),
      101 =>
      array(
        'gentilico' => 'da ilha de ascensão',
        'nome_pais' => 'Ilha de Ascensão',
        'nome_pais_int' => 'Ascension Island',
        'sigla' => 'AC',
      ),
      102 =>
      array(
        'gentilico' => 'da ilha de clipperton',
        'nome_pais' => 'Ilha de Clipperton',
        'nome_pais_int' => 'Clipperton Island',
        'sigla' => 'CP',
      ),
      103 =>
      array(
        'gentilico' => 'manês',
        'nome_pais' => 'Ilha de Man',
        'nome_pais_int' => 'Isle of Man',
        'sigla' => 'IM',
      ),
      104 =>
      array(
        'gentilico' => 'natalense',
        'nome_pais' => 'Ilha Natal',
        'nome_pais_int' => 'Christmas Island',
        'sigla' => 'CX',
      ),
      105 =>
      array(
        'gentilico' => 'pitcairnense',
        'nome_pais' => 'Ilha Pitcairn',
        'nome_pais_int' => 'Pitcairn Islands',
        'sigla' => 'PN',
      ),
      106 =>
      array(
        'gentilico' => 'reunionense',
        'nome_pais' => 'Ilha Reunião',
        'nome_pais_int' => 'Réunion',
        'sigla' => 'RE',
      ),
      107 =>
      array(
        'gentilico' => 'alandês',
        'nome_pais' => 'Ilhas Aland',
        'nome_pais_int' => 'Åland Islands',
        'sigla' => 'AX',
      ),
      108 =>
      array(
        'gentilico' => 'caimanês',
        'nome_pais' => 'Ilhas Cayman',
        'nome_pais_int' => 'Cayman Islands',
        'sigla' => 'KY',
      ),
      109 =>
      array(
        'gentilico' => 'coquense',
        'nome_pais' => 'Ilhas Cocos',
        'nome_pais_int' => 'Cocos (Keeling) Islands',
        'sigla' => 'CC',
      ),
      110 =>
      array(
        'gentilico' => 'cookense',
        'nome_pais' => 'Ilhas Cook',
        'nome_pais_int' => 'Cook Islands',
        'sigla' => 'CK',
      ),
      111 =>
      array(
        'gentilico' => 'faroense',
        'nome_pais' => 'Ilhas Faroes',
        'nome_pais_int' => 'Faroe Islands',
        'sigla' => 'FO',
      ),
      112 =>
      array(
        'gentilico' => 'das ilhas geórgia do sul e sandwich do sul',
        'nome_pais' => 'Ilhas Geórgia do Sul e Sandwich do Sul',
        'nome_pais_int' => 'South Georgia & South Sandwich Islands',
        'sigla' => 'GS',
      ),
      113 =>
      array(
        'gentilico' => 'das ilhas heard e mcdonald',
        'nome_pais' => 'Ilhas Heard e McDonald (Território da Austrália)',
        'nome_pais_int' => 'Heard & McDonald Islands',
        'sigla' => 'HM',
      ),
      114 =>
      array(
        'gentilico' => 'malvinense',
        'nome_pais' => 'Ilhas Malvinas',
        'nome_pais_int' => 'Falkland Islands (Islas Malvinas)',
        'sigla' => 'FK',
      ),
      115 =>
      array(
        'gentilico' => 'norte-marianense',
        'nome_pais' => 'Ilhas Marianas do Norte',
        'nome_pais_int' => 'Northern Mariana Islands',
        'sigla' => 'MP',
      ),
      116 =>
      array(
        'gentilico' => 'marshallino',
        'nome_pais' => 'Ilhas Marshall',
        'nome_pais_int' => 'Marshall Islands',
        'sigla' => 'MH',
      ),
      117 =>
      array(
        'gentilico' => 'das ilhas menores afastadas',
        'nome_pais' => 'Ilhas Menores dos Estados Unidos',
        'nome_pais_int' => 'U.S. Outlying Islands',
        'sigla' => 'UM',
      ),
      118 =>
      array(
        'gentilico' => 'norfolquino',
        'nome_pais' => 'Ilhas Norfolk',
        'nome_pais_int' => 'Norfolk Island',
        'sigla' => 'NF',
      ),
      119 =>
      array(
        'gentilico' => 'salomônico',
        'nome_pais' => 'Ilhas Salomão',
        'nome_pais_int' => 'Solomon Islands',
        'sigla' => 'SB',
      ),
      120 =>
      array(
        'gentilico' => 'seichelense',
        'nome_pais' => 'Ilhas Seychelles',
        'nome_pais_int' => 'Seychelles',
        'sigla' => 'SC',
      ),
      121 =>
      array(
        'gentilico' => 'toquelauano',
        'nome_pais' => 'Ilhas Tokelau',
        'nome_pais_int' => 'Tokelau',
        'sigla' => 'TK',
      ),
      122 =>
      array(
        'gentilico' => 'turquês',
        'nome_pais' => 'Ilhas Turks e Caicos',
        'nome_pais_int' => 'Turks & Caicos Islands',
        'sigla' => 'TC',
      ),
      123 =>
      array(
        'gentilico' => 'virginense',
        'nome_pais' => 'Ilhas Virgens (Estados Unidos)',
        'nome_pais_int' => 'U.S. Virgin Islands',
        'sigla' => 'VI',
      ),
      124 =>
      array(
        'gentilico' => 'virginense',
        'nome_pais' => 'Ilhas Virgens (Inglaterra)',
        'nome_pais_int' => 'British Virgin Islands',
        'sigla' => 'VG',
      ),
      125 =>
      array(
        'gentilico' => 'indiano',
        'nome_pais' => 'Índia',
        'nome_pais_int' => 'India',
        'sigla' => 'IN',
      ),
      126 =>
      array(
        'gentilico' => 'indonésia',
        'nome_pais' => 'Indonésia',
        'nome_pais_int' => 'Indonesia',
        'sigla' => 'ID',
      ),
      127 =>
      array(
        'gentilico' => 'iraniano',
        'nome_pais' => 'Irã',
        'nome_pais_int' => 'Iran',
        'sigla' => 'IR',
      ),
      128 =>
      array(
        'gentilico' => 'iraquiana',
        'nome_pais' => 'Iraque',
        'nome_pais_int' => 'Iraq',
        'sigla' => 'IQ',
      ),
      129 =>
      array(
        'gentilico' => 'irlandesa',
        'nome_pais' => 'Irlanda',
        'nome_pais_int' => 'Ireland',
        'sigla' => 'IE',
      ),
      130 =>
      array(
        'gentilico' => 'islandesa',
        'nome_pais' => 'Islândia',
        'nome_pais_int' => 'Iceland',
        'sigla' => 'IS',
      ),
      131 =>
      array(
        'gentilico' => 'israelense',
        'nome_pais' => 'Israel',
        'nome_pais_int' => 'Israel',
        'sigla' => 'IL',
      ),
      132 =>
      array(
        'gentilico' => 'italiana',
        'nome_pais' => 'Itália',
        'nome_pais_int' => 'Italy',
        'sigla' => 'IT',
      ),
      133 =>
      array(
        'gentilico' => 'jamaicana',
        'nome_pais' => 'Jamaica',
        'nome_pais_int' => 'Jamaica',
        'sigla' => 'JM',
      ),
      134 =>
      array(
        'gentilico' => 'japonesa',
        'nome_pais' => 'Japão',
        'nome_pais_int' => 'Japan',
        'sigla' => 'JP',
      ),
      135 =>
      array(
        'gentilico' => 'canalina',
        'nome_pais' => 'Jersey',
        'nome_pais_int' => 'Jersey',
        'sigla' => 'JE',
      ),
      136 =>
      array(
        'gentilico' => 'jordaniana',
        'nome_pais' => 'Jordânia',
        'nome_pais_int' => 'Jordan',
        'sigla' => 'JO',
      ),
      137 =>
      array(
        'gentilico' => 'kiribatiana',
        'nome_pais' => 'Kiribati',
        'nome_pais_int' => 'Kiribati',
        'sigla' => 'KI',
      ),
      138 =>
      array(
        'gentilico' => 'kosovar',
        'nome_pais' => 'Kosovo',
        'nome_pais_int' => 'Kosovo',
        'sigla' => 'XK',
      ),
      139 =>
      array(
        'gentilico' => 'kuwaitiano',
        'nome_pais' => 'Kuait',
        'nome_pais_int' => 'Kuwait',
        'sigla' => 'KW',
      ),
      140 =>
      array(
        'gentilico' => 'laosiana',
        'nome_pais' => 'Laos',
        'nome_pais_int' => 'Laos',
        'sigla' => 'LA',
      ),
      141 =>
      array(
        'gentilico' => 'lesota',
        'nome_pais' => 'Lesoto',
        'nome_pais_int' => 'Lesotho',
        'sigla' => 'LS',
      ),
      142 =>
      array(
        'gentilico' => 'letão',
        'nome_pais' => 'Letônia',
        'nome_pais_int' => 'Latvia',
        'sigla' => 'LV',
      ),
      143 =>
      array(
        'gentilico' => 'libanesa',
        'nome_pais' => 'Líbano',
        'nome_pais_int' => 'Lebanon',
        'sigla' => 'LB',
      ),
      144 =>
      array(
        'gentilico' => 'liberiana',
        'nome_pais' => 'Libéria',
        'nome_pais_int' => 'Liberia',
        'sigla' => 'LR',
      ),
      145 =>
      array(
        'gentilico' => 'líbia',
        'nome_pais' => 'Líbia',
        'nome_pais_int' => 'Libya',
        'sigla' => 'LY',
      ),
      146 =>
      array(
        'gentilico' => 'liechtensteiniense',
        'nome_pais' => 'Liechtenstein',
        'nome_pais_int' => 'Liechtenstein',
        'sigla' => 'LI',
      ),
      147 =>
      array(
        'gentilico' => 'lituana',
        'nome_pais' => 'Lituânia',
        'nome_pais_int' => 'Lithuania',
        'sigla' => 'LT',
      ),
      148 =>
      array(
        'gentilico' => 'luxemburguesa',
        'nome_pais' => 'Luxemburgo',
        'nome_pais_int' => 'Luxembourg',
        'sigla' => 'LU',
      ),
      149 =>
      array(
        'gentilico' => 'macauense',
        'nome_pais' => 'Macau',
        'nome_pais_int' => 'Macau',
        'sigla' => 'MO',
      ),
      150 =>
      array(
        'gentilico' => 'macedônio',
        'nome_pais' => 'Macedônia (República Yugoslava)',
        'nome_pais_int' => 'Macedonia (FYROM)',
        'sigla' => 'MK',
      ),
      151 =>
      array(
        'gentilico' => 'malgaxe',
        'nome_pais' => 'Madagascar',
        'nome_pais_int' => 'Madagascar',
        'sigla' => 'MG',
      ),
      152 =>
      array(
        'gentilico' => 'malaia',
        'nome_pais' => 'Malásia',
        'nome_pais_int' => 'Malaysia',
        'sigla' => 'MY',
      ),
      153 =>
      array(
        'gentilico' => 'malauiano',
        'nome_pais' => 'Malaui',
        'nome_pais_int' => 'Malawi',
        'sigla' => 'MW',
      ),
      154 =>
      array(
        'gentilico' => 'maldívia',
        'nome_pais' => 'Maldivas',
        'nome_pais_int' => 'Maldives',
        'sigla' => 'MV',
      ),
      155 =>
      array(
        'gentilico' => 'malinesa',
        'nome_pais' => 'Mali',
        'nome_pais_int' => 'Mali',
        'sigla' => 'ML',
      ),
      156 =>
      array(
        'gentilico' => 'maltesa',
        'nome_pais' => 'Malta',
        'nome_pais_int' => 'Malta',
        'sigla' => 'MT',
      ),
      157 =>
      array(
        'gentilico' => 'marroquina',
        'nome_pais' => 'Marrocos',
        'nome_pais_int' => 'Morocco',
        'sigla' => 'MA',
      ),
      158 =>
      array(
        'gentilico' => 'martiniquense',
        'nome_pais' => 'Martinica',
        'nome_pais_int' => 'Martinique',
        'sigla' => 'MQ',
      ),
      159 =>
      array(
        'gentilico' => 'mauriciana',
        'nome_pais' => 'Maurício',
        'nome_pais_int' => 'Mauritius',
        'sigla' => 'MU',
      ),
      160 =>
      array(
        'gentilico' => 'mauritana',
        'nome_pais' => 'Mauritânia',
        'nome_pais_int' => 'Mauritania',
        'sigla' => 'MR',
      ),
      161 =>
      array(
        'gentilico' => 'maiotense',
        'nome_pais' => 'Mayotte',
        'nome_pais_int' => 'Mayotte',
        'sigla' => 'YT',
      ),
      162 =>
      array(
        'gentilico' => 'mexicana',
        'nome_pais' => 'México',
        'nome_pais_int' => 'Mexico',
        'sigla' => 'MX',
      ),
      163 =>
      array(
        'gentilico' => 'micronésia',
        'nome_pais' => 'Micronésia',
        'nome_pais_int' => 'Micronesia',
        'sigla' => 'FM',
      ),
      164 =>
      array(
        'gentilico' => 'moçambicana',
        'nome_pais' => 'Moçambique',
        'nome_pais_int' => 'Mozambique',
        'sigla' => 'MZ',
      ),
      165 =>
      array(
        'gentilico' => 'moldavo',
        'nome_pais' => 'Moldova',
        'nome_pais_int' => 'Moldova',
        'sigla' => 'MD',
      ),
      166 =>
      array(
        'gentilico' => 'monegasca',
        'nome_pais' => 'Mônaco',
        'nome_pais_int' => 'Monaco',
        'sigla' => 'MC',
      ),
      167 =>
      array(
        'gentilico' => 'mongol',
        'nome_pais' => 'Mongólia',
        'nome_pais_int' => 'Mongolia',
        'sigla' => 'MN',
      ),
      168 =>
      array(
        'gentilico' => 'montenegra',
        'nome_pais' => 'Montenegro',
        'nome_pais_int' => 'Montenegro',
        'sigla' => 'ME',
      ),
      169 =>
      array(
        'gentilico' => 'montserratiano',
        'nome_pais' => 'Montserrat',
        'nome_pais_int' => 'Montserrat',
        'sigla' => 'MS',
      ),
      170 =>
      array(
        'gentilico' => 'birmanês',
        'nome_pais' => 'Myanma',
        'nome_pais_int' => 'Myanmar (Burma)',
        'sigla' => 'MM',
      ),
      171 =>
      array(
        'gentilico' => 'namíbia',
        'nome_pais' => 'Namíbia',
        'nome_pais_int' => 'Namibia',
        'sigla' => 'NA',
      ),
      172 =>
      array(
        'gentilico' => 'nauruana',
        'nome_pais' => 'Nauru',
        'nome_pais_int' => 'Nauru',
        'sigla' => 'NR',
      ),
      173 =>
      array(
        'gentilico' => 'nepalesa',
        'nome_pais' => 'Nepal',
        'nome_pais_int' => 'Nepal',
        'sigla' => 'NP',
      ),
      174 =>
      array(
        'gentilico' => 'nicaraguense',
        'nome_pais' => 'Nicarágua',
        'nome_pais_int' => 'Nicaragua',
        'sigla' => 'NI',
      ),
      175 =>
      array(
        'gentilico' => 'nigerina',
        'nome_pais' => 'Níger',
        'nome_pais_int' => 'Niger',
        'sigla' => 'NE',
      ),
      176 =>
      array(
        'gentilico' => 'nigeriana',
        'nome_pais' => 'Nigéria',
        'nome_pais_int' => 'Nigeria',
        'sigla' => 'NG',
      ),
      177 =>
      array(
        'gentilico' => 'niueana',
        'nome_pais' => 'Niue',
        'nome_pais_int' => 'Niue',
        'sigla' => 'NU',
      ),
      178 =>
      array(
        'gentilico' => 'norueguesa',
        'nome_pais' => 'Noruega',
        'nome_pais_int' => 'Norway',
        'sigla' => 'NO',
      ),
      179 =>
      array(
        'gentilico' => 'caledônia',
        'nome_pais' => 'Nova Caledônia',
        'nome_pais_int' => 'New Caledonia',
        'sigla' => 'NC',
      ),
      180 =>
      array(
        'gentilico' => 'neozelandesa',
        'nome_pais' => 'Nova Zelândia',
        'nome_pais_int' => 'New Zealand',
        'sigla' => 'NZ',
      ),
      181 =>
      array(
        'gentilico' => 'omani',
        'nome_pais' => 'Omã',
        'nome_pais_int' => 'Oman',
        'sigla' => 'OM',
      ),
      182 =>
      array(
        'gentilico' => 'dos países baixos caribenhos',
        'nome_pais' => 'Países Baixos Caribenhos',
        'nome_pais_int' => 'Caribbean Netherlands',
        'sigla' => 'BQ',
      ),
      183 =>
      array(
        'gentilico' => 'palauense',
        'nome_pais' => 'Palau',
        'nome_pais_int' => 'Palau',
        'sigla' => 'PW',
      ),
      184 =>
      array(
        'gentilico' => 'palestino',
        'nome_pais' => 'Palestina',
        'nome_pais_int' => 'Palestine',
        'sigla' => 'PS',
      ),
      185 =>
      array(
        'gentilico' => 'zona do canal do panamá',
        'nome_pais' => 'Panamá',
        'nome_pais_int' => 'Panama',
        'sigla' => 'PA',
      ),
      186 =>
      array(
        'gentilico' => 'pauásia',
        'nome_pais' => 'Papua-Nova Guiné',
        'nome_pais_int' => 'Papua New Guinea',
        'sigla' => 'PG',
      ),
      187 =>
      array(
        'gentilico' => 'paquistanesa',
        'nome_pais' => 'Paquistão',
        'nome_pais_int' => 'Pakistan',
        'sigla' => 'PK',
      ),
      188 =>
      array(
        'gentilico' => 'paraguaia',
        'nome_pais' => 'Paraguai',
        'nome_pais_int' => 'Paraguay',
        'sigla' => 'PY',
      ),
      189 =>
      array(
        'gentilico' => 'peruana',
        'nome_pais' => 'Peru',
        'nome_pais_int' => 'Peru',
        'sigla' => 'PE',
      ),
      190 =>
      array(
        'gentilico' => 'franco-polinésia',
        'nome_pais' => 'Polinésia Francesa',
        'nome_pais_int' => 'French Polynesia',
        'sigla' => 'PF',
      ),
      191 =>
      array(
        'gentilico' => 'polonesa',
        'nome_pais' => 'Polônia',
        'nome_pais_int' => 'Poland',
        'sigla' => 'PL',
      ),
      192 =>
      array(
        'gentilico' => 'portorriquenha',
        'nome_pais' => 'Porto Rico',
        'nome_pais_int' => 'Puerto Rico',
        'sigla' => 'PR',
      ),
      193 =>
      array(
        'gentilico' => 'portuguesa',
        'nome_pais' => 'Portugal',
        'nome_pais_int' => 'Portugal',
        'sigla' => 'PT',
      ),
      194 =>
      array(
        'gentilico' => 'catarense',
        'nome_pais' => 'Qatar',
        'nome_pais_int' => 'Qatar',
        'sigla' => 'QA',
      ),
      195 =>
      array(
        'gentilico' => 'queniano',
        'nome_pais' => 'Quênia',
        'nome_pais_int' => 'Kenya',
        'sigla' => 'KE',
      ),
      196 =>
      array(
        'gentilico' => 'quirguiz',
        'nome_pais' => 'Quirguistão',
        'nome_pais_int' => 'Kyrgyzstan',
        'sigla' => 'KG',
      ),
      197 =>
      array(
        'gentilico' => 'centro-africana',
        'nome_pais' => 'República Centro-Africana',
        'nome_pais_int' => 'Central African Republic',
        'sigla' => 'CF',
      ),
      198 =>
      array(
        'gentilico' => 'congolesa',
        'nome_pais' => 'República Democrática do Congo',
        'nome_pais_int' => 'Congo (DRC)',
        'sigla' => 'CD',
      ),
      199 =>
      array(
        'gentilico' => 'dominicana',
        'nome_pais' => 'República Dominicana',
        'nome_pais_int' => 'Dominican Republic',
        'sigla' => 'DO',
      ),
      200 =>
      array(
        'gentilico' => 'tcheco',
        'nome_pais' => 'República Tcheca',
        'nome_pais_int' => 'Czech Republic',
        'sigla' => 'CZ',
      ),
      201 =>
      array(
        'gentilico' => 'romena',
        'nome_pais' => 'Romênia',
        'nome_pais_int' => 'Romania',
        'sigla' => 'RO',
      ),
      202 =>
      array(
        'gentilico' => 'ruandesa',
        'nome_pais' => 'Ruanda',
        'nome_pais_int' => 'Rwanda',
        'sigla' => 'RW',
      ),
      203 =>
      array(
        'gentilico' => 'russa',
        'nome_pais' => 'Rússia (antiga URSS) - Federação Russa',
        'nome_pais_int' => 'Russia',
        'sigla' => 'RU',
      ),
      204 =>
      array(
        'gentilico' => 'saariano',
        'nome_pais' => 'Saara Ocidental',
        'nome_pais_int' => 'Western Sahara',
        'sigla' => 'EH',
      ),
      205 =>
      array(
        'gentilico' => 'pedro-miquelonense',
        'nome_pais' => 'Saint-Pierre e Miquelon',
        'nome_pais_int' => 'St. Pierre & Miquelon',
        'sigla' => 'PM',
      ),
      206 =>
      array(
        'gentilico' => 'samoana',
        'nome_pais' => 'Samoa Americana',
        'nome_pais_int' => 'American Samoa',
        'sigla' => 'AS',
      ),
      207 =>
      array(
        'gentilico' => 'samoano',
        'nome_pais' => 'Samoa Ocidental',
        'nome_pais_int' => 'Samoa',
        'sigla' => 'WS',
      ),
      208 =>
      array(
        'gentilico' => 'samarinês',
        'nome_pais' => 'San Marino',
        'nome_pais_int' => 'San Marino',
        'sigla' => 'SM',
      ),
      209 =>
      array(
        'gentilico' => 'helenense',
        'nome_pais' => 'Santa Helena',
        'nome_pais_int' => 'St. Helena',
        'sigla' => 'SH',
      ),
      210 =>
      array(
        'gentilico' => 'santa-lucense',
        'nome_pais' => 'Santa Lúcia',
        'nome_pais_int' => 'St. Lucia',
        'sigla' => 'LC',
      ),
      211 =>
      array(
        'gentilico' => 'são-bartolomeense',
        'nome_pais' => 'São Bartolomeu',
        'nome_pais_int' => 'St. Barthélemy',
        'sigla' => 'BL',
      ),
      212 =>
      array(
        'gentilico' => 'são-cristovense',
        'nome_pais' => 'São Cristóvão e Névis',
        'nome_pais_int' => 'St. Kitts & Nevis',
        'sigla' => 'KN',
      ),
      213 =>
      array(
        'gentilico' => 'são-martinhense',
        'nome_pais' => 'São Martim',
        'nome_pais_int' => 'St. Martin',
        'sigla' => 'MF',
      ),
      214 =>
      array(
        'gentilico' => 'são-martinhense',
        'nome_pais' => 'São Martinho',
        'nome_pais_int' => 'Sint Maarten',
        'sigla' => 'SX',
      ),
      215 =>
      array(
        'gentilico' => 'são-tomense',
        'nome_pais' => 'São Tomé e Príncipe',
        'nome_pais_int' => 'São Tomé & Príncipe',
        'sigla' => 'ST',
      ),
      216 =>
      array(
        'gentilico' => 'sao-vicentino',
        'nome_pais' => 'São Vicente e Granadinas',
        'nome_pais_int' => 'St. Vincent & Grenadines',
        'sigla' => 'VC',
      ),
      217 =>
      array(
        'gentilico' => 'senegalesa',
        'nome_pais' => 'Senegal',
        'nome_pais_int' => 'Senegal',
        'sigla' => 'SN',
      ),
      218 =>
      array(
        'gentilico' => 'leonesa',
        'nome_pais' => 'Serra Leoa',
        'nome_pais_int' => 'Sierra Leone',
        'sigla' => 'SL',
      ),
      219 =>
      array(
        'gentilico' => 'sérvia',
        'nome_pais' => 'Sérvia',
        'nome_pais_int' => 'Serbia',
        'sigla' => 'RS',
      ),
      220 =>
      array(
        'gentilico' => 'síria',
        'nome_pais' => 'Síria',
        'nome_pais_int' => 'Syria',
        'sigla' => 'SY',
      ),
      221 =>
      array(
        'gentilico' => 'somali',
        'nome_pais' => 'Somália',
        'nome_pais_int' => 'Somalia',
        'sigla' => 'SO',
      ),
      222 =>
      array(
        'gentilico' => 'cingalesa',
        'nome_pais' => 'Sri Lanka',
        'nome_pais_int' => 'Sri Lanka',
        'sigla' => 'LK',
      ),
      223 =>
      array(
        'gentilico' => 'suazi',
        'nome_pais' => 'Suazilândia',
        'nome_pais_int' => 'Swaziland',
        'sigla' => 'SZ',
      ),
      224 =>
      array(
        'gentilico' => 'sudanesa',
        'nome_pais' => 'Sudão',
        'nome_pais_int' => 'Sudan',
        'sigla' => 'SD',
      ),
      225 =>
      array(
        'gentilico' => 'sul-sudanês',
        'nome_pais' => 'Sudão do Sul',
        'nome_pais_int' => 'South Sudan',
        'sigla' => 'SS',
      ),
      226 =>
      array(
        'gentilico' => 'sueca',
        'nome_pais' => 'Suécia',
        'nome_pais_int' => 'Sweden',
        'sigla' => 'SE',
      ),
      227 =>
      array(
        'gentilico' => 'suíça',
        'nome_pais' => 'Suíça',
        'nome_pais_int' => 'Switzerland',
        'sigla' => 'CH',
      ),
      228 =>
      array(
        'gentilico' => 'surinamesa',
        'nome_pais' => 'Suriname',
        'nome_pais_int' => 'Suriname',
        'sigla' => 'SR',
      ),
      229 =>
      array(
        'gentilico' => 'svalbardense',
        'nome_pais' => 'Svalbard',
        'nome_pais_int' => 'Svalbard & Jan Mayen',
        'sigla' => 'SJ',
      ),
      230 =>
      array(
        'gentilico' => 'tadjique',
        'nome_pais' => 'Tadjiquistão',
        'nome_pais_int' => 'Tajikistan',
        'sigla' => 'TJ',
      ),
      231 =>
      array(
        'gentilico' => 'tailandesa',
        'nome_pais' => 'Tailândia',
        'nome_pais_int' => 'Thailand',
        'sigla' => 'TH',
      ),
      232 =>
      array(
        'gentilico' => 'taiwanês',
        'nome_pais' => 'Taiwan',
        'nome_pais_int' => 'Taiwan',
        'sigla' => 'TW',
      ),
      233 =>
      array(
        'gentilico' => 'tanzaniana',
        'nome_pais' => 'Tanzânia',
        'nome_pais_int' => 'Tanzania',
        'sigla' => 'TZ',
      ),
      234 =>
      array(
        'gentilico' => 'do território britânico do oceano índico',
        'nome_pais' => 'Território Britânico do Oceano índico',
        'nome_pais_int' => 'British Indian Ocean Territory',
        'sigla' => 'IO',
      ),
      235 =>
      array(
        'gentilico' => 'do territórios do sul da frança',
        'nome_pais' => 'Territórios do Sul da França',
        'nome_pais_int' => 'French Southern Territories',
        'sigla' => 'TF',
      ),
      236 =>
      array(
        'gentilico' => 'timorense',
        'nome_pais' => 'Timor-Leste',
        'nome_pais_int' => 'Timor-Leste',
        'sigla' => 'TL',
      ),
      237 =>
      array(
        'gentilico' => 'togolesa',
        'nome_pais' => 'Togo',
        'nome_pais_int' => 'Togo',
        'sigla' => 'TG',
      ),
      238 =>
      array(
        'gentilico' => 'tonganesa',
        'nome_pais' => 'Tonga',
        'nome_pais_int' => 'Tonga',
        'sigla' => 'TO',
      ),
      239 =>
      array(
        'gentilico' => 'trinitário-tobagense',
        'nome_pais' => 'Trinidad e Tobago',
        'nome_pais_int' => 'Trinidad & Tobago',
        'sigla' => 'TT',
      ),
      240 =>
      array(
        'gentilico' => 'tristanita',
        'nome_pais' => 'Tristão da Cunha',
        'nome_pais_int' => 'Tristan da Cunha',
        'sigla' => 'TA',
      ),
      241 =>
      array(
        'gentilico' => 'tunisiana',
        'nome_pais' => 'Tunísia',
        'nome_pais_int' => 'Tunisia',
        'sigla' => 'TN',
      ),
      242 =>
      array(
        'gentilico' => 'turcomana',
        'nome_pais' => 'Turcomenistão',
        'nome_pais_int' => 'Turkmenistan',
        'sigla' => 'TM',
      ),
      243 =>
      array(
        'gentilico' => 'turca',
        'nome_pais' => 'Turquia',
        'nome_pais_int' => 'Turkey',
        'sigla' => 'TR',
      ),
      244 =>
      array(
        'gentilico' => 'tuvaluana',
        'nome_pais' => 'Tuvalu',
        'nome_pais_int' => 'Tuvalu',
        'sigla' => 'TV',
      ),
      245 =>
      array(
        'gentilico' => 'ucraniana',
        'nome_pais' => 'Ucrânia',
        'nome_pais_int' => 'Ukraine',
        'sigla' => 'UA',
      ),
      246 =>
      array(
        'gentilico' => 'ugandense',
        'nome_pais' => 'Uganda',
        'nome_pais_int' => 'Uganda',
        'sigla' => 'UG',
      ),
      247 =>
      array(
        'gentilico' => 'uruguaia',
        'nome_pais' => 'Uruguai',
        'nome_pais_int' => 'Uruguay',
        'sigla' => 'UY',
      ),
      248 =>
      array(
        'gentilico' => 'uzbeque',
        'nome_pais' => 'Uzbequistão',
        'nome_pais_int' => 'Uzbekistan',
        'sigla' => 'UZ',
      ),
      249 =>
      array(
        'gentilico' => 'vanuatuense',
        'nome_pais' => 'Vanuatu',
        'nome_pais_int' => 'Vanuatu',
        'sigla' => 'VU',
      ),
      250 =>
      array(
        'gentilico' => 'vaticano',
        'nome_pais' => 'Vaticano',
        'nome_pais_int' => 'Vatican City',
        'sigla' => 'VA',
      ),
      251 =>
      array(
        'gentilico' => 'venezuelana',
        'nome_pais' => 'Venezuela',
        'nome_pais_int' => 'Venezuela',
        'sigla' => 'VE',
      ),
      252 =>
      array(
        'gentilico' => 'vietnamita',
        'nome_pais' => 'Vietnã',
        'nome_pais_int' => 'Vietnam',
        'sigla' => 'VN',
      ),
      253 =>
      array(
        'gentilico' => 'wallis-futunense',
        'nome_pais' => 'Wallis e Futuna',
        'nome_pais_int' => 'Wallis & Futuna',
        'sigla' => 'WF',
      ),
      254 =>
      array(
        'gentilico' => 'zambiana',
        'nome_pais' => 'Zâmbia',
        'nome_pais_int' => 'Zambia',
        'sigla' => 'ZM',
      ),
      255 =>
      array(
        'gentilico' => 'zimbabuana',
        'nome_pais' => 'Zimbábue',
        'nome_pais_int' => 'Zimbabwe',
        'sigla' => 'ZW',
      ),
    );

    foreach ($itens as $item) {
      DB::table('countries')->insert([
        'name' => $item['nome_pais'],
        'nationality' => $item['gentilico'],
        'code' => $item['sigla'],
        'description' => null,
        'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
        'created_at' => date('Y-m-d H:i:s'),
      ]);
    }
  }
}
