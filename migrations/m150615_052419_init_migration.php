<?php

use yii\db\Schema;
use yii\db\Migration;

class m150615_052419_init_migration extends Migration
{
    public function safeUp()
    {
        $this->createTable('user', [
            'id'            => 'pk',
            'username'      => 'string(32) unique',
            'password'      => 'string not null',
            'first_name'    => 'string not null',
            'last_name'     => 'string not null',
            'access_token'  => 'string not null',
            'auth_key'      => 'string not null',
            'created_at'    => 'datetime not null default current_timestamp',
            'updated_at'    => 'datetime not null default current_timestamp',
        ]);

        $this->createTable('category', [
            'id'            => 'pk',
            'name'          => 'text not null',
            'parent_id'     => 'int not null default 0'
        ]);

        $this->createTable('post', [
            'id'            => 'pk',
            'title'         => 'string not null',
            'text'          => 'text not null',
            'image'         => 'string not null',
            'user_id'       => 'int not null',
            'category_id'   => 'int not null',
            'created_at'    => 'datetime not null default current_timestamp',
            'updated_at'    => 'datetime not null default current_timestamp',
        ]);
        $this->addForeignKey('fk_post_user',
            'post', 'user_id',
            'user', 'id',
            'cascade', 'cascade'
        );
        $this->addForeignKey('fk_post_category',
            'post', 'category_id',
            'category', 'id',
            'cascade', 'cascade'
        );

        $this->createTable('tag', [
            'id'    => 'pk',
            'name'  => 'string not null',
        ]);

        $this->createTable('post_tag', [
            'id'        => 'pk',
            'post_id'   => 'int not null',
            'tag_id'    => 'int not null',
        ]);
        $this->addForeignKey('fk_post_tag_post',
            'post_tag', 'post_id',
            'post', 'id',
            'cascade', 'cascade'
        );
        $this->addForeignKey('fk_post_tag_tag',
            'post_tag', 'tag_id',
            'tag', 'id',
            'cascade', 'cascade'
        );

        $this->createTable('comment', [
            'id'            => 'pk',
            'text'          => 'text not null',
            'user_id'       => 'int not null',
            'created_at'    => 'datetime not null default current_timestamp',
            'updated_at'    => 'datetime not null default current_timestamp',
        ]);

        $this->createTable('post_comment', [
            'id'        => 'pk',
            'post_id'   => 'int not null',
            'comment_id'    => 'int not null',
        ]);
        $this->addForeignKey('fk_post_comment_post',
            'post_comment', 'post_id',
            'post', 'id',
            'cascade', 'cascade'
        );
        $this->addForeignKey('fk_post_comment_comment',
            'post_comment', 'comment_id',
            'comment', 'id',
            'cascade', 'cascade'
        );

        $this->batchInsert('user',
            ['id', 'username', 'password', 'auth_key', 'first_name', 'last_name'],
            [
                [1, 'fimak', '4297f44b13955235245b2497399d7a93', '21232f297a57a5a743894a0e4a801fc3', 'Alex', 'Ufimtsev'],
                [2, 'user', '4297f44b13955235245b2497399d7a93', 'ee11cbb19052e40b07aac0ca060c23ee', 'John', 'Symonds'],
            ]
        );

        $this->batchInsert('category',
            ['id', 'name', 'parent_id'],
            [
                [1, 'main', 0],
                [2, 'culture', 1],
                [3, 'science', 1],
                [4, 'music', 2],
                [5, 'news', 1]
            ]
        );

        $this->batchInsert('post',
            ['id', 'title', 'text', 'image', 'user_id', 'category_id'],
            [
                [1, 'Pig', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pig.jpg', 1, 1],
                [2, 'The story', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'the_story.jpg', 1, 2],
                [3, 'Fire', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'fire.jpg', 2, 3],
                [4, 'The Pastel City', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'the_pastel_city.jpg', 2, 4],
                [5, 'Personal Life', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'personal_life.jpg', 2, 5],
                [6, 'The Journey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'the_journey.jpg', 2, 1],
                [7, 'Second Sight', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'second_sight.jpg', 2, 2],
                [8, 'The Woman in Black', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'the_woman_in_black.jpg', 2, 3],
                [9, 'The story 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'the_story_2.jpg', 1, 1],
            ]
        );
    }

    public function safeDown()
    {
        echo "m150615_052419_init_migration cannot be reverted.\n";

        return false;
    }
}
