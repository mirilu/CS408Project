<?php
class User {
	private $userName = "";
	private $prevActionTime = -1;

	private $channelList = [];
	private $pmList = [];

	public function setName($name) {
		$this->userName = $name;
	}

	public function getName() {
		return $this->userName;
	}

	// There should be no need to actually pass a value to this 
	public function setPrevActionTime() {
		$this->prevActionTime = time();
	}

	public function getPrevActionTime() {
		return $this->prevActionTime;
	}

	public function addChannel($channel) {
		$this->channelList[] = $channel;
	}

	public function getChannelList() {
		return $this->channelList;
	}

	public function addPM($pm) {
		$this->pmList[] = $pm;
	}

	public function getPMList() {
		return $this->pmList;
	}
}

class Channel {
	private $channelName = "";
	private $userList = [];
	private $messageList = [];

	public function setName($cName) {
		$this->channelName = $cName;
	}

	public function getName() {
		return $this->channelName;
	}

	public function addUser($user) {
		$this->userList[] = $user;
	}

	public function getUserList() {
		return $this->userList;
	}

	public function addMessage($message) {
		$this->messageList[] = $message;
	}

	public function getMessageList() {
		return $this->messageList;
	}
}

class Message {
	private $destination; // should be a Channel for normal messages and a User for private messages
	private $sender;
	private $time;
	private $text;

	public function __construct($send, $dest, $time, $text) {
		$this->destination = $dest;
		$this->sender = $send;
		$this->time = $time;
		$this->text = $text;
	}

	public function toString() {
		$sender = $this->sender->getName();
		$destination = $this->destination->getName();
		return "[ $this->time ] ( $destination ) < $sender > $this->text\n"; // this should be changed
	}
}

?>