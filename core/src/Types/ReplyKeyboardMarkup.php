<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a custom keyboard with reply options (see Introduction to bots for
    details and examples).

Source: https://core.telegram.org/bots/api#replykeyboardmarkup
*/
class ReplyKeyboardMarkup extends Base
{
    /**
     * Array of button rows, each represented by an Array of KeyboardButton objects
     * @var KeyboardButtonCollectionCollection
     */
    public KeyboardButtonCollectionCollection $keyboard;

    /**
     * Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are
     * just two rows of buttons). Defaults to false, in which case the custom keyboard is always of the same height as
     * the app's standard keyboard.
     * @var bool
     */
    public ?bool $resizeKeyboard;

    /**
     * Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available, but
     * clients will automatically display the usual letter-keyboard in the chat � the user can press a special button in
     * the input field to see the custom keyboard again. Defaults to false.
     * @var bool
     */
    public ?bool $oneTimeKeyboard;

    /**
     * Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are @mentioned
     * in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the
     * original message.
     * @var bool
     */
    public ?bool $selective;

    protected function build(stdClass $data)
    {
        $this->keyboard = new KeyboardButtonCollectionCollection($data->keyboard);
        if (isset($data->resize_keyboard)) {
            $this->resizeKeyboard = $data->resize_keyboard;
        }
        if (isset($data->one_time_keyboard)) {
            $this->oneTimeKeyboard = $data->one_time_keyboard;
        }
        if (isset($data->selective)) {
            $this->selective = $data->selective;
        }
    }
}
