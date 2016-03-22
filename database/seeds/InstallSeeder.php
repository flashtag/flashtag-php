<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables();

        $category = $this->createCategory();
        $post = $this->createPost($category);
        $pages = $this->createPages();
    }

    private function truncateTables()
    {
        $db = config('database.default');

        switch ($db) {
            case 'mysql':
                $this->truncateMysqlTables();
                break;
            case 'pgsql':
                $this->truncatePgsqlTables();
                break;
            default:
                $this->truncateDefaultTables();
                break;
        }
    }

    public function createCategory()
    {
        $description = <<<HTML
<p>This is an exampe category.</p>
HTML;

        return \Flashtag\Data\Category::create([
            'name' => 'Miscellaneous',
            'slug' => 'miscellaneous',
            'description' => $description,
        ]);
    }

    public function createPost($category)
    {
        $body = '<p>This is an example post.</p>';

        $post = \Flashtag\Data\Post::create([
            'title' => 'Welcome to Flashtag!',
            'subtitle' => 'It&rsquo;s great to have you.',
            'slug' => 'welcome-to-flashtag',
            'body' => $body,
            'is_published' => true,
            'show_author' => false,
            'meta_description' => 'This post is awesome.',
        ]);

        $post->category()->associate($category->id);
        $post->save();

        return $post;
    }

    public function createPages()
    {
        $dirtyPaws = <<<HTML
<p>Her dirty paws and furry coat, she ran down the forest slope</p>
<p>The forest of talking trees, they used to sing about the birds and the bees</p>
<p>The bees had declared a war - the sky wasn't big enough for them all</p>
<p>The birds, they got help from below</p>
<p>From dirty paws and the creatures of snow</p>
HTML;

        return collect([
            \Flashtag\Data\Page::create([
                'title' => 'About Us',
                'subtitle' => 'This is the heart',
                'slug' => 'about',
                'template' => 'flashtag::pages.default',
                'body' => $dirtyPaws,
                'is_published' => true,
            ]),
            \Flashtag\Data\Page::create([
                'title' => 'Contact Us',
                'subtitle' => 'We\'ve got answers',
                'slug' => 'contact',
                'template' => 'flashtag::pages.contact',
                'body' => '',
                'is_published' => true,
            ]),
        ]);
    }

    /**
     * Truncate the database tables for postgres.
     */
    private function truncatePgsqlTables()
    {
        DB::statement(
            'TRUNCATE TABLE
                categories, tags, posts, users, pages
            RESTART IDENTITY CASCADE;'
        );
    }

    /**
     * Truncate the database tables for mysql.
     */
    private function truncateMysqlTables()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->truncateDefaultTables();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Truncate the database tables.
     */
    private function truncateDefaultTables()
    {
        DB::table('categories')->truncate();
        DB::table('tags')->truncate();
        DB::table('posts')->truncate();
        DB::table('users')->truncate();
        DB::table('pages')->truncate();
    }

}
