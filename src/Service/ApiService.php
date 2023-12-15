<?php
    namespace App\Service;

    use Doctrine\ORM\EntityManagerInterface;

    class ApiService {
        public function __construct(private EntityManagerInterface $entityManager) {

        }

        public function getJsonPlayer ($player) {
            $playerData = [
                "id" => $player->getId(),
                "name" => $player->getName(),
                "avatar" => $player->getAvatar(),
                "avatarHover" => $player->getAvatarHover(),
                "pv" => $player->getPv(),
                "pvMax" => $player->getPvMax(),
                "mana" => $player->getMana(),
                "manaMax" => $player->getManaMax(),
                "attack" => $player->getAttack(),
                "defense" => $player->getDefense(),
                "dodge" => $player->getDodge(),
                "isAvailable" => $player->isIsAvailable(),
                "isDead" => $player->isIsDead(),
                "attacks" => [],
                "status" => [],
            ];

            $attacks = $player->getAttacks();
            $buffs = $player->getBuffs();
            $status = $player->getStatus();
            for ($i = 0; $i < count($attacks); $i++){
                $attackData= [
                    "id" => $attacks[$i]->getIdName(),
                    "name" => $attacks[$i]->getName(),
                    "description" => $attacks[$i]->getDescription(),
                ];
                $power= [
                    "type" => $attacks[$i]->getPowerType(),
                    "value" => $attacks[$i]->getPowerValue()
                ];
                $cost = [
                    "type" => $attacks[$i]->getCostType(),
                    "value" => $attacks[$i]->getCostValue()
                ];
                $attackData['power'] = $power;
                $attackData['cost'] = $cost;

                if ($attacks[$i]->getEffectType() !== null){
                    $effect = [
                        "type" => $attacks[$i]->getEffectType(),
                        "value" => $attacks[$i]->getEffectValue()
                    ];
                    $attackData['effect'] = $effect;
                }

                array_push($playerData['attacks'], $attackData);
            }

            $buff = [
                "attack" => [
                    "value" => $buffs[0]->getAtkValue(),
                    "turns" => $buffs[0]->getAtkTurns(),
                ],
                "defense" => [
                    "value" => $buffs[0]->getDefValue(),
                    "turns" => $buffs[0]->getDefTurns(),
                ],
                "dodge" => [
                    "value" => $buffs[0]->getDodgeValue(),
                    "turns" => $buffs[0]->getDodgeTurns(),
                ]
            ];
            $playerData['buffs'] = $buff;
    
            for ($i = 0; $i < count($status); $i++){
                $statusData = [
                    "type" => $status[$i]->getType(),
                    "turns" => $status[$i]->getTurns(),
                ];
                
                array_push($playerData['status'], $statusData);
            };

            return $playerData;
        }
    }
?>