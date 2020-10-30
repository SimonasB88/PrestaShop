<?php

namespace MolliePrefix;

class Issue1351Test extends \MolliePrefix\PHPUnit_Framework_TestCase
{
    protected $instance;
    /**
     * @runInSeparateProcess
     */
    public function testFailurePre()
    {
        $this->instance = new \MolliePrefix\ChildProcessClass1351();
        $this->assertFalse(\true, 'Expected failure.');
    }
    public function testFailurePost()
    {
        $this->assertNull($this->instance);
        $this->assertFalse(\class_exists('MolliePrefix\\ChildProcessClass1351', \false), 'ChildProcessClass1351 is not loaded.');
    }
    /**
     * @runInSeparateProcess
     */
    public function testExceptionPre()
    {
        $this->instance = new \MolliePrefix\ChildProcessClass1351();
        try {
            throw new \LogicException('Expected exception.');
        } catch (\LogicException $e) {
            throw new \RuntimeException('Expected rethrown exception.', 0, $e);
        }
    }
    public function testExceptionPost()
    {
        $this->assertNull($this->instance);
        $this->assertFalse(\class_exists('MolliePrefix\\ChildProcessClass1351', \false), 'ChildProcessClass1351 is not loaded.');
    }
    public function testPhpCoreLanguageException()
    {
        // User-space code cannot instantiate a PDOException with a string code,
        // so trigger a real one.
        $connection = new \PDO('sqlite::memory:');
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $connection->query("DELETE FROM php_wtf WHERE exception_code = 'STRING'");
    }
}
\class_alias('MolliePrefix\\Issue1351Test', 'MolliePrefix\\Issue1351Test', \false);