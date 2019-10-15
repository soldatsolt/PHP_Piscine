SELECT REVERSE(RIGHT(`phone_number`, LENGTH(`phone_number`) - 1)) AS ebmunenohp FROM `distrib` WHERE `phone_number` REGEXP '05.*';
