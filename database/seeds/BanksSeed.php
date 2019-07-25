<?php

use Illuminate\Database\Seeder;

class BanksSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('banks')->insert([
				'id' => '1',
				'bank' => 'AFFIN BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'PHBMMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '2',
				'bank' => 'AFFIN HWANG INVESTMENT BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'HDSBMY2P',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '3',
				'bank' => 'AFFIN ISLAMIC BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'AIBBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '4',
				'bank' => 'AIA BHD.',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'AIACMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '5',
				'bank' => 'AL RAJHI BANKING AND INVESTMENT CORPORATION (MALAYSIA) BHD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'RJHIMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '6',
				'bank' => 'ALKHAIR INTERNATIONAL ISLAMIC BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'UIIBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '7',
				'bank' => 'ALLIANCE BANK MALAYSIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MFBBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '8',
				'bank' => 'ALLIANCE INVESTMENT BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBAMMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '9',
				'bank' => 'ALLIANCE ISLAMIC BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'ALSRMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '10',
				'bank' => 'AMBANK (M) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'ARBKMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '11',
				'bank' => 'AMBANK (M) BERHAD',
				'city' => 'LABUAN',
				'swift_code' => 'ARBKMYKLLAB',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '12',
				'bank' => 'AMINVESTMENT BANK BERHAD (FORMERLY KNOWN AS AMMERCHANT BANK BERHAD)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'AMMBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '13',
				'bank' => 'AMISLAMIC BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'AISLMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '14',
				'bank' => 'ASIAN FINANCE BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'AFBQMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '15',
				'bank' => 'ASIAN TRADE INVESTMENT BANK LTD',
				'city' => 'LABUAN',
				'swift_code' => 'ATBLMY2A',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '16',
				'bank' => 'BANGKOK BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BKKBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '17',
				'bank' => 'BANK AL HABIB LIMITED',
				'city' => 'LABUAN',
				'swift_code' => 'BAHLMY2A',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '18',
				'bank' => 'BANK ISLAM MALAYSIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BIMBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '19',
				'bank' => 'BANK ISLAM MALAYSIA BERHAD LABUAN OFFSHORE BRANCH',
				'city' => 'LABUAN',
				'swift_code' => 'BISLMYKA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '20',
				'bank' => 'BANK KERJASAMA RAKYAT MALAYSIA BERHAD (BANK RAKYAT)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BKRMMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '21',
				'bank' => 'BANK MUAMALAT MALAYSIA BERHAD (6175-W)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BMMBMYKLTFD',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '22',
				'bank' => 'BANK MUAMALAT MALAYSIA BERHAD (6175-W)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BMMBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '23',
				'bank' => 'BANK NEGARA MALAYSIA',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BNMAMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '24',
				'bank' => 'BANK NEGARA MALAYSIA',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BNMAMY2K',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '25',
				'bank' => 'BANK OF AMERICA, MALAYSIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BOFAMY2X',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '26',
				'bank' => 'BANK OF AMERICA, MALAYSIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BOFAMY2XGRC',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '27',
				'bank' => 'BANK OF AMERICA, MALAYSIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BOFAMY2XLMY',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '28',
				'bank' => 'BANK OF AMERICA, MALAYSIA BERHAD',
				'city' => 'LABUAN',
				'swift_code' => 'BOFAMY2XLBN',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '29',
				'bank' => 'BANK OF CHINA (MALAYSIA) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BKCHMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '30',
				'bank' => 'BANK OF NOVA SCOTIA, THE',
				'city' => 'LABUAN',
				'swift_code' => 'NOSCMY2L',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '31',
				'bank' => 'BANK OF TOKYO-MITSUBISHI UFJ (MALAYSIA) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BOTKMYKX',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '32',
				'bank' => 'BANK OF TOKYO-MITSUBISHI UFJ, LTD., THE',
				'city' => 'LABUAN',
				'swift_code' => 'BOTKMYKA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '33',
				'bank' => 'BANK PERTANIAN MALAYSIA BERHAD-AGROBANK',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'AGOBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '34',
				'bank' => 'BNP PARIBAS',
				'city' => 'LABUAN',
				'swift_code' => 'BNPAMYKA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '35',
				'bank' => 'BNP PARIBAS MALAYSIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BNPAMYKLSPI',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '36',
				'bank' => 'BNP PARIBAS MALAYSIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'BNPAMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '37',
				'bank' => 'CAGAMAS BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'CAGAMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '38',
				'bank' => 'CIMB BANK (L) LIMITED',
				'city' => 'LABUAN',
				'swift_code' => 'CIBBMYKA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '39',
				'bank' => 'CIMB BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'CIBBMYKLSBL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '40',
				'bank' => 'CIMB BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'CIBBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '41',
				'bank' => 'CIMB BANK BERHAD, LABUAN OFFSHORE BRANCH',
				'city' => 'LABUAN',
				'swift_code' => 'CIBBMY2L',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '42',
				'bank' => 'CIMB INVESTMENT BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'COIMMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '43',
				'bank' => 'CIMB ISLAMIC BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'CTBBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '44',
				'bank' => 'CIMB-PRINCIPAL ASSET MANAGEMENT BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'CANHMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '45',
				'bank' => 'CITIBANK BERHAD',
				'city' => 'GEORGETOWN',
				'swift_code' => 'CITIMYKLPEN',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '46',
				'bank' => 'CITIBANK BERHAD',
				'city' => 'JOHOR BAHRU, JOHOR',
				'swift_code' => 'CITIMYKLJOD',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '47',
				'bank' => 'CITIBANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'CITIMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '48',
				'bank' => 'CITIBANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'CITIMYKLLAB',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '49',
				'bank' => 'DBS BANK LTD, LABUAN BRANCH',
				'city' => 'LABUAN',
				'swift_code' => 'DBSSMY2A',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '50',
				'bank' => 'DEUTSCHE BANK (MALAYSIA) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'DEUTMYKLISB',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '51',
				'bank' => 'DEUTSCHE BANK (MALAYSIA) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'DEUTMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '52',
				'bank' => 'DEUTSCHE BANK (MALAYSIA) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'DEUTMYKLGMO',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '53',
				'bank' => 'DEUTSCHE BANK (MALAYSIA) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'DEUTMYKLIBW',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '54',
				'bank' => 'DEUTSCHE BANK (MALAYSIA) BERHAD',
				'city' => 'LABUAN',
				'swift_code' => 'DEUTMYKLBLB',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '55',
				'bank' => 'EXPORT-IMPORT BANK OF MALAYSIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'EXMBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '56',
				'bank' => 'FELDA GLOBAL VENTURES CAPITAL SDN. BHD.',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'FGVCMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '57',
				'bank' => 'FIDELITY ASIA BANK LTD',
				'city' => 'LABUAN',
				'swift_code' => 'FABEMY22',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '58',
				'bank' => 'HONG LEONG BANK BERHAD',
				'city' => 'JOHOR BAHRU, JOHOR',
				'swift_code' => 'HLBBMYKLJBU',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '59',
				'bank' => 'HONG LEONG BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'HLBBMYKLIBU',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '60',
				'bank' => 'HONG LEONG BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'HLBBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '61',
				'bank' => 'HONG LEONG BANK BERHAD',
				'city' => 'KUCHING, SARAWAK',
				'swift_code' => 'HLBBMYKLKCH',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '62',
				'bank' => 'HONG LEONG BANK BERHAD',
				'city' => 'PENANG, PENANG',
				'swift_code' => 'HLBBMYKLPNG',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '63',
				'bank' => 'HONG LEONG INVESTMENT BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'HLIVMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '64',
				'bank' => 'HONG LEONG ISLAMIC BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'HLIBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '65',
				'bank' => 'HONGKONG AND SHANGHAI BANKING CORPORATION LTD.,THE',
				'city' => 'LABUAN',
				'swift_code' => 'HSBCMYKA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '66',
				'bank' => 'HSBC (MALAYSIA) TRUSTEE BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'HSTMMYKLGWS',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '67',
				'bank' => 'HSBC (MALAYSIA) TRUSTEE BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'HSTMMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '68',
				'bank' => 'HSBC AMANAH MALAYSIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'HMABMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '69',
				'bank' => 'HSBC BANK MALAYSIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'HBMBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '70',
				'bank' => 'INDIA INTERNATIONAL BANK (MALAYSIA) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'IIMBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '71',
				'bank' => 'INDUSTRIAL AND COMMERCIAL BANK OF CHINA (MALAYSIA) BERHAD.',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'ICBKMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '72',
				'bank' => 'INDUSTRIAL AND COMMERCIAL BANK OF CHINA (MALAYSIA) BERHAD.',
				'city' => 'LABUAN',
				'swift_code' => 'ICBKMYKLLAB',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '73',
				'bank' => 'J.P.MORGAN CHASE BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'CHASMYKXSEC',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '74',
				'bank' => 'J.P.MORGAN CHASE BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'CHASMYKXKEY',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '75',
				'bank' => 'J.P.MORGAN CHASE BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'CHASMYKX',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '76',
				'bank' => 'JPMORGAN CHASE BANK, N.A., LABUAN BRANCH',
				'city' => 'LABUAN',
				'swift_code' => 'CHASMY2A',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '77',
				'bank' => 'KAF INVESTMENT BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'KAFBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '78',
				'bank' => 'KENANGA INVESTMENT BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'ECMLMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '79',
				'bank' => 'KUWAIT FINANCE HOUSE (MALAYSIA) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'KFHOMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '80',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'BUTTERWORTH, PENANG',
				'swift_code' => 'MBBEMYKLBWC',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '81',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'IPOH, PERAK',
				'swift_code' => 'MBBEMYKLIPH',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '82',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'JOHOR BAHRU, JOHOR',
				'swift_code' => 'MBBEMYKLJOB',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '83',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'KOTA KINABALU, SABAH',
				'swift_code' => 'MBBEMYKLKIN',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '84',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'KUALA LUMPU',
				'swift_code' => 'MBBEMYKLBAN',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '85',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBBEMYKLBBG',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '86',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBBEMYKLWEB',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '87',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBBEMYKLCSD',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '88',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBBEMYKLKEP',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '89',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBBEMYKLPUD',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '90',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBBEMYKLSUB',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '91',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBBEMYKLKLC',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '92',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBBEMYKLWSD',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '93',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBBEMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '94',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'MALACCA, MALACCA',
				'swift_code' => 'MBBEMYKLMAL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '95',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'PASIR GUDANG, JOHOR',
				'swift_code' => 'MBBEMYKLPSG',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '96',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'PENANG, PENANG',
				'swift_code' => 'MBBEMYKLPGC',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '97',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'PENANG, PENANG',
				'swift_code' => 'MBBEMYKLPEN',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '98',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'PETALING JAYA, SELANGOR',
				'swift_code' => 'MBBEMYKLPJC',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '99',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'PETALING JAYA, SELANGOR',
				'swift_code' => 'MBBEMYKLYSL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '100',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'PETALING JAYA, SELANGOR',
				'swift_code' => 'MBBEMYKLPJY',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '101',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'PORT KLANG, SELANGOR',
				'swift_code' => 'MBBEMYKLPKG',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '102',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'SEREMBAN, NEGRI SEMBILAN',
				'swift_code' => 'MBBEMYKLSBN',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '103',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'SHAH ALAM, SELANGOR',
				'swift_code' => 'MBBEMYKLSAC',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '104',
				'bank' => 'MALAYAN BANKING BERHAD (MAYBANK)',
				'city' => 'SHAH ALAM, SELANGOR',
				'swift_code' => 'MBBEMYKLSHA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '105',
				'bank' => 'MALAYSIA AIRLINES BERHAD',
				'city' => 'SUBANG',
				'swift_code' => 'MAYHMY22',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '106',
				'bank' => 'MAX MONEY SDN BHD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MMSBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '107',
				'bank' => 'MAYBANK INTERNATIONAL (L) LTD.',
				'city' => 'LABUAN',
				'swift_code' => 'MBBEMYKA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '108',
				'bank' => 'MAYBANK INTERNATIONAL LABUAN BRANCH',
				'city' => 'LABUAN',
				'swift_code' => 'MBBEMY2L',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '109',
				'bank' => 'MAYBANK INVESTMENT BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBEAMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '110',
				'bank' => 'MAYBANK ISLAMIC BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBISMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '111',
				'bank' => 'MEGA INTERNATIONAL COMMERCIAL BANK CO., LTD. LABUAN BRANCH',
				'city' => 'LABUAN',
				'swift_code' => 'ICBCMY2L',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '112',
				'bank' => 'MERCEDES-BENZ MALAYSIA SDN. BHD.',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'DABEMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '113',
				'bank' => 'MERCEDES-BENZ SERVICES MALAYSIA SDN. BHD.',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MBSMMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '114',
				'bank' => 'MIDDLE EAST INVESTMENT BANK LTD',
				'city' => 'LABUAN',
				'swift_code' => 'MEIBMYKA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '115',
				'bank' => 'MIZUHO BANK (MALAYSIA) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'MHCBMYKA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '116',
				'bank' => 'MIZUHO BANK, LTD., LABUAN BRANCH',
				'city' => 'LABUAN',
				'swift_code' => 'MHCBMY2L',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '117',
				'bank' => 'NATIONAL BANK OF ABU DHABI',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'NBADMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '118',
				'bank' => 'NATIONAL BANK OF ABU DHABI',
				'city' => 'LABUAN',
				'swift_code' => 'NBADMYKLLAU',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '119',
				'bank' => 'NOMURA ASSET MANAGEMENT MALAYSIA SDN BHD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'NOCMMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '120',
				'bank' => 'OCBC AL-AMIN BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'OABBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '121',
				'bank' => 'OCBC BANK (MALAYSIA) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'OCBCMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '122',
				'bank' => 'OVERSEA-CHINESE BANKING CORP. LTD, LABUAN BRANCH',
				'city' => 'LABUAN',
				'swift_code' => 'OCBCMYKA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '123',
				'bank' => 'PETROLIAM NASIONAL BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'PTROMYKLFSD',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '124',
				'bank' => 'PETROLIAM NASIONAL BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'PTROMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '125',
				'bank' => 'PETRONAS CARIGALI SDN BHD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'PCGLMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '126',
				'bank' => 'PETRONAS TRADING CORPORATION SDN. BHD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'PTRDMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '127',
				'bank' => 'PG ASIA INVESTMENT BANK LTD',
				'city' => 'LABUAN',
				'swift_code' => 'AINEMY22',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '128',
				'bank' => 'PUBLIC BANK (L) LTD',
				'city' => 'LABUAN',
				'swift_code' => 'PBLLMYKA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '129',
				'bank' => 'PUBLIC BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'PBBEMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '130',
				'bank' => 'PUBLIC ISLAMIC BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'PUIBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '131',
				'bank' => 'RHB BANK (L) LTD',
				'city' => 'LABUAN',
				'swift_code' => 'RHBBMYKA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '132',
				'bank' => 'RHB BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'RHBBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '133',
				'bank' => 'RHB INVESTMENT BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'OSKIMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '134',
				'bank' => 'RHB ISLAMIC BANK BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'RHBAMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '135',
				'bank' => 'STANDARD CHARTERED BANK MALAYSIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'SCBLMYKX',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '136',
				'bank' => 'STANDARD CHARTERED BANK MALAYSIA BERHAD',
				'city' => 'LABUAN',
				'swift_code' => 'SCBLMYKXLAB',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '137',
				'bank' => 'STANDARD CHARTERED SAADIQ BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'SCSRMYKK',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '138',
				'bank' => 'SUMITOMO MITSUI BANKING CORPORATION',
				'city' => 'LABUAN',
				'swift_code' => 'SMBCMYKA',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '139',
				'bank' => 'SUMITOMO MITSUI BANKING CORPORATION MALAYSIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'SMBCMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '140',
				'bank' => 'THE BANK OF NOVA SCOTIA BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'NOSCMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '141',
				'bank' => 'THE ROYAL BANK OF SCOTLAND BERHAD (301932-A)',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'ABNAMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '142',
				'bank' => 'THE ROYAL BANK OF SCOTLAND BERHAD (301932-A)',
				'city' => 'PENANG, PENANG',
				'swift_code' => 'ABNAMYKLPNG',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '143',
				'bank' => 'THE ROYAL BANK OF SCOTLAND PLC LABUAN BRANCH',
				'city' => 'LABUAN',
				'swift_code' => 'ABNAMY2A',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '144',
				'bank' => 'UNITED OVERSEAS BANK (MALAYSIA) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'UOVBMYKLCND',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '145',
				'bank' => 'UNITED OVERSEAS BANK (MALAYSIA) BERHAD',
				'city' => 'KUALA LUMPUR',
				'swift_code' => 'UOVBMYKL',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '146',
				'bank' => 'UNITED OVERSEAS BANK LIMITED LABUAN BRANCH',
				'city' => 'LABUAN',
				'swift_code' => 'UOVBMY2L',
				'account' => NULL,
				'active' => 0,
			]);
		DB::table('banks')->insert([
				'id' => '147',
				'bank' => 'PAY PAL',
				'city' => 'USA',
				'swift_code' => 'PAYPAL',
				'account' => NULL,
				'active' => 0,
			]);
    }
}
