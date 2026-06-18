<?php

use App\Models\User;
use App\Livewire\PlayerNotes;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    Permission::create(['name' => 'add player note']);
    $role = Role::create(['name' => 'support-agent']);
    $role->givePermissionTo('add player note');
});

test('agent with permission can create a player note', function () {
    $agent  = User::factory()->create();
    $player = User::factory()->create();
    $agent->assignRole('support-agent');

    Livewire::actingAs($agent)
        ->test(PlayerNotes::class, ['playerId' => $player->id, 'player' => $player])
        ->set('form.content', 'Test note from agent')
        ->call('saveNote')
        ->assertHasNoErrors();

    expect(\App\Models\PlayerNote::where([
        'player_id' => $player->id,
        'author_id' => $agent->id,
        'content'   => 'Test note from agent',
    ])->exists())->toBeTrue();
});

test('note content cannot be empty', function () {
    $agent  = User::factory()->create();
    $player = User::factory()->create();

    Livewire::actingAs($agent)
        ->test(PlayerNotes::class, ['playerId' => $player->id, 'player' => $player])
        ->set('form.content', '')
        ->call('saveNote')
        ->assertHasErrors(['form.content']);
});

test('note content cannot exceed 200 characters', function () {
    $agent  = User::factory()->create();
    $player = User::factory()->create();

    Livewire::actingAs($agent)
        ->test(PlayerNotes::class, ['playerId' => $player->id, 'player' => $player])
        ->set('form.content', str_repeat('a', 201))
        ->call('saveNote')
        ->assertHasErrors(['form.content']);
});