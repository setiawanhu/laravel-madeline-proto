<?php

namespace Hu\MadelineProto;

use danog\MadelineProto\messages;

class ClientMessages
{
    /**
     * @var messages
     */
    private $messages;

    /**
     * ClientMessage constructor.
     *
     * @param messages $messages
     */
    public function __construct($messages)
    {
        $this->messages = $messages;
    }

    /**
     * Use this to accept a Seamless Telegram Login authorization request.
     *
     * <br>
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.acceptUrlAuth</strong> method payload. It's fields will be sent as payload.
     *
     * @param mixed $messageId
     * @param int $buttonId
     * @param array $extra other optional parameter(s)
     * @return TelegramObject UrlAuthResult
     * @link https://core.telegram.org/api/url-authorization
     */
    public function acceptUrlAuth($messageId, int $buttonId = 0, array $extra = []): TelegramObject
    {
        if ($messageId instanceof TelegramObject) {
            $payload = $messageId->toArray();
        } else {
            $payload = [
                'msg_id' => $messageId,
                'button_id' => $buttonId
            ];

            $payload = array_merge($payload, $extra);
        }

        return new TelegramObject($this->messages->acceptUrlAuth($payload));
    }

    /**
     * Adds a user to a chat and sends a service message on it.
     *
     * <br>
     *
     * Note:
     * <ol>
     *  <li>
     *      The chatId and userId argument can be an array which contains
     *      <strong>Update</strong> or <strong>Message</strong>
     *  </li>
     *  <li>
     *      The chatId and userId argument can be provided one of these values:
     *      <ul>
     *          <li>'@ username' (Username)</li>
     *          <li>'me' (the currently logged-in user)</li>
     *          <li>44700 (bot API id [user])</li>
     *          <li>-492772765 (bot API id [chats])</li>
     *          <li>-10038575794 (bot API id [channels])</li>
     *          <li>'https://t.me/danogentili' (t.me URLs)</li>
     *          <li>'https://t.me/joinchat/asfln1-21fa' (t.me invite links)</li>
     *          <li>'user#44700' (tg-cli style id [users])</li>
     *          <li>'chat#492772765' (tg-cli style id (chats))</li>
     *          <li>'channel#38575794' (tg-cli style id [channels])</li>
     *      </ul>
     *  </li>
     * </ol>
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.addChatUser</strong> method payload. It's fields will be sent as payload.
     *
     * @param mixed $chatId
     * @param mixed $userId
     * @param int $forwardLimit
     * @return TelegramObject Updates
     */
    public function addChatUser($chatId, $userId = '', int $forwardLimit = 1): TelegramObject
    {
        if ($chatId instanceof TelegramObject) {
            $payload = $chatId->toArray();
        } else {
            $payload = [
                'chat_id' => $chatId,
                'user_id' => $userId,
                'fwd_limit' => $forwardLimit
            ];
        }

        return new TelegramObject($this->messages->addChatUser($payload));
    }

    /**
     * Check the validity of a chat invite link and get basic info about it.
     *
     * <br>
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.addChatUser</strong> method payload. It's fields will be sent as payload.
     *
     * @param mixed $hash
     * @return TelegramObject ChatInvite
     */
    public function checkChatInvite($hash): TelegramObject
    {
        if ($hash instanceof TelegramObject) {
            $payload = $hash->toArray();
        } else {
            $payload = [
                'hash' => $hash
            ];
        }

        return new TelegramObject($this->messages->checkChatInvite($payload));
    }

    /**
     * Clear all drafts.
     *
     * @return bool Bool
     */
    public function clearAllDrafts(): bool
    {
        return $this->messages->clearAllDrafts();
    }

    /**
     * Clear recent stickers.
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.clearRecentStickers</strong> method payload. It's fields will be sent as payload.
     *
     * @param bool|TelegramObject $attached
     * @return bool Bool
     */
    public function clearRecentStickers($attached = false): bool
    {
        if ($attached instanceof TelegramObject) {
            $payload = $attached->toArray();
        } else {
            $payload = [
                'attached' => $attached
            ];
        }

        return $this->messages->clearRecentStickers($payload);
    }

    /**
     * Creates a new chat.
     *
     * <br>
     *
     * Note:
     * <ol>
     *  <li>The users argument can be an array of array which contains <strong>Update</strong> or <strong>Message</strong></li>
     *  <li>
     *      The users argument can be provided one of these values:
     *      <ul>
     *          <li>'@ username' (Username)</li>
     *          <li>'me' (the currently logged-in user)</li>
     *          <li>44700 (bot API id [user])</li>
     *          <li>-492772765 (bot API id [chats])</li>
     *          <li>-10038575794 (bot API id [channels])</li>
     *          <li>'https://t.me/danogentili' (t.me URLs)</li>
     *          <li>'https://t.me/joinchat/asfln1-21fa' (t.me invite links)</li>
     *          <li>'user#44700' (tg-cli style id [users])</li>
     *          <li>'chat#492772765' (tg-cli style id (chats))</li>
     *          <li>'channel#38575794' (tg-cli style id [channels])</li>
     *      </ul>
     *  </li>
     * </ol>
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.createChat</strong> method payload. It's fields will be sent as payload.
     *
     * @param mixed $title
     * @param array $users
     * @return TelegramObject Updates
     */
    public function createChat($title, array $users = []): TelegramObject
    {
        if ($title instanceof TelegramObject) {
            $payload = $title->toArray();
        } else {
            $payload = [
                'title' => $title,
                'users' => $users
            ];
        }

        return new TelegramObject($this->messages->createChat($payload));
    }

