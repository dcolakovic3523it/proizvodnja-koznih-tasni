<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Narudzbina;
use App\Models\Proizvod;
use App\Models\StavkaNarudzbine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StavkaNarudzbineController
 */
final class StavkaNarudzbineControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $stavkaNarudzbines = StavkaNarudzbine::factory()->count(3)->create();

        $response = $this->get(route('stavka-narudzbines.index'));

        $response->assertOk();
        $response->assertViewIs('stavkaNarudzbine.index');
        $response->assertViewHas('stavkaNarudzbines', $stavkaNarudzbines);
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('stavka-narudzbines.create'));

        $response->assertOk();
        $response->assertViewIs('stavkaNarudzbine.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StavkaNarudzbineController::class,
            'store',
            \App\Http\Requests\StavkaNarudzbineStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $proizvod = Proizvod::factory()->create();
        $narudzbina = Narudzbina::factory()->create();
        $kolicina = fake()->numberBetween(-10000, 10000);
        $cena = fake()->randomFloat(/** decimal_attributes **/);

        $response = $this->post(route('stavka-narudzbines.store'), [
            'proizvod_id' => $proizvod->id,
            'narudzbina_id' => $narudzbina->id,
            'kolicina' => $kolicina,
            'cena' => $cena,
        ]);

        $stavkaNarudzbines = StavkaNarudzbine::query()
            ->where('proizvod_id', $proizvod->id)
            ->where('narudzbina_id', $narudzbina->id)
            ->where('kolicina', $kolicina)
            ->where('cena', $cena)
            ->get();
        $this->assertCount(1, $stavkaNarudzbines);
        $stavkaNarudzbine = $stavkaNarudzbines->first();

        $response->assertRedirect(route('stavkaNarudzbines.index'));
        $response->assertSessionHas('stavkaNarudzbine.id', $stavkaNarudzbine->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $stavkaNarudzbine = StavkaNarudzbine::factory()->create();

        $response = $this->get(route('stavka-narudzbines.show', $stavkaNarudzbine));

        $response->assertOk();
        $response->assertViewIs('stavkaNarudzbine.show');
        $response->assertViewHas('stavkaNarudzbine', $stavkaNarudzbine);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $stavkaNarudzbine = StavkaNarudzbine::factory()->create();

        $response = $this->get(route('stavka-narudzbines.edit', $stavkaNarudzbine));

        $response->assertOk();
        $response->assertViewIs('stavkaNarudzbine.edit');
        $response->assertViewHas('stavkaNarudzbine', $stavkaNarudzbine);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StavkaNarudzbineController::class,
            'update',
            \App\Http\Requests\StavkaNarudzbineUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $stavkaNarudzbine = StavkaNarudzbine::factory()->create();
        $proizvod = Proizvod::factory()->create();
        $narudzbina = Narudzbina::factory()->create();
        $kolicina = fake()->numberBetween(-10000, 10000);
        $cena = fake()->randomFloat(/** decimal_attributes **/);

        $response = $this->put(route('stavka-narudzbines.update', $stavkaNarudzbine), [
            'proizvod_id' => $proizvod->id,
            'narudzbina_id' => $narudzbina->id,
            'kolicina' => $kolicina,
            'cena' => $cena,
        ]);

        $stavkaNarudzbine->refresh();

        $response->assertRedirect(route('stavkaNarudzbines.index'));
        $response->assertSessionHas('stavkaNarudzbine.id', $stavkaNarudzbine->id);

        $this->assertEquals($proizvod->id, $stavkaNarudzbine->proizvod_id);
        $this->assertEquals($narudzbina->id, $stavkaNarudzbine->narudzbina_id);
        $this->assertEquals($kolicina, $stavkaNarudzbine->kolicina);
        $this->assertEquals($cena, $stavkaNarudzbine->cena);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $stavkaNarudzbine = StavkaNarudzbine::factory()->create();

        $response = $this->delete(route('stavka-narudzbines.destroy', $stavkaNarudzbine));

        $response->assertRedirect(route('stavkaNarudzbines.index'));

        $this->assertModelMissing($stavkaNarudzbine);
    }
}
