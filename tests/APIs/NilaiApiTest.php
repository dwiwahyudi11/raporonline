<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Nilai;

class NilaiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_nilai()
    {
        $nilai = Nilai::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/nilais', $nilai
        );

        $this->assertApiResponse($nilai);
    }

    /**
     * @test
     */
    public function test_read_nilai()
    {
        $nilai = Nilai::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/nilais/'.$nilai->id
        );

        $this->assertApiResponse($nilai->toArray());
    }

    /**
     * @test
     */
    public function test_update_nilai()
    {
        $nilai = Nilai::factory()->create();
        $editedNilai = Nilai::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/nilais/'.$nilai->id,
            $editedNilai
        );

        $this->assertApiResponse($editedNilai);
    }

    /**
     * @test
     */
    public function test_delete_nilai()
    {
        $nilai = Nilai::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/nilais/'.$nilai->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/nilais/'.$nilai->id
        );

        $this->response->assertStatus(404);
    }
}
