<?php
/****************************************************************************
*																			*
*	File:		Agent.php  								    	            *
*																			*
*	Author:		Branch Vincent												*
*																			*
*	Purpose:	To define the Agent class.	       		                    *
*																			*
****************************************************************************/

class Agent
{
//  Public member functions

    function __construct($name = "DefaultAgent", $tasks = array())
    {
        $this->name = $name;
        $this->tasks = $tasks;
        $this->active = false;
        $this->description = 'You can define this assistant';
    }

    function updateFromFile($file)
    {
        $this->name = strtolower(trim(strstr(fgets($file), "\t")));
        $this->tasks = array_map('intval', explode(" ", strstr(fgets($file), "\t")));
        if ($this->name == "engineer")
        {
            $this->active = true;
        }
        else
        {
            $this->active = false;
        }

        $this->type = $this->name;

        if (isset($ASSISTANT_DESCRIPTIONS[$this->name]))
        {
            $this->description = $ASSISTANT_DESCRIPTIONS[$this->name];
        }
        else
        {
            $this->description = 'You can define this assistant';
        }
    }

    function writeToFile($file)
    {
        if ($this->active and !empty($this->tasks))
        {
            fwrite($file, "op_name\t\t\t$this->name\n");
            fwrite($file, "tasks\t\t\t" . implode(" ", $this->tasks) . "\n");
        }
    }

//  Public data members

    var $name;
    var $tasks;
    var $active;
    var $type;
    var $description;
}