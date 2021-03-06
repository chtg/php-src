--TEST--
Test ldap_get_entries() function - variation: used on empty search
--CREDITS--
Patrick Allaert <patrickallaert@php.net>
# Belgian PHP Testfest 2009
--SKIPIF--
<?php require_once('skipif.inc'); ?>
<?php require_once('skipifbindfailure.inc'); ?>
--FILE--
<?php
require "connect.inc";

$link = ldap_connect_and_bind($host, $port, $user, $passwd, $protocol_version);
insert_dummy_data($link);

var_dump(
	ldap_get_entries(
		$link,
		ldap_search($link, "dc=my-domain,dc=com", "(o=my-unexisting-domain)")
	)
);
?>
===DONE===
--CLEAN--
<?php
require "connect.inc";

$link = ldap_connect_and_bind($host, $port, $user, $passwd, $protocol_version);
remove_dummy_data($link);
?>
--EXPECT--
array(1) {
  ["count"]=>
  int(0)
}
===DONE===
