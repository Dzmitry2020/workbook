<?php

/** @var array $page
 * @var int $pageSize
 */

namespace Model;

use TexLab\MyDB\DbEntity;

class TripsModel extends DbEntity
{

    /**
     * @param $pageSize
     * @param $page
     * @return array
     */
    public function getTrips($pageSize, $page): array
    {

        $res = $this
            ->runSQL(<<<'TAG'
SELECT `trips`.`id`, `PutNum`, C.`model`, C.`GosNum`, D.`firstName`, D.`name`, D.`fatherName`, P.`name` as place, 
T.`content`,  `timeStart`, `timeFinish`
FROM `trips`, 
(SELECT `cars`.`id`, `model`, `GosNum` FROM `cars`) AS C,
(SELECT `people`.`id`, `firstName`, `name`, `fatherName` FROM `people`) AS D,
(SELECT `id`, `content` FROM `tasks`) AS T,
(SELECT `tasks`.`id`, `name` FROM `places`, `tasks` WHERE `places`.`id`=`tasks`.`places_id`) AS P
WHERE
(C.id = `trips`.`cars_id`)AND(D.`id`=`trips`.`people_id`)AND(T.`id`=`trips`.`tasks_id`)AND(P.`id`=`trips`.`tasks_id`)
ORDER BY `PutNum`
TAG
            );
        foreach ($res as $key => $row) {
            $res[$key]['car'] = $row['model'] . ' гос.№' . $row['GosNum'];
            unset($res[$key]['model']);
            unset($res[$key]['GosNum']);
            $res[$key]['driver'] = $row['firstName'] . ' '
                . mb_substr($row['name'], 0, 1) . '.'
                . mb_substr($row['fatherName'], 0, 1) . '.';
            unset($res[$key]['firstName']);
            unset($res[$key]['name']);
            unset($res[$key]['fatherName']);
            $temp = $row['timeStart'];
            unset($res[$key]['timeStart']);
            $res[$key]['timeStart'] = $temp;
            $temp = $row['timeFinish'];
            unset($res[$key]['timeFinish']);
            $res[$key]['timeFinish'] = $temp;
            $temp = $row['place'] . " - " . $row['content'];
            unset($res[$key]['place']);
            unset($res[$key]['content']);
            $res[$key]['task'] = $temp;
        }
        return $res;
    }

    public function getCarsList(): array
    {
        $res = [];
        foreach ($this->runSQL('SELECT `id`, `GosNum`, `model` FROM `cars`') as $row) {
            $res[$row['id']] = $row['model'] . " " . $row['GosNum'];
        }
        return $res;
    }

    public function getDriversList(): array
    {
        $res = [];
        foreach (
            $this->runSQL(
                'SELECT `id`,`firstName`,`name`,`fatherName` FROM `people` WHERE `Driver`=1  ORDER BY `firstName`'
            ) as $row
        ) {
            $res[$row['id']] = $row['firstName']
                . ' '
                . mb_substr($row['name'], 0, 1)
                . '.'
                . mb_substr($row['fatherName'], 0, 1)
                . '.';
        }
        return $res;
    }

    public function getTasksList(): array
    {
        $res = [];
        foreach (
            $this->runSQL(
                'SELECT `tasks`.`id`, `places`.`name` AS place, `tasks`.`content` AS task FROM `tasks`, `places` 
WHERE `tasks`.`places_id`=`places`.`id` ORDER BY `places`.`name`'
            ) as $row
        ) {
            $res[$row['id']] = $row['place']
                . ' - '
                . $row['task'];
        }
        return $res;
    }
}
