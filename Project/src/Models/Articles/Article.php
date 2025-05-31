<?php

namespace src\Models\Articles;
use src\Models\ActiveRecordEntity;
use src\Models\Users\User;

class Article extends ActiveRecordEntity
{
        protected $imagePath;
        protected $title;
        protected $content;
        protected $authorId;
        protected $createdAt;

        protected static function getTableName(): string{
            return 'articles';
        }

        public function setTitle(string $title){
            $this->title = $title;
        }

        public function setContent(string $content){
            $this->content = $content;
        }

        public function setAuthor(User $author): void
        {
            $this->authorId = $author->getId();
        }

        public function setCreatedAt(string $createdAt){
            $this->createdAt = $createdAt;
        }

        public function setImagePath(?string $path){
            $this->imagePath = $path;
        }

        public function getTitle()
        {
            return $this->title;
        }
        public function getContent()
        {
            return $this->content;
        }

        public function getAuthor(): ?User
        {
        if ($this->authorId === null) {
            return null;
        }
        return User::getById($this->authorId);
        }

        public function getCreatedAt()
        {
            return $this->createdAt;
        }

        public function  getImagePath(): ?string{
            return $this->imagePath;
        }

    }
