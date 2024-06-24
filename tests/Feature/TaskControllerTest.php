<?php

namespace Tests\Feature;

use App\Models\Construction;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/api');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_list_tasks()
    {
        $construction = Construction::factory()->create();

        $taskData = [
            'title' => 'Teste Titulo',
            'description' => 'Teste Proprli',
            'status' => 'open',
            'construction_id' => $construction->id,
        ];

        Task::create($taskData);

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'description',
                        'status',
                        'created_at',
                        'updated_at',
                        'comments',
                    ]
                ]
            ]);
    }

    /** @test */
    public function it_can_filter_tasks_by_status()
    {
        $construction = Construction::factory()->create();

        $taskOpen = [
            'title' => 'Teste Titulo Open',
            'description' => 'Teste Proprli',
            'status' => 'open',
            'construction_id' => $construction->id,
        ];

        $taskInProgress = [
            'title' => 'Teste Titulo In Progress',
            'description' => 'Teste Proprli',
            'status' => 'in_progress',
            'construction_id' => $construction->id,
        ];

        $taskCompleted = [
            'title' => 'Teste Titulo In Progress',
            'description' => 'Teste Proprli',
            'status' => 'in_progress',
            'construction_id' => $construction->id,
        ];

        Task::create($taskOpen);
        Task::create($taskInProgress);
        Task::create($taskCompleted);

        $response = $this->getJson('/api/tasks?status=open');

        $response->assertStatus(200)
            ->assertJsonCount(2, 'data')
            ->assertJsonFragment(['status' => 'open']);
    }

    /** @test */
    public function it_can_create_a_task()
    {
        $construction = Construction::factory()->create();
        
        $data = [
            'title' => 'Nova Tarefa',
            'description' => 'Descrição da Nova Tarefa',
            'status' => 'open',
            'construction_id' => $construction->id,
        ];

        $response = $this->postJson('/api/tasks', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Nova Tarefa',
            'description' => 'Descrição da Nova Tarefa',
            'status' => 'open',
        ]);
    }
}
