SELECT DISTINCT `floor_number` AS floor,
SUM(`nb_seats`) AS seats
FROM `cinema`
GROUP by floor
ORDER by seats DESC;
