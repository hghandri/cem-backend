<?php
/**
 * File part of the Cloud Environments Management Backend
 *
 * @category  CEM
 * @package   CEM.UI.ConsoleBundle
 * @author    Guillaume Maïssa <pro.g@maissa.fr>
 * @copyright 2017 Guillaume Maïssa
 * @license   https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace CEM\Ui\ConsoleBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Abstract command class
 */
abstract class AbstractCommand extends ContainerAwareCommand
{
    /**
     * @var InputInterface
     */
    protected $input;

    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * {@inheritdoc}
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->input  = $input;
        $this->output = $output;
    }

    /**
     * Output info message
     *
     * @param string $msg
     */
    protected function outputMsgInfo($msg)
    {
        if (!$this->output->isQuiet()) {
            $this->output->writeln(sprintf('<info>%s</info>', $msg));
        }
    }

    /**
     * Output error message
     *
     * @param string $msg
     */
    protected function outputMsgError($msg)
    {
        $this->output->writeln(sprintf('<error>%s</error>', $msg));
    }

    /**
     * Output debug message
     *
     * @param string $msg
     */
    protected function outputMsgDebug($msg)
    {
        if ($this->output->isDebug()) {
            $this->output->writeln(sprintf('%s', $msg));
        }
    }
}
