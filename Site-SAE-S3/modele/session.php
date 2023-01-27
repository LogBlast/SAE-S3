<?php
class Session {

	public static function userConnected() {
		$bool = isset($_SESSION["login"]);
		return $bool;
	}

	public static function adminConnected() {
		$bool = isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1;
		return $bool;
	}

	public static function userConnecting() {
		$bool = isset($_GET["action"]) && $_GET["action"] == "connecter";
		return $bool;
	}

	public static function urlMenu() {
		$urlMenu = Session::adminConnected() ?  "vue/menuAdmin.php" : "vue/menu.html" ;
		return $urlMenu;
	}

}
//? "vue/menuAdmin.php" : "vue/menu.html"
?>