<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrystallinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crystallines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('SiteId');
            $table->string('Manufacturer');
            $table->string('Name');
            $table->string('SpecificationsSinglePiece')->nullable();
            $table->string('SpecificationsOpticMaterial')->nullable();
            $table->string('SpecificationsHapticMaterial')->nullable();
            $table->string('SpecificationsPreloaded')->nullable();
            $table->string('SpecificationsFoldable')->nullable();
            $table->decimal('SpecificationsIncisionWidth', $precision = 4, $scale = 2)->nullable();
            $table->decimal('SpecificationsInjectorSize', $precision = 5, $scale = 3)->nullable();
            $table->string('SpecificationsHydro')->nullable();
            $table->string('SpecificationsFilter')->nullable();
            $table->decimal('SpecificationsRefractiveIndex', $precision = 6, $scale = 4)->nullable();
            $table->decimal('SpecificationsAbbeNumber', $precision = 5, $scale = 2)->nullable();
            $table->string('SpecificationsAchromatic')->nullable();
            $table->decimal('SpecificationsOpticDiameter', $precision = 4, $scale = 2)->nullable();
            $table->decimal('SpecificationsHapticDiameter', $precision = 5, $scale = 2)->nullable();
            $table->string('SpecificationsOpticConcept')->nullable();
            $table->string('SpecificationsHapticDesign')->nullable();
            $table->string('SpecificationsIntendedLocation')->nullable();
            $table->string('SpecificationsOpticDesign')->nullable();
            $table->string('SpecificationsAberration')->nullable();
            $table->decimal('SpecificationssaCorrection', $precision = 6, $scale = 3)->nullable();
            $table->string('SpecificationsToric')->nullable();
            $table->decimal('AvailabilitySphereFrom', $precision = 4, $scale = 1)->nullable();
            $table->decimal('AvailabilitySphereTo', $precision = 4, $scale = 1)->nullable();
            $table->decimal('AvailabilitySphereIncrement', $precision = 4, $scale = 2)->nullable();
            $table->integer('AvailabilitySphere_range')->nullable();
            $table->string('AvailabilityAddition_distance')->nullable();
            $table->decimal('AvailabilityAddition_text', $precision = 4, $scale = 2)->nullable();
            $table->decimal('Constants0Ultrasound', $precision = 6, $scale = 2)->nullable();
            $table->decimal('Constants0SRKt', $precision = 7, $scale = 3)->nullable();
            $table->decimal('Constants0Haigisa0', $precision = 6, $scale = 4)->nullable();
            $table->decimal('Constants0Haigisa1', $precision = 6, $scale = 4)->nullable();
            $table->decimal('Constants0Haigisa2', $precision = 6, $scale = 4)->nullable();
            $table->decimal('Constants0HofferQ', $precision = 6, $scale = 4)->nullable();
            $table->decimal('Constants0Holladay1', $precision = 6, $scale = 4)->nullable();
            $table->decimal('Constants0BarrettDF', $precision = 4, $scale = 2)->nullable();
            $table->decimal('Constants0BarrettLF', $precision = 4, $scale = 2)->nullable();
            $table->decimal('Constants0Olsen', $precision = 4, $scale = 2)->nullable();
            $table->string('Constants0_type');
            $table->decimal('Constants1SRKt', $precision = 7, $scale = 3)->nullable();
            $table->decimal('Constants1Haigisa0', $precision = 8, $scale = 5)->nullable();
            $table->decimal('Constants1Haigisa1', $precision = 7, $scale = 5)->nullable();
            $table->decimal('Constants1Haigisa2', $precision = 8, $scale = 5)->nullable();
            $table->decimal('Constants1HofferQ', $precision = 7, $scale = 5)->nullable();
            $table->decimal('Constants1Holladay1', $precision = 7, $scale = 5)->nullable();
            $table->string('Constants1_type');
            $table->integer('Constants1_results');
            $table->decimal('AvailabilityCylinder0From', $precision = 5, $scale = 2)->nullable();
            $table->decimal('AvailabilityCylinder0To', $precision = 4, $scale = 2)->nullable();
            $table->decimal('AvailabilityCylinder0Increment', $precision = 4, $scale = 2)->nullable();
            $table->integer('AvailabilityCylinder0_range')->nullable();
            $table->decimal('AvailabilityCylinder1From', $precision = 4, $scale = 2)->nullable();
            $table->decimal('AvailabilityCylinder1To', $precision = 4, $scale = 2)->nullable();
            $table->decimal('AvailabilityCylinder1Increment', $precision = 4, $scale = 2)->nullable();
            $table->integer('AvailabilityCylinder1_range')->nullable();
            $table->string('Availability_refractivePower')->nullable();
            $table->string('Availability_tNotation')->nullable();
            $table->decimal('AvailabilitySphere0From', $precision = 4, $scale = 1)->nullable();
            $table->decimal('AvailabilitySphere0To', $precision = 4, $scale = 1)->nullable();
            $table->decimal('AvailabilitySphere0Increment', $precision = 3, $scale = 1)->nullable();
            $table->integer('AvailabilitySphere0_range')->nullable();
            $table->decimal('AvailabilitySphere1From', $precision = 4, $scale = 1)->nullable();
            $table->decimal('AvailabilitySphere1To', $precision = 4, $scale = 1)->nullable();
            $table->decimal('AvailabilitySphere1Increment', $precision = 4, $scale = 2)->nullable();
            $table->integer('AvailabilitySphere1_range')->nullable();
            $table->decimal('AvailabilitySphere2From', $precision = 5, $scale = 2)->nullable();
            $table->integer('AvailabilitySphere2To')->nullable();
            $table->decimal('AvailabilitySphere2Increment', $precision = 4, $scale = 2)->nullable();
            $table->integer('AvailabilitySphere2_range')->nullable();
            $table->integer('Constants0_results')->nullable();
            $table->string('Availability')->nullable();
            $table->decimal('AvailabilityCylinderFrom', $precision = 4, $scale = 2)->nullable();
            $table->decimal('AvailabilityCylinderTo', $precision = 4, $scale = 2)->nullable();
            $table->decimal('AvailabilityCylinderIncrement', $precision = 4, $scale = 2)->nullable();
            $table->integer('AvailabilityCylinder_range')->nullable();
            $table->string('AvailabilityCylinderPower0_label')->nullable();
            $table->decimal('AvailabilityCylinderPower0_text', $precision = 3, $scale = 1)->nullable();
            $table->string('AvailabilityCylinderPower1_label')->nullable();
            $table->decimal('AvailabilityCylinderPower1_text', $precision = 4, $scale = 2)->nullable();
            $table->string('AvailabilityCylinderPower2_label')->nullable();
            $table->decimal('AvailabilityCylinderPower2_text', $precision = 4, $scale = 2)->nullable();
            $table->string('AvailabilityCylinderPower3_label')->nullable();
            $table->decimal('AvailabilityCylinderPower3_text', $precision = 4, $scale = 2)->nullable();
            $table->string('AvailabilityCylinderPower4_label')->nullable();
            $table->decimal('AvailabilityCylinderPower4_text', $precision = 4, $scale = 2)->nullable();
            $table->string('AvailabilityCylinderPower5_label')->nullable();
            $table->decimal('AvailabilityCylinderPower5_text', $precision = 4, $scale = 2)->nullable();
            $table->string('AvailabilityCylinderPower6_label')->nullable();
            $table->decimal('AvailabilityCylinderPower6_text', $precision = 4, $scale = 2)->nullable();
            $table->string('AvailabilityCylinderPower7_label')->nullable();
            $table->integer('AvailabilityCylinderPower7_text')->nullable();
            $table->string('AvailabilityAddition0_distance')->nullable();
            $table->decimal('AvailabilityAddition0_text', $precision = 4, $scale = 2)->nullable();
            $table->string('AvailabilityAddition1_distance')->nullable();
            $table->decimal('AvailabilityAddition1_text', $precision = 4, $scale = 2)->nullable();
            $table->string('AvailabilityCylinderPower8_label')->nullable();
            $table->integer('AvailabilityCylinderPower8_text')->nullable();
            $table->string('AvailabilityCylinderPower9_label')->nullable();
            $table->integer('AvailabilityCylinderPower9_text')->nullable();
            $table->integer('AvailabilitySphere3From')->nullable();
            $table->integer('AvailabilitySphere3To')->nullable();
            $table->integer('AvailabilitySphere3Increment')->nullable();
            $table->integer('AvailabilitySphere3_range')->nullable();
            $table->integer('AvailabilityCylinder2From')->nullable();
            $table->integer('AvailabilityCylinder2To')->nullable();
            $table->integer('AvailabilityCylinder2Increment')->nullable();
            $table->integer('AvailabilityCylinder2_range')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crystallines');
    }
}
