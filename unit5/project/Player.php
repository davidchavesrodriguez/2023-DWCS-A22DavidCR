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
    private string $playerName;
    private string $lastName;
    private DateTime $dateOfBirth;
    private string $position;
    private int $jerseyNumber;
    private int $pointsScored;
    private int $teamId;

    /**
     * Get the value of playerId
     *
     * @return int
     */
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /**
     * Set the value of playerId
     *
     * @param int $playerId
     *
     * @return self
     */
    public function setPlayerId(int $playerId): self
    {
        $this->playerId = $playerId;
        return $this;
    }

    /**
     * Get the value of playerName
     *
     * @return string
     */
    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    /**
     * Set the value of playerName
     *
     * @param string $playerName
     *
     * @return self
     */
    public function setPlayerName(string $playerName): self
    {
        $this->playerName = $playerName;
        return $this;
    }

    /**
     * Get the value of lastName
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get the value of dateOfBirth
     *
     * @return DateTime
     */
    public function getDateOfBirth(): DateTime
    {
        return $this->dateOfBirth;
    }

    /**
     * Set the value of dateOfBirth
     *
     * @param DateTime $dateOfBirth
     *
     * @return self
     */
    public function setDateOfBirth(DateTime $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    /**
     * Get the value of position
     *
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * Set the value of position
     *
     * @param string $position
     *
     * @return self
     */
    public function setPosition(string $position): self
    {
        $this->position = $position;
        return $this;
    }

    /**
     * Get the value of jerseyNumber
     *
     * @return int
     */
    public function getJerseyNumber(): int
    {
        return $this->jerseyNumber;
    }

    /**
     * Set the value of jerseyNumber
     *
     * @param int $jerseyNumber
     *
     * @return self
     */
    public function setJerseyNumber(int $jerseyNumber): self
    {
        $this->jerseyNumber = $jerseyNumber;
        return $this;
    }

    /**
     * Get the value of pointsScored
     *
     * @return int
     */
    public function getPointsScored(): int
    {
        return $this->pointsScored;
    }

    /**
     * Set the value of pointsScored
     *
     * @param int $pointsScored
     *
     * @return self
     */
    public function setPointsScored(int $pointsScored): self
    {
        $this->pointsScored = $pointsScored;
        return $this;
    }

    /**
     * Get the value of teamId
     *
     * @return int
     */
    public function getTeamId(): int
    {
        return $this->teamId;
    }

    /**
     * Set the value of teamId
     *
     * @param int $teamId
     *
     * @return self
     */
    public function setTeamId(int $teamId): self
    {
        $this->teamId = $teamId;
        return $this;
    }
}
