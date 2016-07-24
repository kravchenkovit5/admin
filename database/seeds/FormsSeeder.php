<?php

use Illuminate\Database\Seeder;

class FormsSeeder extends Seeder
{

	public function run()
	{
		$uploads = public_path('images/uploads');
		$filesObj = \Symfony\Component\Finder\Finder::create()->files()->in($uploads);
		$files = [];
		foreach ($filesObj as $file)
		{
			$files[] = $file->getFilename();
		}

		$faker = Faker\Factory::create();
		for ($i = 0; $i < 5; $i++)
		{
			$image = $faker->optional()->randomElement($files);
			$images = [];
			$imagesCount = mt_rand(0, 3);
			for ($j = 0; $j < $imagesCount; $j++)
			{
				$img = $faker->randomElement($files);
				$images[] = 'images/uploads/' . $img;
			}

			\App\Form::create([
				'title' => $faker->sentence(4),
				'textaddon' => $faker->sentence(2),
				'checkbox' => $faker->boolean(),
				'date' => $faker->date(),
				'time' => $faker->time(),
				'timestamp' => $faker->dateTime,
				'image' => is_null($image) ? $image : ('images/uploads/' . $image),
				'images' => $images,
				'select' => $faker->optional()->randomElement([1, 2, 3]),
				'textarea' => $faker->paragraph(5),
				'ckeditor' => $faker->paragraph(5),
			]);
		}
	}

} 