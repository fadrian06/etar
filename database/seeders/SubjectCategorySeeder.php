<?php

namespace Database\Seeders;

use App\Models\SubjectCategory;
use Illuminate\Database\Seeder;

class SubjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = new SubjectCategory([
            'name' => 'Lenguaje, Comunicación y Cultura',
            'user_id' => 1
        ]);

        $language->save();

        $language->subjects()->createMany([
            ['name' => 'Lengua y Literatura', 'user_id' => 1],
            ['name' => 'Idiomas (inglés)', 'user_id' => 1]
        ]);

        $sciences = new SubjectCategory([
            'name' => 'Ciencias Exactas',
            'user_id' => 1
        ]);

        $sciences->save();

        $sciences->subjects()->createMany([
            ['name' => 'Matemática', 'user_id' => 1]
        ]);

        $naturalSciencies = new SubjectCategory([
            'name' => 'El Ser Humano y su Interacción con los Componentes del Ambiente',
            'user_id' => 1
        ]);

        $naturalSciencies->save();

        $naturalSciencies->subjects()->createMany([
            ['name' => 'Biología, Ambiente y Tecnología', 'user_id' => 1],
            ['name' => 'Educación Física', 'user_id' => 1]
        ]);

        $socials = new SubjectCategory([
            'name' => 'Ciencias Sociales e Identidad',
            'user_id' => 1
        ]);

        $socials->save();

        $socials->subjects()->createMany([
            ['name' => 'Geografía, Historia y Soberanía Nacional', 'user_id' => 1],
        ]);

        $tech = new SubjectCategory([
            'name' => 'Formación Científica, Tecnológica y Productiva',
            'user_id' => 1
        ]);

        $tech->save();

        $tech->subjects()->createMany([
            ['name' => 'Área Específica por Mención', 'user_id' => 1],
            ['name' => 'Proyecto Económico Socio Productivo', 'user_id' => 1],
        ]);

        $orality = new SubjectCategory([
            'name' => 'Práctica Vocacional y Profesional',
            'user_id' => 1
        ]);

        $orality->save();

        $orality->subjects()->createMany([
            ['name' => 'Orientación y Vinculación', 'user_id' => 1],
        ]);
    }
}
