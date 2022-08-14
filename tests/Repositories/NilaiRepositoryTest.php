<?php namespace Tests\Repositories;

use App\Models\Nilai;
use App\Repositories\NilaiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NilaiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var NilaiRepository
     */
    protected $nilaiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->nilaiRepo = \App::make(NilaiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_nilai()
    {
        $nilai = Nilai::factory()->make()->toArray();

        $createdNilai = $this->nilaiRepo->create($nilai);

        $createdNilai = $createdNilai->toArray();
        $this->assertArrayHasKey('id', $createdNilai);
        $this->assertNotNull($createdNilai['id'], 'Created Nilai must have id specified');
        $this->assertNotNull(Nilai::find($createdNilai['id']), 'Nilai with given id must be in DB');
        $this->assertModelData($nilai, $createdNilai);
    }

    /**
     * @test read
     */
    public function test_read_nilai()
    {
        $nilai = Nilai::factory()->create();

        $dbNilai = $this->nilaiRepo->find($nilai->id);

        $dbNilai = $dbNilai->toArray();
        $this->assertModelData($nilai->toArray(), $dbNilai);
    }

    /**
     * @test update
     */
    public function test_update_nilai()
    {
        $nilai = Nilai::factory()->create();
        $fakeNilai = Nilai::factory()->make()->toArray();

        $updatedNilai = $this->nilaiRepo->update($fakeNilai, $nilai->id);

        $this->assertModelData($fakeNilai, $updatedNilai->toArray());
        $dbNilai = $this->nilaiRepo->find($nilai->id);
        $this->assertModelData($fakeNilai, $dbNilai->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_nilai()
    {
        $nilai = Nilai::factory()->create();

        $resp = $this->nilaiRepo->delete($nilai->id);

        $this->assertTrue($resp);
        $this->assertNull(Nilai::find($nilai->id), 'Nilai should not exist in DB');
    }
}
