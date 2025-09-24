<?php

namespace App\Entity;

use App\Repository\TrackRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File; // ← Добавьте этот импорт
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: TrackRepository::class)]
#[Vich\Uploadable]
class Track
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $artist = null;

    #[ORM\Column(nullable: true)]
    private ?int $duration = null;

    #[ORM\Column(length: 255)]
    private ?string $filePath = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $album = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $genre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coverImage = null;

    #[Vich\UploadableField(mapping: "tracks", fileNameProperty: "filePath")]
    private ?File $audioFile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(?string $artist): static
    {
        $this->artist = $artist;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(string $filePath): static
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function getAlbum(): ?string
    {
        return $this->album;
    }

    public function setAlbum(?string $album): static
    {
        $this->album = $album;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(?string $coverImage): static
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    // ↓↓↓ ДОБАВЬТЕ ЭТИ МЕТОДЫ ↓↓↓

    public function setAudioFile(?File $audioFile = null): void
    {
        $this->audioFile = $audioFile;
    }

    public function getAudioFile(): ?File
    {
        return $this->audioFile;
    }

    public function getFormattedDuration(): ?string
    {
        if ($this->duration === null) {
            return null;
        }

        $seconds = max(0, $this->duration);
        $format = $seconds >= 3600 ? 'H:i:s' : 'i:s';

        return gmdate($format, $seconds);
    }
}