    /**
     * Deletes a user from a chat and sends a service message on it.
     *
     * <br>
     *
     * Note:
     * <ol>
     *  <li>The chatId and userId arguments can be an array which contains <strong>Update</strong> or <strong>Message</strong></li>
     *  <li>
     *      The chatId and userId arguments can be provided one of these values:
     *      <ul>
     *          <li>'@ username' (Username)</li>
     *          <li>'me' (the currently logged-in user)</li>
     *          <li>44700 (bot API id [user])</li>
     *          <li>-492772765 (bot API id [chats])</li>
     *          <li>-10038575794 (bot API id [channels])</li>
     *          <li>'https://t.me/danogentili' (t.me URLs)</li>
     *          <li>'https://t.me/joinchat/asfln1-21fa' (t.me invite links)</li>
     *          <li>'user#44700' (tg-cli style id [users])</li>
     *          <li>'chat#492772765' (tg-cli style id (chats))</li>
     *          <li>'channel#38575794' (tg-cli style id [channels])</li>
     *      </ul>
     *  </li>
     * </ol>
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.deleteChatUser</strong> method payload. It's fields will be sent as payload.
     *
     * @param mixed $chatId
     * @param mixed $userId
     * @return TelegramObject Updates
     */
    public function deleteChatUser($chatId, $userId): TelegramObject
    {
        if ($chatId instanceof TelegramObject) {
            $payload = $chatId->toArray();
        } else {
            $payload = [
                'chat_id' => $chatId,
                'user_id' => $userId
            ];
        }

        return new TelegramObject($this->messages->deleteChatUser($payload));
    }

    /**
     * Deletes communication history.
     *
     * <br>
     *
     * Note:
     * <ol>
     *  <li>The peer argument can be an array which contains <strong>Update</strong> or <strong>Message</strong></li>
     *  <li>
     *      The peer argument can be provided one of these values:
     *      <ul>
     *          <li>'@ username' (Username)</li>
     *          <li>'me' (the currently logged-in user)</li>
     *          <li>44700 (bot API id [user])</li>
     *          <li>-492772765 (bot API id [chats])</li>
     *          <li>-10038575794 (bot API id [channels])</li>
     *          <li>'https://t.me/danogentili' (t.me URLs)</li>
     *          <li>'https://t.me/joinchat/asfln1-21fa' (t.me invite links)</li>
     *          <li>'user#44700' (tg-cli style id [users])</li>
     *          <li>'chat#492772765' (tg-cli style id (chats))</li>
     *          <li>'channel#38575794' (tg-cli style id [channels])</li>
     *      </ul>
     *  </li>
     * </ol>
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.deleteHistory</strong> method payload. It's fields will be sent as payload.
     *
     * @param mixed $peer
     * @param int $maxId
     * @param array $extra other optional parameter(s)
     * @return TelegramObject messages.AffectedMessages
     */
    public function deleteHistory($peer, int $maxId = 0, array $extra = []): TelegramObject
    {
        if ($peer instanceof TelegramObject) {
            $payload = $peer->toArray();
        } else {
            $payload = [
                'peer' => $peer,
                'max_id' => $maxId,
            ];

            $payload = array_merge($payload, $extra);
        }

        return new TelegramObject($this->messages->deleteHistory($payload));
    }

    /**
     * Deletes messages by their identifiers.
     *
     * <br>
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.deleteMessages</strong> method payload. It's fields will be sent as payload.
     *
     * @param mixed $id
     * @param bool $revoke
     * @return TelegramObject messages.AffectedMessages
     */
    public function deleteMessages($id, bool $revoke = false): TelegramObject
    {
        if ($id instanceof TelegramObject) {
            $payload = $id->toArray();
        } else {
            $payload = [
                'id' => $id,
                'revoke' => $revoke
            ];
        }

        return new TelegramObject($this->messages->deleteMessages($payload));
    }

    /**
     * Delete scheduled messages.
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.deleteScheduledMessages</strong> method payload. It's fields will be sent as payload.
     *
     * @param mixed $peer
     * @param array $id
     * @return TelegramObject Updates
     */
    public function deleteScheduledMessages($peer, array $id = []): TelegramObject
    {
        if ($peer instanceof TelegramObject) {
            $payload = $peer->toArray();
        } else {
            $payload = [
                'peer' => $peer,
                'id' => $id
            ];
        }

        return new TelegramObject($this->messages->deleteScheduledMessages($payload));
    }

