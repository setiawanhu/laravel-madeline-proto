<?php

namespace Hu\MadelineProto\Facades;

use Hu\MadelineProto\ClientMessages;
use Hu\MadelineProto\TelegramObject;
use Illuminate\Support\Facades\Facade;

/**
 * Facade for ClientMessages class.
 *
 * @package Hu\MadelineProto\Facades
 *
 * @method static TelegramObject acceptUrlAuth($messageid, int $buttonId = 0, array $extra = [])
 * @method static TelegramObject addChatUser($chatId, $userId = '', int $forwardLimit = 1)
 * @method static TelegramObject checkChatInvite($hash)
 * @method static bool clearAllDrafts()
 * @method static bool clearRecentStickers($attached = false)
 * @method static TelegramObject createChat($title, array $users = [])
 * @method static TelegramObject deleteChatUser($chatId, $userId)
 * @method static TelegramObject deleteHistory($peer, int $maxId = 0, array $extra = [])
 * @method static TelegramObject deleteMessages($id, bool $revoke = false)
 * @method static TelegramObject deleteScheduledMessage($peer, array $id = [])
 * @method static TelegramObject editChatAbout($peer, string $about = '')
 * @method static bool editChatAdmin($chatId, $userId, bool $isAdmin)
 * @method static TelegramObject editDefaultBannedRights($peer, array $bannedRights)
 * @method static TelegramObject sendMessage($peer, string $message = '', array $extra = [])
 * @method static TelegramObject getHistory(mixed $params)
 *
 * @see ClientMessages
 */
class Messages extends Facade
{
    /**
     * @inheritDoc
     */
    protected static function getFacadeAccessor(): string
    {
        return 'madeline-proto-messages';
    }
}
