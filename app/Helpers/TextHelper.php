<?php
// app/Helpers/TextHelper.php
namespace App\Helpers;

class TextHelper
{
    public static function formatList($text)
    {
        if (empty($text)) {
            return '';
        }

        // Split by new lines and create list items
        $lines = explode("\n", trim($text));
        $formattedLines = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if (!empty($line)) {
                $formattedLines[] = '<li>' . e($line) . '</li>';
            }
        }

        if (empty($formattedLines)) {
            return '';
        }

        return '<ul class="list-disc list-inside space-y-2 text-gray-700">' . implode('', $formattedLines) . '</ul>';
    }

    public static function formatParagraphs($text)
    {
        if (empty($text)) {
            return '';
        }

        // Split by double new lines for paragraphs
        $paragraphs = explode("\n\n", trim($text));
        $formattedParagraphs = [];

        foreach ($paragraphs as $paragraph) {
            $paragraph = trim($paragraph);
            if (!empty($paragraph)) {
                $formattedParagraphs[] = '<p class="mb-4 text-gray-700">' . e($paragraph) . '</p>';
            }
        }

        return implode('', $formattedParagraphs);
    }
}