    /**
     * Edit the description of a group/supergroup/channel.
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.editChatAbout</strong> method payload. It's fields will be sent as payload.
     *
     * @param mixed $peer
     * @param string $about
     * @return TelegramObject
     */
    public function editChatAbout($peer, string $about = ''): TelegramObject
    {
        if ($peer instanceof TelegramObject) {
            $payload = $peer->toArray();
        } else {
            $payload = [
                'peer' => $peer,
                'about' => $about
            ];
        }

        return new TelegramObject($this->messages->editChatAbout($payload));
    }

    /**
     * Make a user admin in a legacy group.
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.editChatAdmin</strong> method payload. It's fields will be sent as payload.
     *
     * @param mixed $chatId
     * @param mixed $userId
     * @param bool $isAdmin
     * @return bool Bool
     */
    public function editChatAdmin($chatId, $userId, bool $isAdmin): bool
    {
        if ($chatId instanceof TelegramObject) {
            $payload = $chatId->toArray();
        } else {
            $payload = [
                'chat_id' => $chatId,
                'user_id' => $userId,
                'is_admin' => $isAdmin
            ];
        }

        return $this->messages->editChatAdmin($payload);
    }

    /**
     * Edit the default banned rights of a channel/supergroup/group.
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.editChatDefaultBannedRights</strong> method payload. It's fields will be sent as payload.
     *
     * @param mixed $peer
     * @param array $bannedRights
     * @return TelegramObject Updates
     */
    public function editChatDefaultBannedRights($peer, array $bannedRights): TelegramObject
    {
        if ($peer instanceof TelegramObject) {
            $payload = $peer->toArray();
        } else {
            $payload = [
                'peer' => $peer,
                'banned_rights' => $bannedRights
            ];
        }

        return new TelegramObject($this->messages->editChatDefaultBannedRights($payload));
    }

    /**
     * Send a message to target peer.
     *
     * <br>
     *
     * Note:
     * <ol>
     *  <li>The peer argument can be an array which contains <strong>Update</strong> or <strong>Message</strong></li>
     *  <li>
     *      The peer argument can be provided one of these values:
     *      <ul>
     *          <li>'@ username' (Username)</li>
     *          <li>'me' (the currently logged-in user)</li>
     *          <li>44700 (bot API id [user])</li>
     *          <li>-492772765 (bot API id [chats])</li>
     *          <li>-10038575794 (bot API id [channels])</li>
     *          <li>'https://t.me/danogentili' (t.me URLs)</li>
     *          <li>'https://t.me/joinchat/asfln1-21fa' (t.me invite links)</li>
     *          <li>'user#44700' (tg-cli style id [users])</li>
     *          <li>'chat#492772765' (tg-cli style id (chats))</li>
     *          <li>'channel#38575794' (tg-cli style id [channels])</li>
     *      </ul>
     *  </li>
     * </ol>
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.sendMessage</strong> method payload. It's fields will be sent as payload.
     *
     * @param mixed $peer
     * @param string $message
     * @param array $extra other optional parameter(s)
     * @return TelegramObject Updates
     */
    public function sendMessage($peer, string $message = '', array $extra = []): TelegramObject
    {
        if ($peer instanceof TelegramObject) {
            $payload = $peer->toArray();
        } else {
            $payload = [
                'peer' => $peer,
                'message' => $message
            ];

            $payload = array_merge($payload, $extra);
        }

        return new TelegramObject($this->messages->sendMessage($payload));
    }

    /**
     * Get dialog info of specified peers.
     *
     * <br>
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.getPeerDialog</strong> method payload. It's fields will be sent as payload.
     *
     * @param array ...$peers
     * @return TelegramObject
     */
    public function getPeerDialogs(...$peers): TelegramObject
    {
        if ($peers[0] instanceof TelegramObject) {
            $payload = $peers[0]->toArray();
        } else {
            $payload = [
                'peers' => $peers
            ];
        }

        return new TelegramObject($this->messages->getPeerDialogs($payload));
    }

    /**
     * Gets back the conversation history with one interlocutor / within a chat.
     *
     * <br>
     *
     * For convenience, you may pass a {@link \Hu\MadelineProto\TelegramObject TelegramObject} to the first argument which contains
     * <strong>messages.getHistory</strong> method payload. It's fields will be sent as payload.
     *
     * @param array|TelegramObject $params
     * @return TelegramObject
     */
    public function getHistory($params): TelegramObject
    {
        if ($params instanceof TelegramObject) {
            $payload = $params->toArray();
        } else {
            $payload = $params;
        }

        return new TelegramObject($this->messages->getHistory($payload));
    }

    /**
     * Get Client messages instance.
     *
     * @return messages messages APIFactory.
     */
    public function getMessages(): messages
    {
        return $this->messages;
    }
}
