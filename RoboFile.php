<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */

class RoboFile extends \Robo\Tasks
{
    private $pathToDockerCompose = 'C:\"Program Files"\Docker\Docker\Resources\bin\docker-compose.EXE';
    private $pathToComposeConfig = "docker/docker-compose.yml";
    use \Droath\RoboDockerCompose\Task\loadTasks;

    function dockerUp()
    {
        $this->taskDockerComposeUp($this->pathToDockerCompose)
            ->file($this->pathToComposeConfig)
            ->detachedMode()
            ->removeOrphans()
            ->run();
    }

    function dockerDown()
    {
        $this->taskDockerComposeDown($this->pathToDockerCompose)
            ->file($this->pathToComposeConfig)
            ->run();
    }

    function setup()
    {
//        $this->taskGulpRun('setup')
//            ->silent()
//            ->run();
//
//        $this->taskExec('D:\"Program Files"\7-Zip\7z.exe x bitrix/business_encode_php5.tar.gz -y -so | D:\"Program Files"\7-Zip\7z.exe x -si -o./bitrix -ttar -y')->run();

        $this->taskCodecept()
            ->suite('acceptance')
            ->test("SetupCept")
            ->run();
    }

    function reset()
    {
        $this->taskCleanDir("bitrix")
            ->run();
    }
}