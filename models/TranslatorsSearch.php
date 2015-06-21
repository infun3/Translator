<?php

namespace app\modules\translator\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\translator\models\Translators;

/**
 * TranslatorsSearch represents the model behind the search form about `app\modules\translator\models\Translators`.
 */
class TranslatorsSearch extends Translators
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['src', 'dst'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Translators::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'src', $this->src])
            ->andFilterWhere(['like', 'dst', $this->dst]);

        return $dataProvider;
    }
}
