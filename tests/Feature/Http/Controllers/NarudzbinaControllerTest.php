<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Narudzbina;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\NarudzbinaController
 */
final class NarudzbinaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $narudzbinas = Narudzbina::factory()->count(3)->create();

        $response = $this->get(route('narudzbinas.index'));

        $response->assertOk();
        $response->assertViewIs('narudzbina.index');
        $response->assertViewHas('narudzbinas', $narudzbinas);
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('narudzbinas.create'));

        $response->assertOk();
        $response->assertViewIs('narudzbina.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NarudzbinaController::class,
            'store',
            \App\Http\Requests\NarudzbinaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $user = User::factory()->create();
        $ukupna_cena = fake()->randomFloat(/** decimal_attributes **/);
        $status = fake()->word();

        $response = $this->post(route('narudzbinas.store'), [
            'user_id' => $user->id,
            'ukupna_cena' => $ukupna_cena,
            'status' => $status,
        ]);

        $narudzbinas = Narudzbina::query()
            ->where('user_id', $user->id)
            ->where('ukupna_cena', $ukupna_cena)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $narudzbinas);
        $narudzbina = $narudzbinas->first();

        $response->assertRedirect(route('narudzbinas.index'));
        $response->assertSessionHas('narudzbina.id', $narudzbina->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $narudzbina = Narudzbina::factory()->create();

        $response = $this->get(route('narudzbinas.show', $narudzbina));

        $response->assertOk();
        $response->assertViewIs('narudzbina.show');
        $response->assertViewHas('narudzbina', $narudzbina);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $narudzbina = Narudzbina::factory()->create();

        $response = $this->get(route('narudzbinas.edit', $narudzbina));

        $response->assertOk();
        $response->assertViewIs('narudzbina.edit');
        $response->assertViewHas('narudzbina', $narudzbina);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NarudzbinaController::class,
            'update',
            \App\Http\Requests\NarudzbinaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $narudzbina = Narudzbina::factory()->create();
        $user = User::factory()->create();
        $ukupna_cena = fake()->randomFloat(/** decimal_attributes **/);
        $status = fake()->word();

        $response = $this->put(route('narudzbinas.update', $narudzbina), [
            'user_id' => $user->id,
            'ukupna_cena' => $ukupna_cena,
            'status' => $status,
        ]);

        $narudzbina->refresh();

        $response->assertRedirect(route('narudzbinas.index'));
        $response->assertSessionHas('narudzbina.id', $narudzbina->id);

        $this->assertEquals($user->id, $narudzbina->user_id);
        $this->assertEquals($ukupna_cena, $narudzbina->ukupna_cena);
        $this->assertEquals($status, $narudzbina->status);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $narudzbina = Narudzbina::factory()->create();

        $response = $this->delete(route('narudzbinas.destroy', $narudzbina));

        $response->assertRedirect(route('narudzbinas.index'));

        $this->assertModelMissing($narudzbina);
    }
}
