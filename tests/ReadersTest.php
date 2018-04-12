<?php

use Maer\Config\Config;
use Maer\Config\Yaml\Reader;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Maer\Config\Config
 */
class ReadersTest extends TestCase
{
    public function testLoadYaml()
    {
        $options = [
            'readers' => [
                'yaml' => new Reader,
            ],
        ];

        $config = new Config([CONFIGS . '/config.yaml'], $options);
        $this->assertEquals('original', $config->get('root.array.second'), 'Default value');

        $config->load(CONFIGS . '/config_override.yaml');
        $this->assertEquals('override', $config->get('root.array.second'), 'Overridden value');
    }

    /**
     * @expectedException Symfony\Component\Yaml\Exception\ParseException
     */
    public function testException()
    {
        $options = [
            'readers' => [
                'yaml' => new Reader,
            ],
        ];

        $config = new Config([CONFIGS . '/config_invalid.yaml'], $options);
    }
}