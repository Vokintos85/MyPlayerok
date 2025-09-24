<?php

namespace App\Form;

use App\Entity\Track;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Vich\UploaderBundle\Form\Type\VichFileType; // ← Добавьте этот импорт

class TrackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('audioFile', VichFileType::class, [ // ← Используйте VichFileType
                'label' => 'Аудиофайл',
                'required' => $options['require_audio_file'],
                'help' => 'MP3, WAV, OGG, FLAC, AAC, WEBM',
                'allow_delete' => false, // ← Отключаем возможность удаления файла через форму
                'download_uri' => false, // ← Отключаем ссылку для скачивания
            ])
            ->add('title', TextType::class, [
                'required' => false,
                'label' => 'Название',
                'attr' => ['placeholder' => 'Название трека'],
            ])
            ->add('artist', TextType::class, [
                'required' => false,
                'label' => 'Исполнитель',
                'attr' => ['placeholder' => 'Имя артиста'],
            ])
            ->add('album', TextType::class, [
                'required' => false,
                'label' => 'Альбом',
                'attr' => ['placeholder' => 'Название альбома'],
            ])
            ->add('genre', TextType::class, [
                'required' => false,
                'label' => 'Жанр',
                'attr' => ['placeholder' => 'Жанр композиции'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Track::class,
            'require_audio_file' => true, // ← По умолчанию true для новых треков
        ]);
    }
}