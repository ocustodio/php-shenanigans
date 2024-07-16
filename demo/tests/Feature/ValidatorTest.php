<?php

it ('validates a string', function() {
   $result = \Core\Validator::isEmtpy('foobar');

   expect($result) -> toBeFalse();
});

it ('validates an email address', function() {
    expect(\Core\Validator::email('foobar')) -> toBeFalse();
    expect(\Core\Validator::email('foobar@gmail.com')) -> toBeTrue();
});