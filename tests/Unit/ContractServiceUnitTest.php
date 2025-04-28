<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Service\Contract;
use infra\Weclapp\Client\Weclapp;
use Mockery;

class ContractServiceUnitTest extends TestCase
{
    public function testUpdateContractCallsClient()
    {
        $weclappMock = Mockery::mock(Weclapp::class);
        $weclappMock->shouldReceive('updateContract')
            ->once()
            ->with(123, 'Tomas Muller')
            ->andReturn(true);

        $contractService = new Contract($weclappMock);
        $result = $contractService->update(123, 'Tomas Muller');
        $this->assertTrue($result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
