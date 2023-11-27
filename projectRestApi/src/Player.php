<?php

// playerId (Primary Key): Unique identifier for each player.
// firstName: The first name of the player.
// lastName: The last name of the player.
// dateOfBirth: The player's date of birth.
// position: The player's position (e.g., forward, midfielder, defender).
// jerseyNumber: The player's jersey number.
// pointsScored: The total points scored by the player.
// teamId (Foreign Key): A reference to the team to which the player belongs.
class Player implements JsonSerializable
{
    private int $playerId;
    private string $playerName;
    private string $lastName;
    private DateTime $dateOfBirth;
    private string $position;
    private int $jerseyNumber;
    private int $pointsScored;
    private int $teamId;

    public function __construct(
        int $playerId,
        string $playerName,
        string $lastName,
        DateTime $dateOfBirth,
        string $position,
        int $jerseyNumber,
        int $teamId,
        int $pointsScored = 0 // There is no player with points scored before being in the Fedetarion!
    ) {
        $this->playerId = $playerId;
        $this->playerName = $playerName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->position = $position;
        $this->jerseyNumber = $jerseyNumber;
        $this->teamId = $teamId;
        $this->pointsScored = $pointsScored;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): self
    {
        $this->playerId = $playerId;
        return $this;
    }

    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    public function setPlayerName(string $playerName): self
    {
        $this->playerName = $playerName;
        return $this;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }


    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }


    public function getDateOfBirth(): DateTime
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(DateTime $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;
        return $this;
    }

    public function getJerseyNumber(): int
    {
        return $this->jerseyNumber;
    }

    public function setJerseyNumber(int $jerseyNumber): self
    {
        $this->jerseyNumber = $jerseyNumber;
        return $this;
    }

    public function getPointsScored(): int
    {
        return $this->pointsScored;
    }

    public function setPointsScored(int $pointsScored): self
    {
        $this->pointsScored = $pointsScored;
        return $this;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function setTeamId(int $teamId): self
    {
        $this->teamId = $teamId;
        return $this;
    }

    public function __toString(): string
    {
        return sprintf(
            "Player ID: %d, Name: %s %s, Date of Birth: %s, Position: %s, Jersey Number: %d, Points Scored: %d, Team ID: %d",
            $this->playerId,
            $this->playerName,
            $this->lastName,
            $this->dateOfBirth->format('Y-m-d'),
            $this->position,
            $this->jerseyNumber,
            $this->pointsScored,
            $this->teamId
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'playerId' => $this->playerId,
            'playerName' => $this->playerName,
            'lastName' => $this->lastName,
            'dateOfBirth' => $this->dateOfBirth->format('Y-m-d'),
            'position' => $this->position,
            'jerseyNumber' => $this->jerseyNumber,
            'pointsScored' => $this->pointsScored,
            'teamId' => $this->teamId,
        ];
    }
}
