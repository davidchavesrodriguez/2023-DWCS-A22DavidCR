<?php
// teamId (Primary Key): Unique identifier for each team.
// teamName: The name of the Gaelic Football team.
// city: The city where the team is based.
// foundedYear: The year the team was founded.
// homeStadium: The stadium where the team plays its home games.

class Team
{
    private int $teamId;
    private string $teamName;
    private string $city;
    private int $foundedYear;
    private string $homeStadium;

    public function __construct($teamName, $city, $foundedYear, $homeStadium, $teamId = null)
    {
        $this->teamName = $teamName;
        $this->city = $city;
        $this->foundedYear = $foundedYear;
        $this->homeStadium = $homeStadium;
        $this->teamId = $teamId;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }
    public function setTeamId()
    {
        $this->teamId = (int) $this->teamId;
        return $this;
    }

    public function getTeamName(): string
    {
        return $this->teamName;
    }
    public function setTeamName(string $teamName)
    {
        $this->teamName = $teamName;
        return $this;
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;
    }
    public function getFoundedYear(): int
    {
        return $this->foundedYear;
    }
    public function setFoundedYear(int $foundedYear)
    {
        $this->foundedYear = $foundedYear;
        return $this;
    }
    public function getHomeStadium(): string
    {
        return $this->homeStadium;
    }
    public function setHomeStadium(string $homeStadium)
    {
        $this->homeStadium = $homeStadium;
        return $this;
    }
    public function __toString(): string
    {
        return sprintf(
            " ",
            $this->teamId,
            $this->teamName,
            $this->city,
            $this->foundedYear,
            $this->homeStadium
        );
    }
}
