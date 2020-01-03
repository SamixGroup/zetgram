<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a link to a photo. By default, this photo will be sent by the user with optional
    caption. Alternatively, you can use input_message_content to send a message with the specified
    content instead of the photo.

Source: https://core.telegram.org/bots/api#inlinequeryresultphoto
*/
class InlineQueryResultPhoto extends InlineQueryResult
{
    /**
    * Type of the result, must be photo
    * @var string
    */
    public string $type;

    /**
    * Unique identifier for this result, 1-64 bytes
    * @var string
    */
    public string $id;

    /**
    * A valid URL of the photo. Photo must be in jpeg format. Photo size must not exceed 5MB
    * @var string
    */
    public string $photoUrl;

    /**
    * URL of the thumbnail for the photo
    * @var string
    */
    public string $thumbUrl;

    /**
    * Width of the photo
    * @var int
    */
    public ?int $photoWidth;

    /**
    * Height of the photo
    * @var int
    */
    public ?int $photoHeight;

    /**
    * Title for the result
    * @var string
    */
    public ?string $title;

    /**
    * Short description of the result
    * @var string
    */
    public ?string $description;

    /**
    * Caption of the photo to be sent, 0-1024 characters
    * @var string
    */
    public ?string $caption;

    /**
    * Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the
    * media caption.
    * @var string
    */
    public ?string $parseMode;

    /**
    * Inline keyboard attached to the message
    * @var InlineKeyboardMarkup
    */
    public ?InlineKeyboardMarkup $replyMarkup;

    /**
    * Content of the message to be sent instead of the photo
    * @var InputMessageContent
    */
    public ?InputMessageContent $inputMessageContent;

    protected function build(stdClass $data)
    {
        $this->type = $data->type;
        $this->id = $data->id;
        $this->photoUrl = $data->photo_url;
        $this->thumbUrl = $data->thumb_url;
        if (isset($data->photo_width)) {
            $this->photoWidth = $data->photo_width;
        }
        if (isset($data->photo_height)) {
            $this->photoHeight = $data->photo_height;
        }
        if (isset($data->title)) {
            $this->title = $data->title;
        }
        if (isset($data->description)) {
            $this->description = $data->description;
        }
        if (isset($data->caption)) {
            $this->caption = $data->caption;
        }
        if (isset($data->parse_mode)) {
            $this->parseMode = $data->parse_mode;
        }
        if (isset($data->reply_markup)) {
            $this->replyMarkup = new InlineKeyboardMarkup($data->reply_markup);
        }
        if (isset($data->input_message_content)) {
            $this->inputMessageContent = new InputMessageContent($data->input_message_content);
        }
    }
}