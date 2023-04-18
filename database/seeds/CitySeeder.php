<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{

    public function stateNameToId($name){
        if ($name == "Aşgabat")
            return 1;
        if ($name == "Ahal")
            return 2;
        if ($name == "Balkan")
            return 3;
        if ($name == "Daşoguz")
            return 4;
        if ($name == "Lebap")
            return 5;
        if ($name == "Mary")
            return 6;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $cities = array(
            array('id' => '1','name' => 'Akdepe etrap','province' => 'Daşoguz','created_at' => '2019-09-30 10:25:17','updated_at' => '2019-10-31 16:42:27'),
            array('id' => '2','name' => 'Altyn Asyr etrap','province' => 'Ahal','created_at' => '2019-09-30 10:25:17','updated_at' => '2019-10-31 16:42:27'),
            array('id' => '3','name' => 'Altyn Sähra etrap','province' => 'Mary','created_at' => '2019-09-30 10:25:17','updated_at' => '2019-10-31 16:42:27'),
            array('id' => '4','name' => 'Aşgabat','province' => 'Aşgabat','created_at' => '2019-09-30 10:25:17','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '5','name' => 'Babadaýhan etrap','province' => 'Ahal','created_at' => '2019-09-30 10:25:17','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '6','name' => 'Babadurmaz','province' => 'Ahal','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '7','name' => 'Baharly etrap','province' => 'Ahal','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '8','name' => 'Balkanabat şäheri','province' => 'Balkan','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '9','name' => 'Bamy','province' => 'Ahal','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '10','name' => 'Baýramaly etrap','province' => 'Mary','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '11','name' => 'Bekdaş','province' => 'Balkan','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '12','name' => 'Bereket etrap','province' => 'Balkan','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '13','name' => 'Bokurdak ş','province' => 'Ahal','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '14','name' => 'Boldumsaz etrap','province' => 'Daşoguz','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '15','name' => 'Danew etrap Garaşsyzlyk a/b','province' => 'Lebap','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '16','name' => 'Danew etrap Seýdi a/b','province' => 'Lebap','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '17','name' => 'Dargan Ata etrap','province' => 'Lebap','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '18','name' => 'Daşoguz şäheri','province' => 'Daşoguz','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:28'),
            array('id' => '19','name' => 'Dostluk a/b','province' => 'Mary','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '20','name' => 'Dowletli EPAM-n Beýik Türkmenbaşy a/b','province' => 'Lebap','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '21','name' => 'Duşak','province' => 'Ahal','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '22','name' => 'Döwletli a/b','province' => 'Mary','created_at' => '2019-09-30 10:25:18','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '23','name' => 'Döwletli etrap','province' => 'Lebap','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '24','name' => 'Dаnew etrap','province' => 'Lebap','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '25','name' => 'Esenguly etrap','province' => 'Balkan','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '26','name' => 'Etrek etrap','province' => 'Balkan','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '27','name' => 'Farap etrap','province' => 'Lebap','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '28','name' => 'Galaýmor a/b','province' => 'Mary','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '29','name' => 'Garabogaz etrap','province' => 'Balkan','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '30','name' => 'Garagum etrap','province' => 'Mary','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '31','name' => 'Garaköl a/b','province' => 'Mary','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '32','name' => 'Gazojak etrap','province' => 'Lebap','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '33','name' => 'Gubadag etrap','province' => 'Daşoguz','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '34','name' => 'Gumdag şäheri','province' => 'Balkan','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '35','name' => 'Gurbansoltan eje etrap','province' => 'Daşoguz','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '36','name' => 'Gökdepe etrap','province' => 'Ahal','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '37','name' => 'Görogly etrap','province' => 'Daşoguz','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '38','name' => 'Halac etrap Garabekewül a/b','province' => 'Lebap','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:27'),
            array('id' => '39','name' => 'Halaç etrap','province' => 'Lebap','created_at' => '2019-09-30 10:25:19','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '40','name' => 'Hazar-Çeleken şäheri','province' => 'Balkan','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '41','name' => 'Hojambaz etrap','province' => 'Lebap','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '42','name' => 'Kaka etrap','province' => 'Ahal','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '43','name' => 'Kerki EPAM','province' => 'Lebap','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '44','name' => 'Kiçi aga','province' => 'Ahal','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '45','name' => 'Koytendag etrap Magdanly a/b','province' => 'Lebap','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '46','name' => 'Köneürgenç etrap','province' => 'Daşoguz','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '47','name' => 'Köýtendag etrap','province' => 'Lebap','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '48','name' => 'M. Sopyýew','province' => 'Ahal','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '49','name' => 'Magtymguly-G-gala etrap','province' => 'Balkan','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '50','name' => 'Mary etrap','province' => 'Mary','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '51','name' => 'Mary şäher','province' => 'Mary','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '52','name' => 'Miweçilik a/b','province' => 'Mary','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:30'),
            array('id' => '53','name' => 'Murgap etrap','province' => 'Mary','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '54','name' => 'Mäne','province' => 'Ahal','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '55','name' => 'Niyazow Dayhan birleşigi','province' => 'Ahal','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '56','name' => 'Niýazow etrap','province' => 'Daşoguz','created_at' => '2019-09-30 10:25:20','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '57','name' => 'Oguzhan etrap','province' => 'Mary','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '58','name' => 'Rawnina poçta aragatnaşyk bölümi','province' => 'Mary','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '59','name' => 'Ruhubelent etrap','province' => 'Daşoguz','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '60','name' => 'S.A. Nyýazow poçta aragatnaşyk bölümi','province' => 'Mary','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '61','name' => 'S.Turkmenbaşy etrap','province' => 'Daşoguz','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '62','name' => 'Sakarçäge etrap','province' => 'Mary','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '63','name' => 'Saragt etrap','province' => 'Ahal','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '64','name' => 'Saryja a/b','province' => 'Mary','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '65','name' => 'Saryýazy a/b','province' => 'Mary','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '66','name' => 'Sayat etrap Sakar a/b','province' => 'Lebap','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '67','name' => 'Saýat etrap','province' => 'Lebap','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '68','name' => 'Serdar şäher','province' => 'Balkan','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:31'),
            array('id' => '69','name' => 'Serhetabat etrap','province' => 'Mary','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '70','name' => 'Serhetçi a/b','province' => 'Mary','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '71','name' => 'Tagtabazar etrap','province' => 'Mary','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '72','name' => 'Tejen şäher','province' => 'Ahal','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '73','name' => 'Türkmenabat şäher','province' => 'Lebap','created_at' => '2019-09-30 10:25:21','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '74','name' => 'Türkmenbaşy şäher','province' => 'Balkan','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '75','name' => 'Türkmengala etrap','province' => 'Mary','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '76','name' => 'Uçajy poçta aragatnaşyk bölümi','province' => 'Mary','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '77','name' => 'Watan Dayhan birleşigi','province' => 'Ahal','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '78','name' => 'Wekilbazar etrap','province' => 'Mary','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '79','name' => 'Yaslyk Dayhan birleşigi','province' => 'Ahal','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '80','name' => 'Zähmet poçta aragatnaşyk bölümi','province' => 'Mary','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '81','name' => 'Änew şäher','province' => 'Ahal','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '82','name' => 'Çemenabat a/b','province' => 'Mary','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '83','name' => 'Çäçe','province' => 'Ahal','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '84','name' => 'Üzümçilik a/b','province' => 'Mary','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '85','name' => 'Ýeňiş a/b','province' => 'Mary','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:32'),
            array('id' => '86','name' => 'Ýolöten etrap','province' => 'Mary','created_at' => '2019-09-30 10:25:22','updated_at' => '2019-10-31 16:42:33'),
            array('id' => '87','name' => 'Gazojak şäher','province' => 'Lebap','created_at' => '2019-10-31 16:42:29','updated_at' => '2019-10-31 16:42:29'),
            array('id' => '88','name' => 'Sarahs etrap','province' => 'Ahal','created_at' => '2019-11-11 16:46:45','updated_at' => '2019-11-11 16:46:45'),
            array('id' => '89','name' => 'Türkmenbaşy etrap','province' => 'Balkan','created_at' => '2019-11-11 16:46:46','updated_at' => '2019-11-11 16:46:46'),
            array('id' => '90','name' => 'Türkmenbaşy şäheri','province' => 'Balkan','created_at' => '2019-11-11 16:46:46','updated_at' => '2019-11-11 16:46:46'),
            array('id' => '91','name' => 'Türkmenbaşy şäheri Halkara Howa Menzili','province' => 'Balkan','created_at' => '2019-11-11 16:46:47','updated_at' => '2019-11-11 16:46:47'),
            array('id' => '93','name' => 'Çärjew etrap','province' => 'Lebap','created_at' => '2019-11-15 12:07:11','updated_at' => '2019-11-15 12:07:11'),
            array('id' => '94','name' => 'Akbugdaý etrap','province' => 'Aşgabat','created_at' => '2019-11-21 13:55:34','updated_at' => '2019-11-21 13:55:34')
        );


        foreach($cities as $city){
            \App\City::create([
                'id' => $city['id'],
                'state_id' => $this->stateNameToId($city['province']),
                'name' => $city['name'],
                'slug' => \App\City::makeSlug($city['name'])
            ]);
        }
    }
}
