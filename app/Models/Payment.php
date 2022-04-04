<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Exception\CardException;

class Payment extends Model
{
    use HasFactory;

    /**
     * Stripe上に「顧客」を登録するための関数
     *
     * @param String $token・・・・・Stripe上のtoken（フロントエンドで作成）
     * @param object $user ・・・・・カード登録をするユーザーの情報
     * @param object $customer・・・Stripe上に登録する顧客オブジェクト
     */

    public static function setCustomer($token, $user)
    {
        \Stripe\Stripe::setApiKey(config('payment.stripe_secret_key'));

        //Stripe上に顧客情報をtokenを使用することで保存
        try {
            $customer = \Stripe\Customer::create([
                'card' => $token,
                'name' => $user->name,
                'description' => $user->id
            ]);
        } catch (\Stripe\Exception\CardException $e) {
            /*
             * カード登録失敗時には現段階では一律で別の登録カードを入れていただくように
             * 促すメッセージで統一。
             * カードエラーの類としては以下があるとのこと
             * １、カードが決済に失敗しました
             * ２、セキュリティーコードが間違っています
             * ３、有効期限が間違っています
             * ４、処理中にエラーが発生しました
             *  */
            return false;
        }

        $targetCustomer = null;
        if (isset($customer->id)) {
            $targetCustomer = User::find(Auth::id()); //要するに当該顧客のデータをUserテーブルから引っ張りたい
            $targetCustomer->stripe_id = $customer->id;
            $targetCustomer->update();
            return true;
        }
        return false;
    }
}
