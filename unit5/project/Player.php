<?php

// playerId (Primary Key): Unique identifier for each player.
// firstName: The first name of the player.
// lastName: The last name of the player.
// dateOfBirth: The player's date of birth.
// position: The player's position (e.g., forward, midfielder, defender).
// jerseyNumber: The player's jersey number.
// pointsScored: The total points scored by the player.
// teamId (Foreign Key): A reference to the team to which the player belongs.
class Player
{
    private int $playerId;
    private string $firstName;
    private string $lastName;
    private DateTime $dateOfBirth;
    private string $position;
    private int $jerseyNumber;
    private int $pointsScored;
    private int $teamId;

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): self
    {
        $this->playerId = $playerId;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $playerName): self
    {
        $this->firstName = $playerName;
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
            " ",
            $this->getPlayerId(),
            $this->getFirstName(),
            $this->getLastName(),
            $this->getDateOfBirth(),
            $this->getPosition(),
            $this->getJerseyNumber(),
            $this->getPointsScored(),
            $this->getTeamId()
        );
    }
}
