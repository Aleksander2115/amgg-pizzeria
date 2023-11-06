<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\DB;
use App\Models\{Order, OrderPizza, OrderTopping, Pizza, Role, Size, Status, Topping, User, UserRole};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    private array $pizzaNames = [
        'Margarita',
        'Capriciosa',
        'Italiano',
        'Neapolitana',
        'Tomata',
        'Mexicana',
        'Salami',
        'Pepperoni',
        'Niespodzianka',
        'Vege'
    ];

    private array $pizzaSizes = [
        'Small',
        'Medium',
        'Large',
        'Giga'
    ];

    private array $pizzaToppings = [
        ['mozzarella cheese','Cheese'],
        ['cheddar cheese','Cheese'],
        ['coca cola','Beverage'],
        ['ham','Meat'],
        ['pepperoni','Meat']
    ];

    private array $autoAdmins = [
        'Cieśliczka',
        'Grzesiak',
        'Kubok',
        'Knapik'
    ];

    private array $statuses = [
        ['Unfinalized','This order has not yet been placed.'],
        ['Unpaid','This order has been finalized but has not yet been paid.'],
        ['Paid','This order has beed paid and is pending delivery.'],
        ['Delivered','This order has been delivered.']
    ];

    public function run(): void
    {
        $start = microtime(true);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->createRoles();
        $this->createUsers(50);
        $this->assignUserRoles();
        $this->createPizzas();
        $this->createSizes();
        $this->createToppings();
        $this->createStatuses();
        $this->createOrders(100);
        $this->addPizzasToOrders(200);
        $this->addToppingstoOrders(20);
        $this->updateAllOrderCosts();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        var_dump(microtime(true)-$start);
    }

    private function createRoles(): void
    {
        Role::truncate();

        Role::factory()->create([
            'name' => 'Client'
        ]);

        Role::factory()->create([
            'name' => 'Employee'
        ]);

        Role::factory()->create([
            'name' => 'Administrator'
        ]);
    }

    private function createUsers(int $quantity = 1): void
    {
        User::truncate();
        User::factory()->create([
            'name' => 'Aleksander',
            'surname' => 'Grzesiak',
            'email' => 'aleksander2115@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Mikołaj',
            'surname' => 'Cieśliczka',
            'email' => 'mikolajce@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Grzegorz',
            'surname' => 'Knapik',
            'email' => 'siemano@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Grzegorz',
            'surname' => 'Kubok',
            'email' => 'kolano@gmail.com',
        ]);
        User::factory($quantity-4)->create();
    }

    private function assignUserRoles(): void
    {
        UserRole::truncate();
        $admins = $this->autoAdmins;

        for($i = 0; $i < User::count(); ++$i){
            UserRole::factory()->create([
                'user_id' => $i+1,
                'role_id' => in_array(User::find($i+1)->surname, $admins)
                    ? 3
                    : random_int(1,2)
            ]);
        }
    }

    private function createPizzas(): void
    {
        Pizza::truncate();
        $names = $this->pizzaNames;

        for($i = 0; $i < count($names); ++$i){
            $basePrice = random_int(20,40);
            Pizza::factory()->create([
                'name' => $names[$i],
                'price' => $basePrice+($i*1.2)
            ]);
        }
    }

    private function createSizes(): void
    {
        Size::truncate();
        $sizes = $this->pizzaSizes;

        for($i = 0; $i < count($sizes); ++$i){
            Size::factory()->create([
                'name' => $sizes[$i],
            ]);
        }
    }

    private function createToppings(): void
    {
        Topping::truncate();
        $tops = $this->pizzaToppings;
        for($i = 0; $i < count($tops); ++$i){
            Topping::factory()->create([
                'name' => $tops[$i][0],
                'type' => $tops[$i][1]
            ]);
        }
    }

    private function createStatuses()
    {
        Status::truncate();
        $status = $this->statuses;
        for($i = 0; $i < count($status); ++$i){
            Status::factory()->create([
                'name' => $status[$i][0],
                'description' => $status[$i][1]
            ]);
        }
    }

    private function createOrders(int $quantity = 1): void
    {
        Order::truncate();

        for($i = 0;$i < $quantity;++$i){
            Order::factory()->create([
                'user_id' => User::inRandomOrder()->first()->id,
                'status_id' => Status::inRandomOrder()->first()->id,
                'total_cost' => round(random_int(0,10000) / random_int(1, 100), 2),
                'delivery_cost' => 5
            ]);
        }
    }

    private function addPizzasToOrders(int $quantity = 1): void
    {
        OrderPizza::truncate();
        for($i = 0;$i < $quantity;++$i){
            OrderPizza::factory()->create([
                'order_id' => Order::inRandomOrder()->first()->id,
                'pizza_id' => Pizza::inRandomOrder()->first()->id,
                'size_id' => Size::inRandomOrder()->first()->id
            ]);
        }
    }

    private function addToppingsToOrders(int $quantity = 1): void
    {
        OrderTopping::truncate();
        for($i = 0; $i < $quantity;++$i){
            OrderTopping::factory()->create([
                'topping_id' => Topping::inRandomOrder()->first()->id,
                'order_id' => Order::inRandomOrder()->first()->id
            ]);
        }
    }

    private function updateAllOrderCosts()
    {
        for($i = 0; $i < Order::count(); ++$i)
        {
            OrderController::updateCostOfOrder($i+1);
        }
    }
}






