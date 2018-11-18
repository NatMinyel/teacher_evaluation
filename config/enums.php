<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

final class YearTypes extends Enum
{
    const Year_1 = 1;
    const Year_2 = 2;
    const Year_3 = 3;
    const Year_4 = 4;
    const Year_5 = 5;
    const Year_6 = 6;
    const Year_7 = 7;
}

final class SemesterTypes extends Enum {
    const I = 1;
    const II = 2;
    const III = 3;
    const IV = 4;
}

final class ProgramTypes extends Enum {
    const Regular = 1;
    const Extension = 2;
    const Graduate = 3;
}

final class RoleTypes extends Enum {
    const Role_1 = 1; // read all added to
    const Role_2 = 2; // write to all added to
    const Role_3 = 3; // Read all evaluation and write to ones added to
    const Role_4 = 4; // Read and write to all evaluation forms
}

final class FormRoleTypes extends Enum {
    const Role_1 = 1; // Read, evaluation no write
    const Role_2 = 2; // Write to evaluation
    const Role_3 = 3; // Read statistics 
    const Role_4 = 4; // No evaluation, write questions 
    const Role_5 = 5; // Evaluate, write questions
}


final class RenderChoices extends Enum {
    const Text = 1;
    const Select_List = 2;
    const Radio_Select = 3;
    const Check_Box = 4;
}
